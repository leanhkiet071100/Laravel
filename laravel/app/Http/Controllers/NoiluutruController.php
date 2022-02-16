<?php

namespace App\Http\Controllers;

use App\Models\Noiluutru;
use App\Models\Diadanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NoiLuuTruRequest;

class NoiluutruController extends Controller
{

     protected function fixImage(Noiluutru $noiluutru)
        {
            if(Storage::disk('public')->exists($noiluutru->Hinh_Noiluutru)){
                 $noiluutru->Hinh_Noiluutru = Storage::url( $noiluutru->Hinh_Noiluutru);
            }else {
                 $noiluutru->Hinh_Noiluutru = '/img/no_img.png';
            }
        }

    public function index($id=0)
    {
        $lsnoiluutru = Noiluutru::simplePaginate(5);
        foreach ($lsnoiluutru as $noiluutru) {
            $this->fixImage($noiluutru);
        }
        $lsnoiluutru1 = Noiluutru::find($id);

        $lsdiadanh = Diadanh::all();
        return view('NoiLuutru.NoiLuutru',['lsnoiluutru' => $lsnoiluutru, 'lsdiadanh' => $lsdiadanh, 'lsnoiluutru1' => $lsnoiluutru1]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
    }

    public function store(NoiLuuTruRequest $request)
    {
        $noiluutru = new Noiluutru;
        
        $noiluutru->fill([
            'Ten_Noiluutru'=>$request->input('TenNoiLuuTru'),
            'Diachi_Noiluutru'=>$request->input('DiaChiNoiLuuTru'),
            'SDT_Noiluutru'=>$request->input('SDTNoiLuuTru'),
            'Hinh_Noiluutru'=>'',
            'Id_Ddanh' => $request->input('DiaDanh'),
            'TrangThaiNoiLuuTru'=>1,
        ]);

        $noiluutru->save();
        if($request->hasFile('Hinh')){
            $noiluutru->Hinh_Noiluutru = $request->file('Hinh')->store('img/noiluutru/'.$noiluutru->id,'public');
        }

        $noiluutru->save();
        return redirect()->route('NoiLuuTru.dsNoiLuuTru')->with('success','Thêm nhu cầu thành công');
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
    public function update(NoiLuuTruRequest $request, $id)
    {
        $noiluutru = Noiluutru::find($id);
        $noiluutru->fill([
            'Ten_Noiluutru'=>$request->input('TenNoiLuuTru'),
            'Diachi_Noiluutru'=>$request->input('DiaChiNoiLuuTru'),
            'SDT_Noiluutru'=>$request->input('SDTNoiLuuTru'),
            'Id_Ddanh' => $request->input('DiaDanh'),
            'TrangThaiNoiLuuTru'=>1,
        ]);

        if($request->hasFile('Hinh')){
            $noiluutru->Hinh_Noiluutru = $request->file('Hinh')->store('img/noiluutru/'.$noiluutru->id,'public');
        }

        $noiluutru->save();
        return redirect()->route('NoiLuuTru.dsNoiLuuTru')->with('success','Sửa nhu cầu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noiluutru = Noiluutru::find($id);
        $noiluutru->delete();
        return redirect()->route('NoiLuuTru.dsNoiLuuTru')->with('success','Xóa thành công');

    }
    //tìm kiếm nơi lưu trú
    public function search(Request $request, $id=0)
    {
        $keyword = $request->input('NoiLuuTru');
        $DiaDanh = $request->input('DiaDanh');
        if($DiaDanh == 0)
        {
            $lsnoiluutru = Noiluutru::where('Ten_Noiluutru','like','%'.$keyword.'%')->simplePaginate(5);
        }
        else
        {
            $lsnoiluutru = Noiluutru::where('Ten_Noiluutru','like','%'.$keyword.'%')->where('Id_Ddanh',$DiaDanh)->simplePaginate(5);
        }
        //$lsnoiluutru = Noiluutru::where('Ten_Noiluutru','like',"%$keyword%")->where('Id_Ddanh',$DiaDanh)->simplePaginate(5);
        foreach ($lsnoiluutru as $noiluutru) {
            $this->fixImage($noiluutru);
        }
        $lsdiadanh = Diadanh::all();
        $lsnoiluutru1 = Noiluutru::find($id);
        return view('NoiLuutru.NoiLuutru',['lsnoiluutru' => $lsnoiluutru, 'lsdiadanh' => $lsdiadanh, 'lsnoiluutru1' => $lsnoiluutru1]);
    }
}
