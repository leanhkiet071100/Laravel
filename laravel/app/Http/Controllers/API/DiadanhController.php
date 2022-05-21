<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diadanh;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DiadanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dataDiaDanh = Db::select('select diadanhs.id,Ten_Ddanh, Ten_Goikhac, Diachi_Ddanh, Canhvat, Khihau, Tainguyen, Kinhdo, Vido,hinhanh_diadanhs.Ten_Hinhanh_Ddanh 
        // from diadanhs,hinhanh_diadanhs where diadanhs.id = hinhanh_diadanhs.Id_Ddanh');

        // return response()->json($dataDiaDanh);

        //  $dataDiaDanh = Diadanh::all();
        //     return response()->json($dataDiaDanh);
        //  dd($dataDiaDanh);

        $dataDiaDanh= Diadanh::join('hinhanh_diadanhs','diadanhs.id','=','hinhanh_diadanhs.Id_Ddanh')->select('diadanhs.id','Ten_Ddanh','Ten_Goikhac','Diachi_Ddanh','Canhvat','Khihau','Tainguyen','Kinhdo','Vido','hinhanh_diadanhs.Ten_Hinhanh_Ddanh')
        ->OrderBy('diadanhs.created_at')
        ->limit(3)
        ->get();
        foreach($dataDiaDanh as $diadanh){
            $diadanh->Hinh_Ddanh = Storage::url($diadanh->Ten_Hinhanh_Ddanh);
        }
        return response()->json($dataDiaDanh);

        // $lsdiadanh = Diadanh::orderby('Ten_Ddanh')->get(); 
     
        // return response()->json($lsdiadanh);

        // $lsdiadanh = DB::table('diadanhs'); 
       
        // return response()->json($lsdiadanh);
       

     
    
     
              
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
