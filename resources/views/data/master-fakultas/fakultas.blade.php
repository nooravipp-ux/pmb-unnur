@extends('frame.index')
@section('title_data','active')
@section('tchild_data','current-page')
@section('css')
<link href="{{ asset('template/build/css/xedit.css') }}" rel="stylesheet">
<style>
    #id_fakultas{
        border-radius: 7px;
    }
    #nama_fakultas{
        border-radius: 7px;
    }
</style>
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>List <small>Fakultas</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <a data-toggle="modal" data-target="#add-fakultas-modal" class="btn btn-sm btn-warning"><i
                                class="fa fa-plus-circle"></i> Data Fakultas</a>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix" style="color: red">{{ $errors->first('id_fakultas') }} &ensp; {{ $errors->first('nama_fakultas') }}</div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                @include('data.master-fakultas.fakultas-table')
                                <form action="{{ route('fakultas.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    @include('data.master-fakultas.fakultas-field')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
@push('js')
    <script src="{{ asset('template/build/js/xedit.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.edit-fakultas').editable({
                model: 'popup',
                type: 'POST',
                dataType: 'JSON',
                params: function(params) {
                    params._token = '{{ csrf_token() }}';
                    params.id_fakultas = $(this).editable().data('id_fakultas');
                    return params;
                }
            });
            $('.edit-id-fakultas').editable({
                model: 'popup',
                type: 'POST',
                dataType: 'JSON',
                params: function(params) {
                    params._token = '{{ csrf_token() }}';
                    params.nama_fakultas = $(this).editable().data('nama_fakultas');
                    return params;
                }
            });
        });
    </script>
@endpush
