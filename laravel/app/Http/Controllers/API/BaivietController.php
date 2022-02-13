<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\API_Models\Baiviet;
use Illuminate\Support\Facades\DB;

class BaivietController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataDiaDanh = Db::select('SELECT baiviet.Id_Baiviet,Noidung,Luotthich,hinhanh_baiviet.Ten_Hinhanh,nguoidungs.Hoten_Nguoidung,diadanh.Ten_Ddanh,hinhanh_diadanh.Ten_Hinhanh_Ddanh,diadanh.Diachi_Ddanh,diadanh.Kinhdo,diadanh.Vido
        FROM baiviet,hinhanh_baiviet,nguoidungs,diadanh,hinhanh_diadanh
        WHERE baiviet.Id_Baiviet = hinhanh_baiviet.Id_Baiviet AND nguoidungs.Id_Nguoidung = baiviet.Id_Nguoidung AND diadanh.Id_Ddanh = baiviet.Id_Ddanh AND hinhanh_diadanh.Id_Ddanh = diadanh.Id_Ddanh');
        return $dataDiaDanh;
        //$lstDiadanh=Diadanh::all();
        //return view('DiaDanh/dsDiaDanh',['lstDiadanh' => $lstDiadanh]);
              
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
        return Diadanh::find($id);
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
