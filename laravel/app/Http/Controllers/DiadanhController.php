<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diadanh;
use App\Models\Nguoidung;
use App\Models\NhuCau;
use App\Models\Mien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DiaDanhRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DiaDanhController extends Controller
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
        $lsdiadanh = Diadanh::Paginate(5);
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        return View('DiaDanh.DiaDanh',['lsdiadanh' => $lsdiadanh, 'NhuCau' => $NhuCau]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        return View('DiaDanh.ThemDiaDanh',['NhuCau' => $NhuCau, 'Mien' => $Mien]);
    }

    public function store(DiaDanhRequest $request)
    {
        $DiaDanh =new Diadanh;
        $DiaDanh->fill([
            'Ten_Ddanh'=>$request->input('TenDiaDanh'),
            'Ten_Goikhac'=>$request->has('TenGoiKhac') ? $request->input('TenGoiKhac') : 'không có',
            'Diachi_Ddanh'=>$request->input('DiaChi'),
            'Canhvat'=>$request->input('CanhVat'),
            'khihau'=>$request->input('KhiHau'),
            'Tainguyen'=>$request->input('TaiNguyen'),
            'Kinhdo'=>$request->input('KinhDo'),
            'Vido'=>$request->input('ViDo'),
            'Id_Mien'=>$request->input('Mien'),
            'Id_Nguoidung'=>3,
            'Id_Nhucau'=>$request->input('NhuCau'),
            'TrangThaiDiaDanh'=>1,
        ]);
        $DiaDanh->save();
        
        // if($request->hasFile('hinh')){
        //     $DiaDanh->hinh = $request->file('hinh')->store('img/'.$DiaDanh->id,'public');
        // }
        //$DiaDanh->save();
        return Redirect::route('DiaDanh.ChiTietDiaDanh',['id'=>$DiaDanh->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $this->fixImage($DiaDanh);
        // $LuotXem = DB::table('luotxems')->Where('Id_Ddanh', '=', $DiaDanh->id )->count();
        $DiaDanh = Diadanh::find($id);
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        return View('DiaDanh.ChiTietDiaDanh',['DiaDanh'=>$DiaDanh,  'NhuCau' => $NhuCau, 'Mien' => $Mien]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $DiaDanh = Diadanh::find($id);
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        return view('DiaDanh.SuaDiaDanh',['NhuCau' => $NhuCau, 'Mien' => $Mien, 'DiaDanh' => $DiaDanh]);
    }

    public function update(DiaDanhRequest $request, $id)
    {
        $DiaDanh = Diadanh::find($id);
        dd($request->all());
        $DiaDanh->fill([
            'Ten_Ddanh'=>$request->input('TenDiaDanh'),
            'Ten_Goikhac'=>$request->has('TenGoiKhac') ? $request->input('TenGoiKhac') : 'không có',
            'Diachi_Ddanh'=>$request->input('DiaChi'),
            'Canhvat'=>$request->input('CanhVat'),
            'khihau'=>$request->input('KhiHau'),
            'Tainguyen'=>$request->input('TaiNguyen'),
            'Kinhdo'=>$request->input('KinhDo'),
            'Vido'=>$request->input('ViDo'),
            'Id_Mien'=>$request->input('Mien'),
            'Id_Nguoidung'=>3,
            'Id_Nhucau'=>$request->input('NhuCau'),
            'TrangThaiDiaDanh'=>1,
        ]);
        $DiaDanh->save();
        return Redirect::route('DiaDanh.ChiTietDiaDanh',['id'=>$DiaDanh->id])->with('success','Sửa thành công');
    
    
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
        $DiaDanh = Diadanh::find($id);
        $DiaDanh->delete();
        return Redirect::route('DiaDanh.dsDiaDanh')->with('success','Xóa thành công');
    }
  
}
