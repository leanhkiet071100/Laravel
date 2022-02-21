<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Noiluutru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NoiluutruController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$dataNoiluutru = DB::select('SELECT Id_Noiluutru,Id_Ddanh,Ten_Noiluutru,Hinh_Noiluutru,Diachi_Noiluutru,SDT_Noiluutru FROM noiluutru ');
        //$dataNoiluutru = json_decode(json_encode($dataNoiluutru), true);
        $dataNoiluutru = Noiluutru::all();
        //return $dataNoiluutru;
        foreach ($dataNoiluutru as $noiluutru) {
            $noiluutru->Hinh_Noiluutru = Storage::url($noiluutru->Hinh_Noiluutru);
        }
        return response()->json($dataNoiluutru);
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
