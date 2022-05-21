<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diadanh;
use App\Models\Nguoidung;
use App\Models\NhuCau;
use App\Models\Mien;
use App\Models\Quanan;
use App\Models\Noiluutru;
use App\Models\HinhDiaDanh;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DiaDanhRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Auth;

class DiaDanhController extends Controller
{
    Public function __construct(){

      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function fixImage(HinhDiaDanh $HinhDiaDanh)
    {
        if(Storage::disk('public')->exists($HinhDiaDanh->Ten_Hinhanh_Ddanh)){
            $HinhDiaDanh->Ten_Hinhanh_Ddanh = Storage::url($HinhDiaDanh->Ten_Hinhanh_Ddanh);
        }else {
            $HinhDiaDanh->Ten_Hinhanh_Ddanh = '/img/no_img.png';
        }
    }

    protected function fixImageQuan(Quanan $quanans)
        {
            if(Storage::disk('public')->exists($quanans->Hinh_Quan)){
                 $quanans->Hinh_Quan = Storage::url( $quanans->Hinh_Quan);
            }else {
                 $quanans->Hinh_Quan = '/img/no_img.png';
            }
        }

    public function index()
    {
        //$lsdiadanh = Diadanh::orderby('Ten_Ddanh')->paginate(10);
        $lsdiadanh = Diadanh::join('hinhanh_diadanhs', 'diadanhs.id', '=', 'hinhanh_diadanhs.Id_Ddanh')
                            ->select('diadanhs.*', 'hinhanh_diadanhs.Ten_Hinhanh_Ddanh')
                            ->orderby('diadanhs.id')->paginate(10);
        
        $lsHinh = HinhDiaDanh::all();
        
        foreach($lsHinh as $Hinh){
            $this->fixImage($Hinh);
        }



        //dd($lsdiadanh);
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        return View('DiaDanh.DiaDanh',['lsdiadanh' => $lsdiadanh, 'NhuCau' => $NhuCau, 'Mien' => $Mien, 'lsHinh' => $lsHinh]);
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
        $lsHinh = HinhDiaDanh::all();
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
            'Id_Nguoidung'=>Auth::user()->id,
            'Id_Nhucau'=>$request->input('NhuCau'),
            'TrangThaiDiaDanh'=>1,
        ]);
        $DiaDanh->save();

        if($request->hasFile('image')){
             for($i = 0; $i < count($request->file('image')); $i++){
                $hinh = new HinhDiaDanh;
                $hinh -> Id_Ddanh = $DiaDanh->id;
                $hinh -> Ten_Hinhanh_Ddanh = $request->file('image')[$i]->store('img/hinhdiadanh'.$DiaDanh->id,'public');
                $hinh -> TrangThaiHinhAnhDD = 1;
                $hinh -> save();
             }
        }
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
        $lsHinh = HinhDiaDanh::where('Id_Ddanh', '=', $id)->get();
        foreach($lsHinh as $Hinh){
            $this->fixImage($Hinh);
        }
 
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        return View('DiaDanh.ChiTietDiaDanh',['DiaDanh'=>$DiaDanh,  'NhuCau' => $NhuCau, 'Mien' => $Mien, 'lsHinh' => $lsHinh]);
    
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
        $lsHinh = HinhDiaDanh::where('Id_Ddanh', '=', $id)->get();
        foreach($lsHinh as $Hinh){
            $this->fixImage($Hinh);
        }
        return view('DiaDanh.SuaDiaDanh',['NhuCau' => $NhuCau, 'Mien' => $Mien, 'DiaDanh' => $DiaDanh, 'lsHinh' => $lsHinh]);
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'TenDiaDanh' => 'required',
            'DiaChi' => 'required',
            'CanhVat' => 'required',
            'KhiHau' => 'required',
            'TaiNguyen' => 'required',
            'KinhDo' => 'required',
            'ViDo' => 'required',
            'Mien' => 'required',
            'NhuCau' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $message = [
            'required' => ':attribute không được để trống',
            'image' => ':attribute phải là hình ảnh',
        ];

        $attribute = [
            'TenDiaDanh' => 'Tên địa danh',
            'DiaChi' => 'Địa chỉ',
            'CanhVat' => 'Cảnh vật',
            'KhiHau' => 'Khi hậu',
            'TaiNguyen' => 'Tài nguyên',
            'KinhDo' => 'Kinh độ',
            'ViDo' => 'Vĩ độ',
            'Mien' => 'Miền',
            'NhuCau' => 'Nhu cầu',
        ];
        
        
        $request->validate($rule, $message, $attribute);




        $DiaDanh = Diadanh::find($id);
        
          $lsHinh = HinhDiaDanh::where('Id_Ddanh', '=', $id)->get();
            foreach($lsHinh as $Hinh){
              if($request->hasFile('Hinh'.$Hinh->id)){
                $Hinh->Ten_Hinhanh_Ddanh = $request->file('Hinh'.$Hinh->id)->store('img/hinhdiadanh'.$DiaDanh->id,'public');
                $Hinh->save();
              }
            }


        
        if($request->hasFile('image')){
            //$lsHinh = HinhDiaDanh::where('Id_Ddanh', '=', $id)->get();
            // foreach($lsHinh as $Hinh){
            //     $Hinh->delete();
            // }
            for($i = 0; $i < count($request->file('image')); $i++){
                $hinh = new HinhDiaDanh;
                $hinh -> Id_Ddanh = $DiaDanh->id;
                $hinh -> Ten_Hinhanh_Ddanh = $request->file('image')[$i]->store('img/hinhdiadanh'.$DiaDanh->id,'public');
                $hinh -> TrangThaiHinhAnhDD = 1;
                $hinh -> save();
             }
        }
    
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
            'Id_Nguoidung'=>Auth::user()->id,
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
  
