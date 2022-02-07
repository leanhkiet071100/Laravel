<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\API_Models\Diadanh;
use Illuminate\Support\Facades\DB;

class DiadanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataDiaDanh = Db::select('select diadanh.Id_Ddanh,Ten_Ddanh, Ten_Goikhac, Diachi_Ddanh, Canhvat, Khihau, Tainguyen, Kinhdo, Vido,hinhanh_diadanh.Ten_Hinhanh_Ddanh 
        from diadanh,hinhanh_diadanh where diadanh.Id_Ddanh = hinhanh_diadanh.Id_Ddanh');
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
