@extends('layouts.app')
@section('main-content')
@section('title', 'Tambah Pesantren')
@section('styles')
<link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<style type="text/css">
    .bootstrap-select{
      width: 100% !important;
      max-height: 30px !important;
    }
</style>
@endsection

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Tambah Pesantren</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('home/'.Auth::user()->role)}}">
                                {{ucwords(Auth::user()->name)}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pesantren.index') }}">
                                Pesantren
                            </a>
                        </li>
                        <li class="active">
                            <strong>Tambah Pesantren</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah Pesantren</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                      <form role="form" action="{{ route('pesantren.store') }}" method="POST">
                      @csrf
                      <div class="row">
                          <div class="col-lg-6">
                          <div class="form-group">
                            <label for="kode">Nama Pondok Pesantren</label>
                            <input type="text" name="nama_pondok_pesantren" class="form-control" placeholder="Nama Pondok Pesantren" value="{{old('nama_pondok_pesantren')}}" autofocus required>
                            @if ($errors->has('nama_pondok_pesantren'))
                              <div class="alert alert-danger">
                              <strong>Error!</strong> {{ $errors->first('nama_pondok_pesantren') }}
                              </div>
                            @endif
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="nama">Nama Yayasan</label>
                            <input type="text" name="nama_yayasan" value="{{old('nama_yayasan')}}" class="form-control" placeholder="Nama Yayasan" required>
                            @if ($errors->has('nama_yayasan'))
                              <div class="alert alert-danger">
                              <strong>Error!</strong> {{ $errors->first('nama_yayasan') }}
                              </div>
                            @endif
                          </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="width: 100%;">Takhasus</label>
                                <select class="selectpicker" data-live-search="true" id="takhasus" name="takhasus_id">
                                @foreach($takhasus as $takh)
                                    <option value="{{$takh->id}}">{{$takh->nama_takhasus}}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('takhasus_id'))
                                    <div class="alert alert-danger">
                                    <strong>Error!</strong> {{ $errors->first('takhasus_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama">Tahun Berdiri</label>
                                <input type="text" name="tahun_berdiri" value="{{old('tahun_berdiri')}}" class="date form-control" placeholder="Tahun Berdiri" required>
                                @if ($errors->has('tahun_berdiri'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('tahun_berdiri') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama">Jumlah Santri Laki-Laki</label>
                                <input type="number" name="jumlah_santri_lk" value="{{old('jumlah_santri_lk')}}" min="0" class="form-control" placeholder="Jumlah Santri Laki-Laki" required>
                                @if ($errors->has('jumlah_santri_lk'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('jumlah_santri_lk') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama">Jumlah Santri Perempuan</label>
                                <input type="number" name="jumlah_santri_pr" value="{{old('jumlah_santri_pr')}}"  min="0" class="form-control" placeholder="Jumlah Santri Perempuan" required>
                                @if ($errors->has('jumlah_santri_pr'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('jumlah_santri_pr') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="nama">Nama Pengasuh</label>
                              <input type="text" maxlength="100" value="{{old('nama_pengasuh')}}" name="nama_pengasuh" class="form-control" placeholder="Nama Pengasuh" required>
                              @if ($errors->has('nama_pengasuh'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('nama_pengasuh') }}
                                </div>
                              @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="nama">Nama Ketua Yayasan</label>
                              <input type="text" maxlength="100" value="{{old('nama_ketua_yayasan')}}" name="nama_ketua_yayasan" class="form-control" placeholder="Nama Ketua Yayasan" required>
                              @if ($errors->has('nama_ketua_yayasan'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('nama_ketua_yayasan') }}
                                </div>
                              @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group" style="width: 100%;">
                              <label>Provinsi</label>
                              <select class="selectpicker" data-live-search="true" name="provinsi_id" id="province" style="width: 100%;">
                              <option id="pilih_provinsi" value="" selected>Pilih Provinsi</option>
                              @foreach($provinsi as $prov)
                                  <option value="{{$prov->id}}">{{$prov->nama_provinsi}}</option>
                              @endforeach
                              </select>
                                @if ($errors->has('provinsi_id'))
                                  <div class="alert alert-danger">
                                  <strong>Error!</strong> {{ $errors->first('provinsi_id') }}
                                  </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                              <label>Kabupaten/Kota</label>
                              <select class="selectpicker" data-live-search="true" name="kabupaten_id" id="city" style="width: 100%;" disabled>
                                  <option id="pilih_kota">Pilih Provinsi Dahulu</option>
                              </select>
                                @if ($errors->has('kabupaten_id'))
                                  <div class="alert alert-danger">
                                  <strong>Error!</strong> {{ $errors->first('kabupaten_id') }}
                                  </div>
                                @endif
                              </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="nama">Alamat</label>
                              <textarea class="form-control" value="{{old('alamat')}}" name="alamat" placeholder="Alamat" style="resize: none;" required></textarea>
                              @if ($errors->has('alamat'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('alamat') }}
                                </div>
                              @endif
                            </div>
                        </div>

                        <div class="col-lg-6" style="height: 92px !important;">
                            <div class="form-group">
                              <label for="nama">Telepon</label>
                              <input type="text" maxlength="50" value="{{old('no_telp')}}" name="no_telp" class="form-control" placeholder="Telepon" required>
                              @if ($errors->has('no_telp'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('no_telp') }}
                                </div>
                              @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="nama">Fax</label>
                              <input type="text" maxlength="50" value="{{old('fax')}}" name="fax" class="form-control" placeholder="Fax" required>
                              @if ($errors->has('fax'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('fax') }}
                                </div>
                              @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="nama">Email</label>
                              <input type="email" maxlength="100" value="{{old('email')}}" name="email" class="form-control" placeholder="Email" required>
                              @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('email') }}
                                </div>
                              @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="nama">Website</label>
                              <input type="text" maxlength="100" value="{{old('website')}}" name="website" class="form-control" placeholder="Website" required>
                              @if ($errors->has('website'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('website') }}
                                </div>
                              @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label for="nama">Luas Tanah</label>
                              <input type="number"step=0.01 name="luas_tanah" value="{{old('luas_tanah')}}" class="form-control" placeholder="Luas Tanah" required>
                              @if ($errors->has('luas_tanah'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('luas_tanah') }}
                                </div>
                              @endif
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-lg btn-w-m btn-primary"><i class="fa fa-check-square"></i>&nbsp;Submit</button>
                  </form>
                </div>
            </div>
            </div>
        </div>
      </div>

      <meta name="token-csrf" content="{{ csrf_token() }}"> 
<script type="text/javascript">
        $(document).ready(function(){


            $('.date').datepicker({
                minViewMode: 2,
                format: 'yyyy'
            });

            $(document).on('change','#province',function(){
              $('#submit-btn').prop('disabled',true);
              $('#pilih_provinsi').remove();
              $('#city').empty();
              var provinsi_id = $("#province").val();
              $("#province").prop('disabled',true);
              $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="token-csrf"]').attr('content')
                            }
                    });

                $.ajax({
                        type: "POST",
                        url: "{{ route('getcity') }}",
                        data: {provinsi_id : provinsi_id},
                        dataType: "json",
                        beforeSend: function(e) {
                            if(e && e.overrideMimeType) {
                              e.overrideMimeType("application/json;charset=UTF-8");
                            }
                        },
                        success: function(response){
                            $('#submit-btn').removeAttr('disabled');
                            $("#province").removeAttr('disabled');
                            $("#city").removeAttr('disabled');
                            $("#city").focus();
                            $.each(response,function(index,city){
                                $('#city').append($('<option>', {
                                    value: city.id ,
                                    text:  city.nama_kabupaten
                                }));

                            });
                            $('.selectpicker').selectpicker('refresh');
                            },
                          error: function (response) {
                            $('#submit-btn').removeAttr('disabled');
                            $("#province").removeAttr('disabled');
                            $('#city').append('<option value="pilih_kota" selected>Pilih Provinsi Dahulu</option>');
                            $('#province').selectpicker('refresh');
                            $('#city').prop( "disabled", true );
                            if(response.status === 400 || response.status === 404) {
                                alert(response.responseJSON.error);
                            }
                          }
                });
            });
        });

</script>
@section('scripts-header')
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
@endsection
@endsection