    public function search(){
        // $keyword = request()->TenDiaDanh;
        // $DiaDanh = Diadanh::where('Ten_Ddanh','like','%'.$keyword.'%')->paginate(10);
        // $NhuCau = NhuCau::all();
        // $Mien =  Mien::all();

        $keyword = request()->TenDiaDanh;
        $MienKey = request()->Mien;
      if($MienKey == 0){
        $DiaDanh = Diadanh::where('Ten_Ddanh','like','%'.$keyword.'%')->paginate(10);
          }
        else{

        $DiaDanh = Diadanh::where('Ten_Ddanh','like','%'.$keyword.'%')->where('Id_Mien','=',$MienKey)->paginate(10);
    }
        $Mien =  Mien::all();

        return View('DiaDanh.DiaDanh',['lsdiadanh' => $DiaDanh, 'Mien' => $Mien]);

    }

      public function dsXoa(){
        //$lsDDXoa = Diadanh::Withtrashed()->get();// lấy hết danh sách bao goòm xóa mền
        $lsDDXoa = Diadanh::onlyTrashed()->paginate(10);// danh sách xóa mềm
         $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        return View('DiaDanh.dsXoa',['lsDDXoa' => $lsDDXoa, 'NhuCau' => $NhuCau, 'Mien' => $Mien]);
  
    }

    public function chitiet($tendiadanh){
        //$DiaDanh = Diadanh::where('Ten_Ddanh','=',$tendiadanh)->first();
        $DiaDanh = Diadanh::withTrashed()->where('Ten_Ddanh','=',$tendiadanh)->first();
        //$DiaDanh = Diadanh::olyTrashed()->where('Ten_Ddanh','=',$tendiadanh)->first();

   
        //$DiaDanh = Diadanh::olyTrashed()->Where('Ten_Ddanh', '=', $tendiadanh)->first();
        //$DiaDanh = Diadanh::olyTrashed()->Where('id', '=', $id)->first();
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        return View('DiaDanh.ChiTietDiaDanh',['DiaDanh'=>$DiaDanh,  'NhuCau' => $NhuCau, 'Mien' => $Mien]);
    }

    public function khoiphuc($id){
        $DiaDanh = Diadanh::onlyTrashed()->where('id', '=', $id)->first();
        $DiaDanh->restore();
        return Redirect::route('DiaDanh.dsDiaDanh')->with('success','Khôi phục thành công');
    }

    public function quanan($id){
        $lsquanan =  Diadanh::find($id)->quanan()->paginate(10);
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        $DiaDanh = Diadanh::find($id);

        return View('DiaDanh.QuanAnDiaDanh',['DiaDanh'=>$DiaDanh,  'NhuCau' => $NhuCau, 'Mien' => $Mien, 'lsquanan' => $lsquanan]);
    }

    public function timquanan($id)
    {
        $keyword = request()->TenQuanAn;
        $lsquanan =  Diadanh::find($id)->quanan()->where('Ten_Quan','like','%'.$keyword.'%')->paginate(10);
        foreach ($lsquanan as $quanan) {
             $this->fixImageQuan($quanan);
        }
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        $DiaDanh = Diadanh::find($id);

        return View('DiaDanh.QuanAnDiaDanh',['DiaDanh'=>$DiaDanh,  'NhuCau' => $NhuCau, 'Mien' => $Mien, 'lsquanan' => $lsquanan]);
    }

    public function noiluutru($id){
        $lsnoiluutru =  Diadanh::find($id)->noiluutru()->paginate(10);
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        $DiaDanh = Diadanh::find($id);
    $lsnoiluutru1 = Noiluutru::find($id);
    
        return View('DiaDanh.NoiLuutruDiaDanh',['DiaDanh'=>$DiaDanh,  'NhuCau' => $NhuCau, 'Mien' => $Mien, 'lsnoiluutru' => $lsnoiluutru, 'lsnoiluutru1' => $lsnoiluutru1]);
    }

    public function timnoiluutru($id)
    {
        $keyword = request()->NoiLuuTru;
        $lsnoiluutru =  Diadanh::find($id)->noiluutru()->where('Ten_Noiluutru','like','%'.$keyword.'%')->paginate(10);
        $NhuCau = NhuCau::all();
        $Mien =  Mien::all();
        $DiaDanh = Diadanh::find($id);
         $lsnoiluutru1 = Noiluutru::find($id);
      
        return View('DiaDanh.NoiLuutruDiaDanh',['DiaDanh'=>$DiaDanh,  'NhuCau' => $NhuCau, 'Mien' => $Mien, 'lsnoiluutru' => $lsnoiluutru, 'lsnoiluutru1' => $lsnoiluutru1]);
    }
}
