<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MonanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

         protected function fixImage(Monan $MonAn)
        {
            if(Storage::disk('public')->exists($MonAn->Hinh_Mon)){
                 $MonAn->Hinh_Mon = Storage::url( $MonAn->Hinh_Mon);
            }else {
                 $MonAn->Hinh_Mon = '/img/no_img.png';
            }
        }
    public function index()
    {
        $dataMonan=Monan::orderby('Ten_Mon')->get();
        
        Return response()->json($dataMonan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $monan = new Monan;
        $monan->Ten_Mon = $request->input('TenMon');
        $monan->Gia_ban = $request->input('GiaMon');
        $monan->Id_Quan = $request->input('IdQuan');
        $monan->TrangThaiMonAn = 1;
        $monan->Hinh_Mon = '';
        $monan->save();
        if($request->hasFile('Hinh')){
            $monan->Hinh_Mon = $request->file('Hinh')->store('img/monan/'.$monan->id,'public');
        }
        $monan->save();
        return $monan;
    
        //  $monan = new Monan;
        // $monan->Ten_Mon =  $request->input('TenMon');
        // $monan->Gia_ban =  $request->input('GiaMon');
        // $monan->Id_Quan = $id;
        // $monan->TrangThaiMonAn = 1;
        // $monan->Hinh_Mon = '';
        // $monan->save();
        //  if($request->hasFile('Hinh')){
        //      $monan->Hinh_Mon = $request->file('Hinh')->store('img/monan/'.$monan->id,'public');
        // }

        
        // $monan->save();

        // return $monan;
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
