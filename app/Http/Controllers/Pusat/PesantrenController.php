<?php

namespace App\Http\Controllers\Pusat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\m_pesantren;
use App\ref_takhasus;
use App\ref_provinsi;
use Session;
use Validator;
use App\ref_kabupaten;

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
        $provinsi = ref_provinsi::all();
        return view('pusat_lembaga.pesantren.create',compact('takhasus','provinsi'));
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
            'nama_pondok_pesantren' => 'required|string|max:255',
            'nama_yayasan' => 'required|string|max:255',
            'takhasus_id' => 'required|integer',
            'tahun_berdiri' => 'required',
            'jumlah_santri_lk' => 'required|integer',
            'jumlah_santri_pr' => 'required|integer',
            'nama_pengasuh' => 'required|string|max:100',
            'nama_ketua_yayasan' => 'required|string|max:100',
            'provinsi_id' => 'required|integer',
            'kabupaten_id' => 'required|integer',
            'alamat' => 'required',
            'no_telp' => 'required|string|max:50',
            'fax' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'website' => 'required|string|max:100',
            'luas_tanah' => 'required',
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
                $store = new m_pesantren();
                $store->nama_pondok_pesantren = $request->nama_pondok_pesantren;
                $store->nama_yayasan = $request->nama_yayasan;
                $store->takhasus_id = $request->takhasus_id;
                $store->tahun_berdiri = $request->tahun_berdiri;
                $store->jumlah_santri_lk = $request->jumlah_santri_lk;
                $store->jumlah_santri_pr = $request->jumlah_santri_pr;
                $store->nama_pengasuh = $request->nama_pengasuh;
                $store->nama_ketua_yayasan = $request->nama_ketua_yayasan;
                $store->provinsi_id = $request->provinsi_id;
                $store->kabupaten_id = $request->kabupaten_id;
                $store->alamat = $request->alamat;
                $store->no_telp = $request->no_telp;
                $store->fax = $request->fax;
                $store->email = $request->email;
                $store->website = $request->website;
                $store->luas_tanah = $request->luas_tanah;
                $store->save();
                Session::flash('success_msg', 'Berhasil Ditambahkan!');
                return redirect()->to('/home/pesantren');
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

    public function getcity(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'provinsi_id' => 'required|integer'
        ]);

        $cek = ref_kabupaten::where('provinsi_id', '=', $request->provinsi_id)->first();

        if ($validator->passes()) {
            if(is_null($cek)){
                return response()->json(['error'=>'Kota/Kabupaten Tidak Ditemukan!'],404);
            }else{
                $city = ref_kabupaten::where('provinsi_id', '=', $request->provinsi_id)->get();
                return response()->json($city);
            }
        }else{
            return response()->json(['error'=>$validator->errors()->all()],400);
        }
    }
}
