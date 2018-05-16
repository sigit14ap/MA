<?php

namespace App\Http\Controllers\Pusat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\m_pesantren;
use App\ref_takhasus;

class PesantrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pusat_lembaga.pesantren.index');
    }

    public function data_index()
    {
        $data = m_pesantren::select('id','nama_pondok_pesantren','nama_yayasan')->get();
        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('options',function ($data){
                                    $button = '<div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-lg"><i class="fa fa-list"></i>&nbsp;<span class="caret"></span></button>
                    
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="margin-left: -88px;">
                                            
                                                    <li role="presentation"><a role="menuitem" href="'.route('pesantren.edit',['id'=>$data->id ]).'"><i class="fa fa-search-plus fa-lg"></i>&nbsp;&nbsp;Detail</a></li>

                                                    <li role="presentation" class="divider" style="height: 2px;"></li>

                                                    <li role="presentation"><a role="menuitem" href="'.route('pesantren.edit',['id'=>$data->id ]).'"><i class="fa fa-pencil fa-lg"></i>&nbsp;&nbsp;Ubah data</a></li>
                                                </ul>
                                            </div>';
                                    
                                return $button;
                            })
                            ->rawColumns(['options'])
                            ->setRowAttr([
                                'style' => 'text-align: center',
                            ])
                            ->make(true);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $takhasus = ref_takhasus::all();
        return view('pusat_lembaga.pesantren.create',compact('takhasus'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
