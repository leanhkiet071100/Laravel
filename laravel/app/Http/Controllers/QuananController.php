<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quanan;
use App\Models\Monan;
use App\Models\Diadanh;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\QuanAnRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class QuanAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *d
     * @return \Illuminate\Http\Response
     */

    protected function fixImage(Quanan $quanans)
        {
            if(Storage::disk('public')->exists($quanans->Hinh_Quan)){
                 $quanans->Hinh_Quan = Storage::url( $quanans->Hinh_Quan);
            }else {
                 $quanans->Hinh_Quan = '/img/no_img.png';
            }
        }
    public function index()
    {
        // load toàn bộ danh sách
        // $lsquanan = Quanan::all();
        // foreach ($lsquanan as $quanans) {
        //     $this->fixImage($quanans);
        // }


        // phân trang
        $lsquanan = Quanan::simplePaginate(5);
        foreach ($lsquanan as $quanans) {
            $this->fixImage($quanans);
        }
        
        $lsDiaDanh = DiaDanh::all();
       
        return View('QuanAn.QuanAn',['lsquanan' => $lsquanan, 'lsDiaDanh' => $lsDiaDanh]);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $lsDiaDanh = DB::table('diadanhs')->get(); 
     
        return View('QuanAn.ThemQuanAn',['lsDiaDanh' => $lsDiaDanh]);
    }

    public function store(QuanAnRequest $request)
    {

        // $rule = [
        //     'tenquanans' => 'required|min:3|max:100',
        //     'hinh' => 'required|min:3|max:100',
        //     'diachiquanans' => 'required|min:3|max:100',
        //     'sdt' => 'required|min:5|max:12|integer',
        //     'Id_Ddanh' => 'required|min:3|max:100',
        // ];

        // $messages = 
        //     [
        //         'required' => ':attribute không được để trống',
        //         'min' => ':attribute không được nhỏ hơn :min',
        //         'max' => ':attribute không được lớn hơn :max',
        //         'integer' => ':attribute phải là số',
        //     ]
        // ;

        // // $request ->validate([
        // //     'tenquanans' => 'required|min:3|max:100',
        // //     'hinh' => 'required|min:3|max:100',
        // //     'diachiquanans' => 'required|min:3|max:100',
        // //     'sdt' => 'required|min:5|max:12|integer',
        // //     'Id_Ddanh' => 'required|min:3|max:100',
        // // ]);
        // $request -> validate($rule, $messages);

       
        // DB::table('quanans')->insert(
        //     [
        //     'Ten_Quan'  => $request->input('tenquanan'),
        //     'Hinh_Quan' =>  '',
        //     'Diachi_Quan' => $request->input('diachiquanan'),
        //     'SDT_Quan' => $request->input('sdt'),
        //     'TrangThai' => 1,
        //     'Id_Ddanh' => $request->input('DiaDanh'),
        //     ]
        // );
         $quanan = new Quanan;
         $quanan->fill([
            'Ten_Quan'  => $request->input('tenquanan'),
            'Hinh_Quan' =>  '',
            'Diachi_Quan' => $request->input('diachiquanan'),
            'SDT_Quan' => $request->input('sdt'),
            'TrangThaiQuanAn' => 1,
            'Id_Ddanh' => $request->input('DiaDanh'),
         ]);
         $quanan->save();

        if($request->hasFile('hinh')){
            $quanan->Hinh_Quan = $request->file('hinh')->store('img/quanan/'.$quanan->id,'public');
        }

        $quanan->save();
        return Redirect::route('QuanAn.dsQuanAn');
      
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

       public function edit($id)
    {
        $quanan = Quanan::find($id);
        $this->fixImage($quanan);
        $lsDiaDanh = DB::table('diadanhs')->get();
        return view('QuanAn.SuaQuanAn',['quanan' => $quanan, 'lsDiaDanh' => $lsDiaDanh]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(QuanAnRequest $request , $id)
    {
        $quanan = Quanan::find($id);
         if($request->hasFile('hinh')){
            $quanan->Hinh_Quan = $request->file('hinh')->store('img/quanan/'.$quanan->id,'public');
        }
        $quanan->fill([
            'Ten_Quan'  => $request->input('tenquanan'),
     
            'Diachi_Quan' => $request->input('diachiquanan'),
            'SDT_Quan' => $request->input('sdt'),
            'TrangThaiQuanAn' => 1,
            'Id_Ddanh' => $request->input('DiaDanh'),
         ]);
        $quanan->save();
       return Redirect::route('QuanAn.dsQuanAn')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quanan = Quanan::find($id);
        $quanan->delete();
    }
}
