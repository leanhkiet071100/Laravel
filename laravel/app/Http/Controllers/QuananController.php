<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuanAn;
use App\Models\Monan;
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

    protected function fixImage(quanans $quanans)
        {
            if(Storage::disk('public')->exists($quanans->hinh)){
                 $quanans->Hinh_Quan = Storage::url( $quanans->Hinh_Quan);
            }else {
                 $quanans->Hinh_Quan = '/img/no_img.png';
            }
        }
    public function index()
    {
        $lsquanan = DB::table('quanans')->select('quanans.Ten_Quan', 'quanans.Hinh_Quan', 'quanans.Diachi_Quan', 'quanans.SDT_Quan', 'quanans.Trangthai', 'diadanhs.Ten_Ddanh') ->join('diadanhs', 'quanans.Id_Ddanh', '=', 'diadanhs.Id_Ddanh')->get();
        return View('QuanAn.QuanAn',['lsquanan' => $lsquanan]);
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
            'Trangthai' => 1,
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
