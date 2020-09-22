@extends('frame.index')
@section('title_data','active')
@section('tchild_data','current-page')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('template/build/css/xedit.css') }}" rel="stylesheet">
<style>
    #id_fakultas {
        border-radius: 7px;
        width: 26em;
    }

    #id_prodi {
        border-radius: 7px;
    }

    #nama_prodi {
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
                        <div class="clearfix" style="color: red">
                            {{ $errors->first('id_fakultas') }} &ensp;
                            {{ $errors->first('id_prodi') }} &ensp;
                            {{ $errors->first('nama_prodi') }}
                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#id_fakultas').select2({
                placeholder: '- Pilih Fakultas -',
                ajax: {
                    url: '{{ url('/fakultas/get-data-fakultas') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (fakultas) {
                                return {
                                    id: fakultas.id_fakultas,
                                    text: fakultas.id_fakultas + ' - ' + fakultas
                                        .nama_fakultas
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('.edit-id-prodi').editable({
                model: 'popup',
                type: 'POST',
                dataType: 'JSON',
                params: function(params) {
                    params._token = '{{ csrf_token() }}';
                    params.id_prodi = $(this).editable().data('id_prodi');
                    return params;
                },
                success: function(response) {
                   location.reload();
                }
            });
            $('.edit-prodi').editable({
                model: 'popup',
                type: 'POST',
                dataType: 'JSON',
                params: function(params) {
                    params._token = '{{ csrf_token() }}';
                    params.nama_prodi = $(this).editable().data('nama_prodi');
                    return params;
                },
                success: function(response) {
                   location.reload();
                }
            });
        });

    </script>
@endpush
