@extends('frame.index')
@section('title_pmb','active')
@section('tchild_pmb','current-page')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .input {
        border-radius: 10px;
    }

    .ui-datepicker-calendar {
        display: none;
    }

</style>
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Setting Jadwal Penerimaan Siswa Baru</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            method="POST" action="{{ route('nim.pmb.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_NIM" id="NIM">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tahun">Tahun
                                    Masuk:</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control input" name="tahun" id="tahun" readonly
                                        required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kode Prodi:
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="id_prodi" class="form-control input" id="kode" required>
                                        <option disabled selected>- Kode prodi -</option>
                                        @foreach($prodi as $prodi)
                                            <option>
                                                {{ $prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">No Urut
                                    prodi:</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="no_prodi" id="urut" class="form-control input" required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Jenjang
                                    pendidikan:
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="id_strata" class="form-control input" id="strata" required>
                                        <option disabled selected>- Strata -</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Status
                                    Mahasiswa:</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="status" class="form-control input" id="status">
                                        <option disabled selected> - Status Mahasiswa - </option>
                                        <option value="00">Mahasiswa Baru</option>
                                        <option value="11">Mahasiswa pindahan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                <div class="col-md-6 col-sm-6">
                                    <small style="color: red">Pengurutan NIM berdasarkan NO URUT,STRATA,STATUS,TAHUN dan PRODI</small>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" id="submit" class="btn btn-success">simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data NIM</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">

                                    </p>

                                    <table id="datatable-responsive" class="table table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Tahun</th>
                                                <th>Prodi</th>
                                                <th>Jenjang Pendidikan</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach($nim as $nim)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$nim->id_NIM}}</td>
                                                    <td>{{$nim->tahun}}</td>
                                                    <td>{{$nim->id_prodi}}</td>
                                                    <td>{{$nim->id_strata}}</td>
                                                    @if ($nim->status == 00)
                                                        <td>Mahasiswa Baru</td>
                                                    @else
                                                        <td>Mahasiswa Pindahan</td>
                                                    @endif
                                                    <td><a style="color: red" href="{{route('nim.destroy',$nim->id_NIM)}}">Hapus</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        // var id_nim = document.getElementById("id_nim");
        $(function () {
            $("#tahun").datepicker({
                changeYear: true,
                dateFormat: 'yy',
                onClose: function () {
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year));
                }
            });
        });

        $(document).ready(function () {
            // Get value on button click and show alert
            $("#submit").click(function () {
                // var tahun = $("#tahun_pmb").val();
                var thn = $("#tahun").val().substring(4, 2);
                var pro = $("#kode").val();
                var no = $("#urut").val();
                var str = $("#strata").val();
                var sts = $("#status").val();
                var input = no + str + thn + sts + pro;
                document.getElementById("NIM").value = input;
                // console.log(x);
            });

        });

    </script>
@endpush
