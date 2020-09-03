@extends('frame.index')
@section('title_data','active')
@section('tchild_data','current-page')
@section('css')
<link href="{{ asset('template/build/css/xedit.css') }}" rel="stylesheet">
<style>
    #id_fakultas{
        border-radius: 25px;
    }
    #id_prodi{
        border-radius: 25px;
    }
    #nama_prodi{
        border-radius: 25px;
    }
</style>
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>List <small>Prodi</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <a data-toggle="modal" data-target="#add-prodi-modal" class="btn btn-sm btn-warning"><i
                                class="fa fa-plus-circle"></i> Data Prodi</a>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix" style="color: red">{{ $errors->first('id_fakultas') }} &ensp; {{ $errors->first('id_prodi') }} &ensp; {{ $errors->first('nama_prodi') }}</div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                @include('data.master-prodi.prodi-table')
                                <form action="{{ route('prodi.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    @include('data.master-prodi.prodi-field')
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
            $('.edit-prodi').editable();
        });

    </script>
@endpush
