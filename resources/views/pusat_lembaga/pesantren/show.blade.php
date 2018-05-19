@extends('layouts.app')
@section('main-content')
@section('title', 'Detail '.$show->nama_pondok_pesantren)
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Detail {{$show->nama_pondok_pesantren}}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            {{ucwords(Auth::user()->role)}}
                        </li>
                        <li class="active">
                            Pesantren
                        </li>
                        <li class="active">
                            <strong>Detail {{$show->nama_pondok_pesantren}}</strong>
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
                        <h5>Detail {{$show->nama_pondok_pesantren}}</h5>
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
                                    <td style="width: 25%;"><h4>Nama Pondok Pesantren</h4></td>
                                    <td style="width : 10px;"><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->nama_pondok_pesantren}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>2.</h4></td>
                                    <td style="width: 25%;"><h4>Nama Yayasan</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->nama_yayasan}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>3.</h4></td>
                                    <td style="width: 25%;"><h4>Takhasus</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->nama_takhasus}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>4.</h4></td>
                                    <td><h4>Tahun Berdiri</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->tahun_berdiri}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>5.</h4></td>
                                    <td><h4>Jumlah Santri Laki-Laki</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->jumlah_santri_lk}} Orang</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>6.</h4></td>
                                    <td><h4>Jumlah Santri Perempuan</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->jumlah_santri_pr}} Orang</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>7.</h4></td>
                                    <td><h4>Nama Pengasuh</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{ucwords($show->nama_pengasuh)}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>8.</h4></td>
                                    <td><h4>Nama Ketua Yayasan</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{ucwords($show->nama_ketua_yayasan)}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>9.</h4></td>
                                    <td><h4>Provinsi</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->nama_provinsi}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>10.</h4></td>
                                    <td><h4>Kabupaten</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->nama_kabupaten}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>11.</h4></td>
                                    <td><h4>Alamat</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->alamat}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>12.</h4></td>
                                    <td><h4>Nomor Telepon</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->no_telp}}</h4></td>
                                    </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>13.</h4></td>
                                    <td><h4>Fax</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->fax}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>14.</h4></td>
                                    <td><h4>Email</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->email}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>15.</h4></td>
                                    <td><h4>Website</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->website}}</h4></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><h4>16.</h4></td>
                                    <td><h4>Luas Tanah</h4></td>
                                    <td><h4><center>:</center></h4></td>
                                    <td><h4>{{$show->luas_tanah}} m<sup>2</sup></h4></td>
                                </tr>                                
                                </tbody>

                                </table>
                            </div>
            
                        
                    <div class="row">
                        <div style="float: right;margin-right: 13px;">
                            <a href="{{ route('pesantren.edit',$show->id) }}"><button type="button" class="btn btn-w-m btn-primary"><i class="fa fa-pencil-square-o"></i>&nbsp;Ubah Data</button></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection