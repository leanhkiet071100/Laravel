<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  

class NoiluutruController extends Controller
{
       public function index()
    {
        $lsnoiluutru = DB::table('noiluutru')->select('noiluutru.Ten_Noiluutru', 'noiluutru.Hinh_Noiluutru', 'noiluutru.Diachi_Noiluutru', 'noiluutru.SDT_Noiluutru', 'noiluutru.Trangthai','diadanh.Ten_Ddanh') ->join('diadanh', 'noiluutru.Id_Ddanh', '=', 'diadanh.Id_Ddanh')->get();
        $diadanh = DB::table('diadanh')->get();
        return view('NoiLuuTru.NoiLuuTru',['lsnoiluutru' => $lsnoiluutru, 'diadanh' => $diadanh]);

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
