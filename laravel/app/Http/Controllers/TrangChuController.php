<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class TrangChuController extends Controller
{
    Public function __construct(){

      $this->middleware('auth');
    }

    public function index()
    {
        return view('Dashboard.Dashboard');
    }
}
