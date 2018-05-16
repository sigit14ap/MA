@extends('layouts.app')
@section('main-content')
@section('title', 'Tambah Pesantren')
@section('styles')
<link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<style type="text/css">
    .bootstrap-select{
      width: 100% !important;
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
                                <strong>Pesantren</strong>
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
                            <input type="text" name="nama_pondok_pesantren" class="form-control" placeholder="Nama Pondok Pesantren" autofocus required>
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
                            <input type="text" name="nama_yayasan" class="form-control" placeholder="Nama Yayasan" required>
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
                                <input type="text" name="tahun_berdiri" class="date form-control" placeholder="Tahun Berdiri" required>
                                @if ($errors->has('tahun_berdiri'))
                                <div class="alert alert-danger">
                                <strong>Error!</strong> {{ $errors->first('tahun_berdiri') }}
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

<script>
    $('.date').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
</script>
@section('scripts-header')
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
@endsection
@endsection