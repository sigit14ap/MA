<?php

namespace App\Http\Controllers\Lembaga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\m_pesantren;
use App\ref_takhasus;
use App\ref_provinsi;
use Session;
use Validator;
use App\ref_kabupaten;
use App\m_lembaga;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pusat_lembaga.lembaga.index');
    }

    public function data_index()
    {
        $data = m_lembaga::join('ref_takhasus','m_lembaga.takhasus_id','=','ref_takhasus.id')->select('m_lembaga.id','m_lembaga.nama_lembaga','ref_takhasus.nama_takhasus')->get();
        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('options',function ($data){
                                    $button = '<div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-lg"><i class="fa fa-list"></i>&nbsp;<span class="caret"></span></button>
                    
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="margin-left: -88px;">
                                            
                                                    <li role="presentation"><a role="menuitem" href="'.route('lembaga.show',['id'=>$data->id ]).'"><i class="fa fa-search-plus fa-lg"></i>&nbsp;&nbsp;Detail</a></li>

                                                    <li role="presentation" class="divider" style="height: 2px;"></li>

                                                    <li role="presentation"><a role="menuitem" href="'.route('lembaga.edit',['id'=>$data->id ]).'"><i class="fa fa-pencil fa-lg"></i>&nbsp;&nbsp;Ubah data</a></li>
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
        $provinsi = ref_provinsi::all();
        $pesantren = m_pesantren::all();
        $type_form = 'create';
        return view('pusat_lembaga.lembaga.create',compact('takhasus','provinsi','pesantren','type_form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_lembaga' => 'required|string|max:255',
            'takhasus_id' => 'required|integer',
            'tahun_berdiri' => 'required',
            'provinsi_id' => 'required|integer',
            'kabupaten_id' => 'required|integer',
            'alamat' => 'required',
            'no_telp' => 'required|string|max:50',
            'fax' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'website' => 'required|string|max:100',
            'nama_mudir' => 'required|string|max:100',
            'luas_tanah' => 'required',
            'pesantren_id' => 'required|integer',
        ]);

        $cek_provinsi = ref_provinsi::where('id','=',$request->provinsi_id)->first();
        
        if(!is_null($cek_provinsi)){
            $cek_kab = ref_kabupaten::where('provinsi_id','=',$request->provinsi_id)
                        ->where('id','=',$request->kabupaten_id)
                        ->first();

            if(is_null($cek_kab)){
                Session::flash('error_msg', 'Kabupaten/Kota Tidak Ditemukan!');
                return back()->withInput();
            }else{
                $cek_takhasus = ref_takhasus::where('id','=',$request->takhasus_id)
                                ->first();

                if(is_null($cek_takhasus)){
                    Session::flash('error_msg', 'Takhasus Tidak Ditemukan!');
                    return back()->withInput();
                }else{
                    $cek_pesantren = m_pesantren::where('id','=',$request->pesantren_id)
                                    ->first();

                    if(is_null($cek_pesantren)){
                        Session::flash('error_msg', 'Pesantren Tidak Ditemukan!');
                        return back()->withInput();
                    }else{
                        $store = new m_lembaga();
                        $store->nama_lembaga = $request->nama_lembaga;
                        $store->takhasus_id = $request->takhasus_id;
                        $store->tahun_berdiri = $request->tahun_berdiri;
                        $store->provinsi_id = $request->provinsi_id;
                        $store->kabupaten_id = $request->kabupaten_id;
                        $store->alamat = $request->alamat;
                        $store->no_telpn = $request->no_telp;
                        $store->fax = $request->fax;
                        $store->email = $request->email;
                        $store->website = $request->website;
                        $store->nama_mudir = $request->nama_mudir;
                        $store->status = 0;
                        $store->luas_tanah = $request->luas_tanah;
                        $store->pesantren_id = $request->pesantren_id;
                        $store->save();
                        Session::flash('success_msg', 'Berhasil Ditambahkan!');
                        return redirect()->to('/home/lembaga');
                    }
                }
            }
        }else{
            Session::flash('error_msg', 'Provinsi Tidak Ditemukan!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lembaga = m_lembaga::where('id','=',$id)->first();
        if(is_null($lembaga)){
            Session::flash('error_msg', 'Lembaga Tidak Ditemukan!');
            return redirect()->to('/home/lembaga');
        }else{
            $show = DB::table('m_lembaga')
                        ->join('m_pesantren','m_lembaga.pesantren_id','m_pesantren.id')
                        ->join('ref_takhasus','m_lembaga.takhasus_id','ref_takhasus.id')
                        ->join('ref_provinsi','m_lembaga.provinsi_id','ref_provinsi.id')
                        ->join('ref_kabupaten','m_lembaga.kabupaten_id','ref_kabupaten.id')
                        ->select('m_lembaga.*','ref_takhasus.nama_takhasus','ref_provinsi.nama_provinsi','ref_kabupaten.nama_kabupaten','m_pesantren.nama_pondok_pesantren')
                        ->where('m_lembaga.id','=',$id)
                        ->first();
            return view('pusat_lembaga.lembaga.show',compact('show'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lembaga = m_lembaga::where('id','=',$id)->first();
        if(is_null($lembaga)){
            Session::flash('error_msg', 'Lembaga Tidak Ditemukan!');
            return redirect()->to('/home/lembaga');
        }else{
            $takhasus = ref_takhasus::all();
            $provinsi = ref_provinsi::all();
            $pesantren = m_pesantren::all();
            $kota = ref_kabupaten::where('provinsi_id','=',$lembaga->provinsi_id)->get();
            $type_form = 'edit';
            return view('pusat_lembaga.lembaga.edit',compact('pesantren','takhasus','provinsi','type_form','kota','lembaga'));
        }
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
        $lembaga = m_lembaga::where('id','=',$id)->first();
        if(is_null($lembaga)){
            Session::flash('error_msg', 'Lembaga Tidak Ditemukan!');
            return redirect()->to('/home/lembaga');
        }else{
            $this->validate($request,[
                'nama_lembaga' => 'required|string|max:255',
                'takhasus_id' => 'required|integer',
                'tahun_berdiri' => 'required',
                'provinsi_id' => 'required|integer',
                'kabupaten_id' => 'required|integer',
                'alamat' => 'required',
                'no_telpn' => 'required|string|max:50',
                'fax' => 'required|string|max:50',
                'email' => 'required|email|max:100',
                'website' => 'required|string|max:100',
                'nama_mudir' => 'required|string|max:100',
                'luas_tanah' => 'required',
                'pesantren_id' => 'required|integer',
            ]);
    
            $cek_provinsi = ref_provinsi::where('id','=',$request->provinsi_id)->first();
            
            if(!is_null($cek_provinsi)){
                $cek_kab = ref_kabupaten::where('provinsi_id','=',$request->provinsi_id)
                            ->where('id','=',$request->kabupaten_id)
                            ->first();
    
                if(is_null($cek_kab)){
                    Session::flash('error_msg', 'Kabupaten/Kota Tidak Ditemukan!');
                    return back()->withInput();
                }else{
                    $cek_takhasus = ref_takhasus::where('id','=',$request->takhasus_id)
                                    ->first();
    
                    if(is_null($cek_takhasus)){
                        Session::flash('error_msg', 'Takhasus Tidak Ditemukan!');
                        return back()->withInput();
                    }else{
                        $cek_pesantren = m_pesantren::where('id','=',$request->pesantren_id)
                                        ->first();
    
                        if(is_null($cek_pesantren)){
                            Session::flash('error_msg', 'Pesantren Tidak Ditemukan!');
                            return back()->withInput();
                        }else{
                            $store = m_lembaga::find($id);
                            $store->nama_lembaga = $request->nama_lembaga;
                            $store->takhasus_id = $request->takhasus_id;
                            $store->tahun_berdiri = $request->tahun_berdiri;
                            $store->provinsi_id = $request->provinsi_id;
                            $store->kabupaten_id = $request->kabupaten_id;
                            $store->alamat = $request->alamat;
                            $store->no_telpn = $request->no_telpn;
                            $store->fax = $request->fax;
                            $store->email = $request->email;
                            $store->website = $request->website;
                            $store->nama_mudir = $request->nama_mudir;
                            $store->status = 0;
                            $store->luas_tanah = $request->luas_tanah;
                            $store->pesantren_id = $request->pesantren_id;
                            $store->save();
                            Session::flash('success_msg', 'Berhasil Diubah!');
                            return redirect()->to('/home/lembaga');
                        }
                    }
                }
            }else{
                Session::flash('error_msg', 'Provinsi Tidak Ditemukan!');
                return back()->withInput();
            }
        }
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
