<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monan;
use App\Models\Quanan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MonAnRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

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

    public function index($id, $idmon=11)
    {
        $lsmonan = Monan::where('Id_Quan', $id)->get();
         foreach ($lsmonan as $monan) {
            $this->fixImage($monan);
        }
        $monan = Monan::find($idmon);
        $quanan =  Quanan::find($id);
        return view('MonAn.MonAn',['lsmonan' => $lsmonan, 'quanan' => $quanan, 'monan' => $monan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonAnRequest $request, $id)
    {
        
        $monan = new Monan;
        $monan->Ten_Mon = $request->input('TenMon');
        $monan->Gia_ban = $request->input('GiaMon');
        $monan->Id_Quan = $id;
        $monan->TrangThaiMonAn = 1;
        $monan->Hinh_Mon = '';
        $monan->save();
         if($request->hasFile('Hinh')){
             $monan->Hinh_Mon = $request->file('Hinh')->store('img/monan/'.$monan->id,'public');
        }

        $monan->save();
        //return Redirect::to('/quanan/'.$id.'/monan');
        return Redirect::Route('MonAn',['id' => $id])->with('success','Thêm món ăn thành công');

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $MonAn = Monan::find($id);
        $this->fixImage($MonAn);
        $lsDiaDanh = Diadanh::all();
        return view('monan.Suamonan',['MonAn' => $MonAn, 'lsDiaDanh' => $lsDiaDanh]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $idmon = 0)

    {
        $monan = Monan::find($idmon);

        $this->fixImage($monan);
         $quanan =  Quanan::find($id);
        $lsmonan = Monan::where('Id_Quan', $id)->get();
          foreach ($lsmonan as $monan1) {
            $this->fixImage($monan1);
        }
     
        return view('MonAn.MonAn',['monan' => $monan, 'lsmonan' => $lsmonan, 'quanan' => $quanan]);
    }

    public function update(Request $request, $id, $idmon)
    {
        $rule= [
            'TenMon' => 'required',
            'GiaMon' => 'required|integer',
            'Hinh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $messages = [
             'required' => ':attribute không được để trống',
                'unique' => ':attribute đã tồn tại',
                'max' => ':attribute không được lớn hơn :max', 
        ];
        $attributes = [
            'TenMon' => 'Tên món ăn',
            'GiaMon' => 'Giá món ăn',
            'Hinh' => 'Hình ảnh',
        ];
        $request->validate($rule, $messages, $attributes);
        $monan = Monan::find($idmon);
         if($request->hasFile('Hinh')){
            $monan->Hinh_Mon = $request->file('Hinh')->store('img/monan/'.$monan->id,'public');
        }
        $monan->fill([
            'Ten_Mon'=>$request->input('TenMon'),
            'Gia_ban'=>$request->input('Giaban'),
            'Id_Quan'=>$id,
            'TrangThai_Mon'=>1,
         ]);
        $monan->save();
       return Redirect::route('MonAn', $id)->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idmon)
    {
        $monan = Monan::find($idmon);
        $monan->delete();
        return Redirect::route('MonAn', $id)->with('success', 'Xóa thành công');
    }
}
