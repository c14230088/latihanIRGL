<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jadwalController extends Controller
{
    function jadwal(){
        return view('jadwal');
    }
}
