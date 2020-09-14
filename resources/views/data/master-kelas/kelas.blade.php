@extends('frame.index')
@section('title_data','active')
@section('tchild_data','current-page')
@section('css')
<link href="{{ asset('template/build/css/xedit.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style>
    #id_jenjang_prodi {
        border-radius: 7px;
        width: 26em;
    }

    #nama_kelas {
        border-radius: 7px;
    }

    #id_kelas {
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
                <h3>List <small>Kelas</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <a data-toggle="modal" data-target="#add-kelas-modal" class="btn btn-sm btn-warning"><i
                                class="fa fa-plus-circle"></i> Data Kelas</a>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix" style="color: red">{{ $errors->first('id_strata') }}
                            &ensp; {{ $errors->first('nama_kelas') }}</div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                @include('data.master-kelas.kelas-table')
                                <form action="{{ route('kelas.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    @include('data.master-kelas.kelas-field')
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
    <script>
        $(document).ready(function () {
            $('.edit-kelas').editable();
        });

        $(document).ready(function () {
            $('.edit-kelas-select').editable({
                source: [{
                        value: 'Reguler pagi',
                        text: 'Reguler pagi'
                    },
                    {
                        value: 'Reguler Sore',
                        text: 'Reguler Sore'
                    },
                    {
                        value: 'Week End',
                        text: 'Week End'
                    }
                ]
            });
        });

        $('#id_jenjang_prodi').select2({
            placeholder: '- Pilih Jenjang Podi -',
            ajax: {
                url: '{{ url('/prodi/get_data_jenjang_prodi') }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (jenjang_prodi) {
                            return {
                                id: jenjang_prodi.id_strata,
                                text: jenjang_prodi.id_prodi + ' - ' + jenjang_prodi.jenis_strata
                            }
                        })
                    };
                },
                cache: true
            }
        });

    </script>
@endpush
