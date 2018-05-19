@extends('layouts.app')
@section('main-content')
@section('title', 'Detail Mahasiswa')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Detail {{$show->nama_lembaga}}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            Lembaga
                        </li>
                        <li class="active">
                            Pesantren
                        </li>
                        <li class="active">
                            <strong>Detail Mahasiswa</strong>
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
                        <h5>Detail Mahasiswa</h5>
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <tbody>
                                <tr>
                                    <td style="width: 1px;"><h4>1.</h4></td>
                                    <td style="width: 25%;"><h4>Nama Mahasiswa</h4></td>
                                    <td style="width : 10px;"><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->nama_lengkap}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>2.</h4></td>
                                    <td style="width: 25%;"><h4>Tempat Lahir</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->tempat_lahir}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>3.</h4></td>
                                    <td><h4>Tanggal Lahir</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->tanggal_lahir}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>4.</h4></td>
                                    <td><h4>Mukim</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>
                                        @if($show->mukim == 1)
                                        Ya
                                        @else
                                        Tidak
                                        @endif
                                    </h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>5.</h4></td>
                                    <td><h4>Kewarganegaraan</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->kewarganegaraan}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>6.</h4></td>
                                    <td><h4>Negara Asal</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->negara_asal}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>7.</h4></td>
                                    <td><h4>Kabupaten Asal</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->nama_kabupaten}}</h4></td>
                                    </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>8.</h4></td>
                                    <td><h4>Provinsi Asal</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->nama_provinsi}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>9.</h4></td>
                                    <td><h4>Alamat</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->alamat}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>10.</h4></td>
                                    <td><h4>Asal Pendidikan</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->asal_pendidikan}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>11.</h4></td>
                                    <td><h4>Lembaga</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->nama_lembaga}}</h4></td>
                                </tr>                    
                                </tbody>

                                </table>
                            </div>
            
                        
                    <div class="row">
                        <div style="float: right;margin-right: 13px;">
                            <a href="{{ route('mahasiswa.edit',$show->id) }}"><button type="button" class="btn btn-w-m btn-primary"><i class="fa fa-pencil-square-o"></i>&nbsp;Ubah Data</button></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection