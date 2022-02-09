<?php

namespace App\Http\Controllers;

use App\Models\Diadanh;
use App\Models\NhuCau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhuCauController extends Controller
{
      public function index()
    {
        $lsnhucau = DB::table('nhucau')->get();

        return View('NhuCau.NhuCau',['lsnhucau' => $lsnhucau]);
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
