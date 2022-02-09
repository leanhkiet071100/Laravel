<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quanan;
use App\Models\Monan;
use Illuminate\Support\Facades\DB;

class QuananController extends Controller
{
    /**
     * Display a listing of the resource.
     *d
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsquanan = DB::table('quanan')->select('quanan.Ten_Quan', 'quanan.Hinh_Quan', 'quanan.Diachi_Quan', 'quanan.SDT_Quan', 'quanan.Trangthai', 'diadanh.Ten_Ddanh') ->join('diadanh', 'quanan.Id_Ddanh', '=', 'diadanh.Id_Ddanh')->get();
        return View('QuanAn.QuanAn',['lsquanan' => $lsquanan]);
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
