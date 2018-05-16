@extends('layouts.app')
@section('main-content')
@section('title', 'Pesantren')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Pesantren</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('home/'.Auth::user()->role)}}">
                                {{ucwords(Auth::user()->name)}}
                            </a>
                        </li>
                        <li class="active">
                            <strong>Pesantren</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                @if(Session::has('error_msg'))
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ Session::get('error_msg') }}</strong>
                </div>
                @endif

                @if(Session::has('success_msg'))
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{{ Session::get('success_msg') }}</strong>
                </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissabl">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Pesantren</h5>
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
                    @if(Auth::user()->role == "lembaga")
                        <a href="{{ route('pesantren.create') }}"><button type="button" class="btn btn-lg btn-w-m btn-primary"><i class="fa fa-plus-square"></i>&nbsp;Tambah</button></a><hr>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th style="width: 27px !important;"><center>No.</i></center></th>
                        <th><center>Pondok Pesantren</center></th>
                        <th><center>Yayasan</center></th>
                        <th style="width: 27px !important;"><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th style="width: 27px !important;"><center>No.</i></center></th>
                        <th><center>Pondok Pesantren</center></th>
                        <th><center>Yayasan</center></th>
                        <th style="width: 27px !important;"><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>

<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('pesantren.data_index') }}',
                columns: [
                            { "data": "DT_Row_Index" },
                            { "data": "nama_pondok_pesantren" },
                            { "data": "nama_yayasan" },
                            { "data": "options" }
                        ],
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
@endsection