@extends('frame.index')
@section('title_data','active')
@section('tchild_data','current-page')
@section('css')
<link href="{{ asset('template/build/css/xedit.css') }}" rel="stylesheet">
<style>
    #id_prodi{
        border-radius: 25px;
    }
    #jenis_strata{
        border-radius: 25px;
    }
    #id_strata{
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
                <h3>List <small>Jenjang Pendidikan</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <a data-toggle="modal" data-target="#add-strata-modal" class="btn btn-sm btn-warning"><i
                                class="fa fa-plus-circle"></i> Data Strata</a>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix" style="color: red">{{ $errors->first('id_prodi') }} &ensp; {{ $errors->first('jenis-strata') }}</div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                @include('data.master-strata.strata-table')
                                <form action="{{ route('strata.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    @include('data.master-strata.strata-field')
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
            $('.edit-strata').editable();
        });

        $(document).ready(function(){
            $('.edit-strata-select').editable({
                source: [
                    {value: 'D3', text: 'D3'},
                    {value: 'S1', text: 'S1'},
                    {value: 'S2', text: 'S2'}
                ]
            });
        });

    </script>
@endpush
