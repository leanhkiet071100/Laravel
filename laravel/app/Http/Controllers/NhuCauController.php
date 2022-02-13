<?php

namespace App\Http\Controllers;

use App\Models\Diadanh;
use App\Models\NhuCau;

use Illuminate\Http\Request;
use App\Http\Requests\NhuCauRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NhuCauController extends Controller
{
      public function index($id=0)
    {
        
            $nhucau = nhucau::find($id);
            $lsnhucau = NhuCau::all();
        
            return View('NhuCau.NhuCau',['lsnhucau' => $lsnhucau, 'nhucau' => $nhucau]);
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

    public function store(NhuCauRequest $request)
    {
        $NhuCau = new NhuCau;
        $NhuCau->fill([
            'Tennhucau'=>$request->input('TenNhuCau'),
            'TrangThaiNhuCau'=>1,
        ]);
        $NhuCau->save();
        return redirect()->route('NhuCau.dsNhuCau')->with('success','Thêm nhu cầu thành công');
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
    public function update(NhuCauRequest $request, $id)
    {
        $NhuCau = NhuCau::find($id);
        $NhuCau->fill([
            'Tennhucau'=>$request->input('TenNhuCau'),
            'TrangThaiNhuCau'=>1,
        ]);
        $NhuCau->save();
        return redirect()->route('NhuCau.dsNhuCau')->with('success','Sửa nhu cầu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $NhuCau = NhuCau::find($id);
        $NhuCau->delete();
        return redirect()->route('NhuCau.dsNhuCau')->with('success','Xóa thành công');
    }
}
