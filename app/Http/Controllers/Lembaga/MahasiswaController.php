<?php

namespace App\Http\Controllers\Lembaga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\ref_provinsi;
use Session;
use Validator;
use App\ref_kabupaten;
use App\m_lembaga;
use App\m_mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lembaga.mahasiswa.index');
    }

    public function data_index()
    {
        $data = m_mahasiswa::join('m_lembaga','m_lembaga.id','=','m_mahasiswa.lembaga_id')->select('m_mahasiswa.id','m_mahasiswa.nama_lengkap','m_lembaga.nama_lembaga')->get();
        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('options',function ($data){
                                    $button = '<div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-lg"><i class="fa fa-list"></i>&nbsp;<span class="caret"></span></button>
                    
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="margin-left: -88px;">
                                            
                                                    <li role="presentation"><a role="menuitem" href="'.route('mahasiswa.show',['id'=>$data->id ]).'"><i class="fa fa-search-plus fa-lg"></i>&nbsp;&nbsp;Detail</a></li>

                                                    <li role="presentation" class="divider" style="height: 2px;"></li>

                                                    <li role="presentation"><a role="menuitem" href="'.route('mahasiswa.edit',['id'=>$data->id ]).'"><i class="fa fa-pencil fa-lg"></i>&nbsp;&nbsp;Ubah data</a></li>

                                                    <li role="presentation" class="divider" style="height: 2px;"></li>

                                                    <li role="presentation" class="btn-destroy" data-id="'.$data->id.'" data-route="'.route('mahasiswa.destroy',['id'=>$data->id ]).'"><a role="menuitem" href="#" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;Hapus</a></li>
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
        $lembaga = m_lembaga::all();
        $provinsi = ref_provinsi::all();
        $type_form = 'create';
        return view('lembaga.mahasiswa.create',compact('lembaga','provinsi','type_form'));
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
            'nama_lengkap' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'mukim' => 'required|in:1,0',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'negara_asal' => 'required|string|max:100',
            'provinsi_asal' => 'required|integer',
            'kabupaten_asal' => 'required|integer',
            'alamat' => 'required',
            'asal_pendidikan' => 'required|in:Pesantren,Madrasah Aliyah,SMA / SMK',
            'lembaga_id' => 'required|integer',
        ]);
            
        $cek_provinsi = ref_provinsi::where('id','=',$request->provinsi_asal)->first();
        
        if(!is_null($cek_provinsi)){
            $cek_kab = ref_kabupaten::where('provinsi_id','=',$request->provinsi_asal)
                        ->where('id','=',$request->kabupaten_asal)
                        ->first();

            if(is_null($cek_kab)){
                Session::flash('error_msg', 'Kabupaten/Kota Tidak Ditemukan!');
                return back()->withInput();
            }else{
                $cek_lembaga = m_lembaga::where('id','=',$request->lembaga_id)
                                ->first();

                if(is_null($cek_lembaga)){
                    Session::flash('error_msg', 'Lembaga Tidak Ditemukan!');
                    return back()->withInput();
                }else{
                    $store = new m_mahasiswa();
                    $store->nama_lengkap = $request->nama_lengkap;
                    $store->tempat_lahir = $request->tempat_lahir;
                    $store->tanggal_lahir = $request->tanggal_lahir;
                    $store->mukim = $request->mukim;
                    $store->kewarganegaraan = $request->kewarganegaraan;
                    $store->negara_asal = $request->negara_asal;
                    $store->kabupaten_asal = $request->kabupaten_asal;
                    $store->provinsi_asal = $request->provinsi_asal;
                    $store->alamat = $request->alamat;
                    $store->asal_pendidikan = $request->asal_pendidikan;
                    $store->lembaga_id = $request->lembaga_id;
                    $store->save();
                    Session::flash('success_msg', 'Berhasil Ditambahkan!');
                    return redirect()->to('/home/mahasiswa');
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
        $mahasiswa = m_mahasiswa::where('id','=',$id)->first();
        if(is_null($mahasiswa)){
            Session::flash('error_msg', 'Mahasiswa Tidak Ditemukan!');
            return redirect()->to('/home/mahasiswa');
        }else{
            $show = DB::table('m_mahasiswa')
                        ->join('m_lembaga','m_mahasiswa.lembaga_id','m_lembaga.id')
                        ->join('ref_provinsi','m_mahasiswa.provinsi_asal','ref_provinsi.id')
                        ->join('ref_kabupaten','m_mahasiswa.kabupaten_asal','ref_kabupaten.id')
                        ->select('m_mahasiswa.*','ref_provinsi.nama_provinsi','ref_kabupaten.nama_kabupaten','m_lembaga.nama_lembaga')
                        ->where('m_mahasiswa.id','=',$id)
                        ->first();
            return view('lembaga.mahasiswa.show',compact('show'));
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
        $mahasiswa = m_mahasiswa::where('id','=',$id)->first();
        if(is_null($mahasiswa)){
            Session::flash('error_msg', 'Mahasiswa Tidak Ditemukan!');
            return redirect()->to('/home/mahasiswa');
        }else{
            $lembaga = m_lembaga::all();
            $provinsi = ref_provinsi::all();
            $kota = ref_kabupaten::where('provinsi_id','=',$mahasiswa->provinsi_asal)->get();
            $type_form = 'edit';
            return view('lembaga.mahasiswa.edit',compact('mahasiswa','provinsi','type_form','kota','lembaga'));
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
        $mahasiswa = m_mahasiswa::where('id','=',$id)->first();
        if(is_null($mahasiswa)){
            Session::flash('error_msg', 'Mahasiswa Tidak Ditemukan!');
            return redirect()->to('/home/mahasiswa');
        }else{
            $this->validate($request,[
                'nama_lengkap' => 'required|string|max:100',
                'tempat_lahir' => 'required|string|max:100',
                'tanggal_lahir' => 'required|date',
                'mukim' => 'required|in:1,0',
                'kewarganegaraan' => 'required|in:WNI,WNA',
                'negara_asal' => 'required|string|max:100',
                'provinsi_asal' => 'required|integer',
                'kabupaten_asal' => 'required|integer',
                'alamat' => 'required',
                'asal_pendidikan' => 'required|in:Pesantren,Madrasah Aliyah,SMA / SMK',
                'lembaga_id' => 'required|integer',
            ]);
                
            $cek_provinsi = ref_provinsi::where('id','=',$request->provinsi_asal)->first();
            
            if(!is_null($cek_provinsi)){
                $cek_kab = ref_kabupaten::where('provinsi_id','=',$request->provinsi_asal)
                            ->where('id','=',$request->kabupaten_asal)
                            ->first();
    
                if(is_null($cek_kab)){
                    Session::flash('error_msg', 'Kabupaten/Kota Tidak Ditemukan!');
                    return back()->withInput();
                }else{
                    $cek_lembaga = m_lembaga::where('id','=',$request->lembaga_id)
                                    ->first();
    
                    if(is_null($cek_lembaga)){
                        Session::flash('error_msg', 'Lembaga Tidak Ditemukan!');
                        return back()->withInput();
                    }else{
                        $update = m_mahasiswa::find($id);
                        $update->nama_lengkap = $request->nama_lengkap;
                        $update->tempat_lahir = $request->tempat_lahir;
                        $update->tanggal_lahir = $request->tanggal_lahir;
                        $update->mukim = $request->mukim;
                        $update->kewarganegaraan = $request->kewarganegaraan;
                        $update->negara_asal = $request->negara_asal;
                        $update->kabupaten_asal = $request->kabupaten_asal;
                        $update->provinsi_asal = $request->provinsi_asal;
                        $update->alamat = $request->alamat;
                        $update->asal_pendidikan = $request->asal_pendidikan;
                        $update->lembaga_id = $request->lembaga_id;
                        $update->save();
                        Session::flash('success_msg', 'Berhasil Diubah!');
                        return redirect()->to('/home/mahasiswa');
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
        $mahasiswa = m_mahasiswa::where('id', '=', $id)->first();
        if(is_null($mahasiswa)){
            Session::flash('error_msg', 'Mahasiswa Tidak Ditemukan!');
            return redirect()->to('/home/mahasiswa');
        }else{
            $delete = m_mahasiswa::where('id','=', $id)->delete();
            Session::flash('success_msg', 'Berhasil Dihapus!');
            return redirect()->to('/home/mahasiswa');
        }
    }
}
