@extends('layouts.app')
@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="row page-title clearfix">
        <div class="page-title-left">
            <h6 class="page-title-heading mr-0 mr-r-5">Teklif</h6>
        </div>
        <!-- /.page-title-left -->
        <div class="page-title-right d-none d-sm-inline-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Panel</a>
                </li>
                <li class="breadcrumb-item active">Teklif Düzenle</li>
            </ol>
            <div class="d-none d-md-inline-flex justify-center align-items-center"><a href="javascript: void(0);" class="btn btn-color-scheme btn-sm fs-11 fw-400 mr-l-40 pd-lr-10 mr-l-0-rtl mr-r-40-rtl hidden-xs hidden-sm ripple" target="_blank">Teklif Düzenle</a>
            </div>
        </div>
        <!-- /.page-title-right -->
    </div>

    @if(session("status"))
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-12">
                <div class="alert alert-success">{{ session("status") }}</div>
            </div>
        </div>

    @endif



    <div class="widget-list">
        <div class="row">
            <div class="col-md-12 widget-holder">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <form action="{{ route('teklif.update',['id'=>$data[0]['id']]) }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="">Müşteri Seçiniz</label>
                                    <select name="musteriId" class="m-b-10 form-control" data-placeholder="Müşteri Seçiniz" data-toggle="select2">
                                        <option value="">Müşteri Seçiniz</option>
                                        @foreach(\App\Musteriler::all() as $k => $v)
                                            <option @if($data[0]['musteriId'] == $v['id']) selected @endif value="{{$v['id']}}">{{ \App\Musteriler::getPublicName($v['id']) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row firma--area">
                                <div class="col-md-12">
                                    <label class="col-form-label" for="l0">Teklif Fiyatı</label>
                                    <input class="form-control" required name="fiyat"  value="{{ $data[0]['fiyat'] }}" type="text">
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label" for="l0">Açıklama</label>
                                    <textarea name="aciklama" class="form-control" id="" cols="30" rows="10">{{ $data[0]['aciklama'] }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="col-form-label" for="l0">Teklif Durumu</label>
                                    <select name="status" id="" class="form-control">
                                        <option @if($data[0]['status'] == 0) selected @endif value="0">Bekleyen</option>
                                        <option @if($data[0]['status'] == 1) selected @endif  value="1">Onaylanmış</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="button" id="add-product" class="btn btn-primary">Ürün Ekle</button>
                                <div  style="margin-top:10px;" id="product-list">
                                    @foreach($content as $k => $v)
                                        <div style="margin-bottom:5px;" class="row list-item">
                                            <div class="col-md-5">
                                                <select name="urunler[{{$k}}][urunId]" class="form-control">
                                                    @foreach(\App\Urun::all() as $k2 => $v2)
                                                        <option @if($v['urunId'] == $v2['id']) selected @endif value="{{ $v2['id'] }}">{{ $v2['urunAdi'] }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <input name="urunler[{{$k}}][adet]" value="{{ $v['adet'] }}" class="form-control" placeholder="Adet">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger remove">X</button>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                            </div>


                            <div class="form-actions">
                                <div class="form-group row">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary btn-rounded" type="submit">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.widget-body -->
                </div>
                <!-- /.widget-bg -->
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>

    <script>
        var i = $(".list-item").length;
        $("#add-product").click(function () {
            var html=`<div style="margin-bottom:5px;" class="row list-item">
                        <div class="col-md-5">
                            <select name="urunler[`+i+`][urunId]" class="form-control">`;
            @foreach(\App\Urun::all() as $k => $v)
                html+=`<option value="{{ $v['id'] }}">{{ $v['urunAdi'] }}</option>`;
            @endforeach


                html+=`</select></div>
                        <div class="col-md-5">
                            <input name="urunler[`+i+`][adet]" class="form-control" placeholder="Adet">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove">X</button>
                        </div>
                    </div>`;

            $("#product-list").append(html);
            i++;
        });

        $("body").on("click",".remove",function () {
            $(this).closest(".list-item").remove();
        });
    </script>
@endsection
