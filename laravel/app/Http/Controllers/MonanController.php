<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monan;
use Illuminate\Support\Facades\DB;

class MonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsmonan =  DB::table('monan')->where('monan.Id_Quan', 1)->join('quanan', 'monan.Id_Quan', '=', 'quanan.Id_Quan')->get();
        $quanan = DB::table('quanan')->where('quanan.Id_Quan', 1)->get();
        return view('QuanAn.MonAn',['lsmonan' => $lsmonan, 'quanan' => $quanan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
