<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class QuananController extends Controller
{
    /**
     * Display a listing of the resource.
     *d
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Quanan::all();
        // $data = DB::select('select Id_Quan,Id_Ddanh,Ten_Quan,Hinh_Quan,
        // Diachi_Quan,SDT_Quan,Trangthai from quanan');


        // return $data;

        $data = Quanan::all();
        foreach ($data as $quanan) {
            $quanan->Hinh_Quan = Storage::url($quanan->Hinh_Quan);
        }
        return response()->json($data);

  

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
