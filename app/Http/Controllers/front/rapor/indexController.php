<?php

namespace App\Http\Controllers\front\rapor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        return view('front.rapor.index');
    }
}
