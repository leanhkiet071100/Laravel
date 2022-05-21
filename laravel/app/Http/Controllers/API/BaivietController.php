<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baiviet;
use App\Models\HinhBaiViet;
use Illuminate\Support\Facades\DB;
Use App\models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
Use App\models\Diadanh;
use App\models\HinhDiaDanh;
use App\models\Chitietdia;


class BaivietController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dataDiaDanh = Db::select('SELECT baiviet.Id_Baiviet,Noidung,Luotthich,hinhanh_baiviet.Ten_Hinhanh,nguoidungs.Hoten_Nguoidung,diadanh.Ten_Ddanh,hinhanh_diadanh.Ten_Hinhanh_Ddanh,diadanh.Diachi_Ddanh,diadanh.Kinhdo,diadanh.Vido
        // FROM baiviet,hinhanh_baiviet,nguoidungs,diadanh,hinhanh_diadanh
        // WHERE baiviet.Id_Baiviet = hinhanh_baiviet.Id_Baiviet AND nguoidungs.Id_Nguoidung = baiviet.Id_Nguoidung AND diadanh.Id_Ddanh = baiviet.Id_Ddanh AND hinhanh_diadanh.Id_Ddanh = diadanh.Id_Ddanh');
        
        $dataBaiviet = Baiviet::join('hinhanh_baiviets', 'baiviets.id', '=', 'hinhanh_baiviets.Id_Baiviet')
                        ->join('nguoidungs', 'nguoidungs.id', '=', 'baiviets.Id_Nguoidung')
                        ->join('diadanhs', 'diadanhs.id', '=', 'baiviets.Id_Ddanh')
                        ->join('hinhanh_diadanhs', 'hinhanh_diadanhs.Id_Ddanh', '=', 'diadanhs.id')
                        ->select('baiviets.id', 'Noidung', 'Luotthich', 'hinhanh_baiviets.Ten_Hinhanh', 
                        'nguoidungs.Hoten_Nguoidung', 'diadanhs.Ten_Ddanh', 'hinhanh_diadanhs.Ten_Hinhanh_Ddanh',
                         'diadanhs.Diachi_Ddanh', 'diadanhs.Kinhdo', 'diadanhs.Vido')
                        ->OrderBy('baiviets.id', 'desc')->limit(2)->get();

       
           

        foreach($dataBaiviet as $baiviet){
            $baiviet->Hinh_Baiviet = Storage::url($baiviet->Ten_Hinhanh);
            $baiviet->Hinh_Ddanh = Storage::url($baiviet->Ten_Hinhanh_Ddanh);
        }
        return response()->json($dataBaiviet);
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
        
        $validator = Validator::make($request->all(), [
            'noidung' => 'required|max:300',
            'iddiadanh' => 'required',
            'hinhanh' => 'required',
        ]);

        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
      
        $baiviet =  Baiviet::create(
            [
                'Id_Nguoidung' => auth()->user()->id,
                'Id_Ddanh' => $request->input('iddiadanh'),
                'Noidung' => $request->input('noidung'),
                'Hinh_Baiviet' => $request->input('hinhanh'),
            ]
        );
       
   


        return response()->json( $baiviet, 200);
       
   
        
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
         $atts = $request->validate([
             'body' => 'required|max:300',]
        );
        $baiviet = Baiviet::find($id);
        if(!$baiviet)
        {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        if($post->user_id != auth()->user()->id)
        {
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }
        $baiviet->update([
            'Noidung' => $atts['body'],
        ]);

        return response([
            'data' => $baiviet,
            'message' => 'Success',
        ], 200);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
    }

    // load bài viết người dùng
    public function loadbaivietnguoidung(Request $request)
    {
         $dataBaiviet = Baiviet::join('hinhanh_baiviets', 'baiviets.id', '=', 'hinhanh_baiviets.Id_Baiviet')
                        ->join('nguoidungs', 'nguoidungs.id', '=', 'baiviets.Id_Nguoidung')
                        ->join('diadanhs', 'diadanhs.id', '=', 'baiviets.Id_Ddanh')
                        ->join('hinhanh_diadanhs', 'hinhanh_diadanhs.Id_Ddanh', '=', 'diadanhs.id')
                        ->select('baiviets.id', 'Noidung', 'Luotthich', 'hinhanh_baiviets.Ten_Hinhanh', 
                        'nguoidungs.Hoten_Nguoidung', 'diadanhs.Ten_Ddanh', 'hinhanh_diadanhs.Ten_Hinhanh_Ddanh',
                         'diadanhs.Diachi_Ddanh', 'diadanhs.Kinhdo', 'diadanhs.Vido')
                        ->OrderBy('baiviets.id', 'desc')
                        ->where('baiviets.Id_Nguoidung', '=', auth()->user()->id)
                        ->get();
        



        return response()->json($dataBaiviet);
        //$lstDiadanh=Diadanh::all();
        //return view('DiaDanh/dsDiaDanh',['lstDiadanh' => $lstDiadanh]);
              
    }
}
