<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    static function getOdeme()
    {
        return Islem::where('tip',0)->sum('fiyat');
    }

    static function getTahsilat()
    {
        return Islem::where('tip',1)->sum('fiyat');
    }

    static function getMusteriOdeme($id)
    {
        // müşteriye göre , bize göre
        //  - , +
        $fatura = FaturaIslem::leftJoin('faturas','fatura_islems.faturaId','=','faturas.id')
            ->where('faturas.musteriId',$id)
            ->where('faturas.faturaTipi',FATURA_GIDER)
            ->sum('fatura_islems.genelToplam');

        $islem =  Islem::where('musteriId',$id)->where('tip',ISLEM_ODEME)->sum('fiyat');
        return $fatura - $islem;
    }

    static function getMusteriTahsilat($id)
    {
        // müşteriye göre , bize göre
        //  + , -
        $fatura = FaturaIslem::leftJoin('faturas','fatura_islems.faturaId','=','faturas.id')
            ->where('faturas.musteriId',$id)
            ->where('faturas.faturaTipi',FATURA_GELIR)
            ->sum('fatura_islems.genelToplam');

        $islem =  Islem::where('musteriId',$id)->where('tip',ISLEM_TAHSILAT)->sum('fiyat');
        return $fatura - $islem;
    }

    static function getMusteriBakiye($id)
    {
        return   self::getMusteriOdeme($id) - self::getMusteriTahsilat($id);
    }



    static function getBankaOdeme($id)
    {
        // -
        return Islem::where('tip',ISLEM_ODEME)->where('hesap',$id)->sum('fiyat');
    }


    static function getBankaTahsilat($id)
    {
        // +
        return Islem::where('tip',ISLEM_TAHSILAT)->where('hesap',$id)->sum('fiyat');
    }

    static function getBankaBakiye($id)
    {
        return self::getBankaTahsilat($id) - self::getBankaOdeme($id);
    }


}
