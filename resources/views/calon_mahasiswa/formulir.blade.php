@extends('frame.index')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form | Formulir Pendaftaran</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="{{ route('update.formulir') }}" method="post">
                            @csrf
                            <p><b>Data Pendaftar :</b></p>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="">Nik</label>
                                  <input class="form-control" name="nik" id="nik" value="{{$data_pendaftar->nik}}" readonly />
                                  <input type="hidden" name="id_pendaftar" id="id_pendaftar" value="{{$data_pendaftar->id_pendaftar}}">
                                </div>
                                <div class="form-group col-md-8">
                                  <label for="">Nama Lengkap</label>
                                  <input class="form-control" type="text" name="nama" value="{{$data_pendaftar->nama}}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="">No Telephone</label>
                                  <input class="form-control  @error('no_telepon') is-invalid @enderror" type="text" id="no_telepon" name="no_telepon" value="{{$data_pendaftar->no_telepon}}" autofocus required>
                                    @error('no_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="">No Telephone Orang Tua</label>
                                  <input class="form-control @error('no_telp_ortu') is-invalid @enderror" type="text" name="no_telp_ortu" id="no_telp_ortu" value="{{$data_pendaftar->no_telp_ortu}}" autofocus required>
                                    @error('no_telp_ortu')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <p><b>Data Fakultas Pendaftar :</b></p>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="">Fakultas</label>
                                  <input class="form-control" type="text" name="fakultas"  value="{{$data_pendaftar->nama_fakultas}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="">Program Studi</label>
                                  <input class="form-control" type="text" name="prodi" value="{{$data_pendaftar->nama_prodi}}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="">Jenjang Pendidikan</label>
                                  <input class="form-control" type="text" name="jenjangp" value="{{$data_pendaftar->jenis_strata}}" readonly>
                                </div>
                                <div class="form-group col-md-8">
                                  <label for="">Kelas</label>
                                  <input class="form-control" type="text" name="kelas" value="{{$data_pendaftar->nama_kelas}}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="">Tahun Masuk</label>
                                  <input class="form-control" name="tahun" value="{{$data_pendaftar->tahun}}" readonly/>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="">Gelombang</label>
                                  <input class="form-control" type="number" name="gelombang" value="{{$data_pendaftar->gelombang}}" readonly/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Biaya Registrasi</label>
                                    <input class="form-control" type="text" name="biaya_registrasi" value="Rp.{{$data_pendaftar->biaya_registrasi}}" readonly />
                                  </div>
                            </div>
                            <hr>
                            <p><b>Opsi Pendaftar :</b></p>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="">Jalur Masuk</label>
                                  <select name="jalur_masuk" id="jalur_masuk" class="form-control @error('jalur_masuk') is-invalid @enderror">
                                  </select>
                                  <input type="hidden" name="hidden_jm" id="hidden_jm" value="{{ $data_pendaftar->jalur_masuk }}">

                                @error('jalur_masuk')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="">Jenis Pendaftar</label>
                                  <select name="jenis_pendaftar" id="jenis_pendaftar" class="form-control @error('jenis_pendaftar') is-invalid @enderror"></select>
                                  <input type="hidden" name="hidden_jp" id="hidden_jp" value="{{ $data_pendaftar->jenis_pendaftar }}">  
                                
                                @error('jenis_pendaftar')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="">Kode Voucher</label>
                                  <input class="form-control" type="text" name="Kode Voucher" placeholder="Kode Voucher (Kosongkan jika tidak ada)" />
                                </div>
                            </div>        
                            <div class="ln_solid">
                                <br>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type='submit' class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- /page content -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
     $(document).ready(function(){
        // var data_jm = $('#hidden_jm').val();
        // var data_jp = $('#hidden_jp').val();

        // $('#jalur_masuk').val(data_jm);
        // $('#jalur_masuk').select2().trigger('change');

        // $('#jenis_pendaftar').val(data_jp);
        // $('#jenis_pendaftar').select2().trigger('change');
        
        // $('#jalur_masuk').select2();
        $('#jalur_masuk').select2({
                placeholder: '- Pilih Jalur Masuk -',
                ajax: {
                    url: '{{route('get.jalur_masuk')}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(jalur_m) {
                                return {
                                    id: jalur_m.id,
                                    text: jalur_m.jalur
                                }
                            })
                        };
                    },
                    cache: true
                }
            });



                $('#jenis_pendaftar').select2({
                placeholder: '- Pilih Jenis Pendaftar -',
                ajax: {
                    url: '{{route('get.jenis_pendaftar')}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(jenis_p) {
                                return {
                                    id: jenis_p.id_jns_daftar,
                                    text: jenis_p.nm_jns_daftar
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
     });
</script>
@endsection