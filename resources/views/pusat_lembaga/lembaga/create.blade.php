@extends('layouts.app')
@section('main-content')
@section('title', 'Tambah Lembaga')
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
                    <h2>Tambah Lembaga</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            {{ucwords(Auth::user()->name)}}
                        </li>
                        <li>
                            <a href="{{ route('lembaga.index') }}">
                                Lembaga
                            </a>
                        </li>
                        <li class="active">
                            <strong>Tambah Lembaga</strong>
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
                        <h5>Tambah Lembaga</h5>
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
                      <form role="form" action="{{ route('lembaga.store') }}" method="POST">
                      @csrf
                      @include('pusat_lembaga.lembaga.form')
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