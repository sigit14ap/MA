@extends('layouts.app')
@section('main-content')
@section('title', 'Mahasiswa')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Mahasiswa</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            Lembaga
                        </li>
                        <li class="active">
                            <strong>Mahasiswa</strong>
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
                        <h5>Mahasiswa</h5>
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
                    <a href="{{ route('mahasiswa.create') }}"><button type="button" class="btn btn-lg btn-w-m btn-primary"><i class="fa fa-plus-square"></i>&nbsp;Tambah</button></a><hr>
                    
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" style="width : 100% !important;">
                    <thead>
                    <tr>
                        <th style="width: 27px !important;"><center>No.</i></center></th>
                        <th><center>Mahasiswa</center></th>
                        <th><center>Lembaga</center></th>
                        <th style="width: 27px !important;"><center><i class="glyphicon glyphicon-cog"></i></center></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th style="width: 27px !important;"><center>No.</i></center></th>
                        <th><center>Mahasiswa</center></th>
                        <th><center>Lembaga</center></th>
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

        <!-- Modal -->
        <div class="modal fade" id="myModalDelete" role="dialog">
                <div class="modal-dialog">
                                            
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                            <p>Anda yakin ingin menghapus ?</p>
                            <form id="delete-form" method="POST" action="">
                                    {{ csrf_field() }}
                                    {{ method_field("DELETE") }}
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" id="delete">Hapus</button></a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                 </div>
                                              
                </div>
            </div>
        <!-- END Modal -->
<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('mahasiswa.data_index') }}',
                columns: [
                            { "data": "DT_Row_Index" },
                            { "data": "nama_lengkap" },
                            { "data": "nama_lembaga" },
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
            
            $(document).on('click','.btn-destroy',function(){
                var route = $(this).data('route');
                $('#delete-form').attr('action', '');
                $('#delete-form').attr('action', route);
            });

            $(document).on('click','#delete',function(){
                $('#delete-form').submit();
            });
        });

    </script>
@endsection