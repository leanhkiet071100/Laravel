<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhuCau;

class NhuCauController extends Controller
{
   
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datanhucau = NhuCau::select('id','Tennhucau','TrangThaiNhuCau')->get();
     
        return response()->json($datanhucau);
    }
}
