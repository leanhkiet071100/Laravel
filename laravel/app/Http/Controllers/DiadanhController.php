<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diadanh;
use App\Models\Nguoidung;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storeDiadanhRequest;
use App\Http\Requests\UpdateDiadanhRequest;

class DiadanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function fixImage(Diadanh $DiaDanh)
    {
        if(Storage::disk('public')->exists($DiaDanh->hinh)){
            $DiaDanh->hinh = Storage::url($DiaDanh->hinh);
        }else {
            $DiaDanh->hinh = '/img/no_img.png';
        }
    }

    public function index()
    {
        $lsdiadanh = DB::table('diadanh')->select('diadanh.Ten_Ddanh','nguoidungs.Hoten_Nguoidung', 'diadanh.Trangthai' )->join('nguoidungs', 'diadanh.Id_Nguoidung', '=','nguoidungs.Id_Nguoidung')->get();

        return View('DiaDanh.dsDiaDanh',['lsdiadanh' => $lsdiadanh]);
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
