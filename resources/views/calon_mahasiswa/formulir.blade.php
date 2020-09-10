@extends('frame.index')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>FORMULIR</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="{{ route('update.formulir') }}" method="post">
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">NIK<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="nik" id="nik" value="{{$data_pendaftar->nik}}" readonly />
                                    <input type="hidden" name="id_pendaftar" id="id_pendaftar" value="{{$data_pendaftar->id_pendaftar}}">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="nama" value="{{$data_pendaftar->nama}}" readonly></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tahun <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="tahun" value="{{$data_pendaftar->tahun}}" readonly/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Gelombang<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" name="gelombang" value="{{$data_pendaftar->gelombang}}" readonly/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No HP<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="no_telepon" name="no_telepon" value="{{$data_pendaftar->no_telepon}}" autofocus required>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No HP Orang Tua<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="no_telp_ortu" id="no_telp_ortu" value="{{$data_pendaftar->no_telp_ortu}}" autofocus required>
                                </div>
                            </div>
                                        
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fakultas<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="fakultas"  value="{{$data_pendaftar->nama_fakultas}}" readonly>                                    
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Program Studi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="prodi" value="{{$data_pendaftar->nama_prodi}}" readonly>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jenjang Pendidikan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="jenjangp" value="{{$data_pendaftar->jenis_strata}}" readonly>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kelas<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="kelas" value="{{$data_pendaftar->nama_kelas}}" readonly>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="Kode Voucher" placeholder="Kode Voucher (Kosongkan jika tidak ada)" />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Biaya Registrasi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="biaya_registrasi" value="{{$data_pendaftar->biaya_registrasi}}" readonly />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jalur Masuk<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="jalur_masuk" id="jalur_masuk" class="form-control">
                                        @if($data_pendaftar->jalur_masuk == "Reguler")
                                            <option value=""disabled>Pilih Jalur Masuk</option>
                                            <option value="Reguler" selected>Reguler</option>
                                            <option value="Beasiswa">Beasiswa</option>
                                            <option value="KIP" >KIP</option>
                                            <option value="Bidikmisi" >Bidikmisi</option>
                                        @elseif($data_pendaftar->jalur_masuk == "Beasiswa")
                                            <option value=""disabled>Pilih Jalur Masuk</option>
                                            <option value="Reguler">Reguler</option>
                                            <option value="Beasiswa" selected>Beasiswa</option>
                                            <option value="KIP" >KIP</option>
                                            <option value="Bidikmisi" >Bidikmisi</option>
                                        @elseif($data_pendaftar->jalur_masuk == "KIP")
                                            <option value=""disabled>Pilih Jalur Masuk</option>
                                            <option value="Reguler">Reguler</option>
                                            <option value="Beasiswa">Beasiswa</option>
                                            <option value="KIP" selected>KIP</option>
                                            <option value="Bidikmisi" >Bidikmisi</option>
                                        @elseif($data_pendaftar->jalur_masuk == "Bidikmisi")
                                            <option value=""disabled>Pilih Jalur Masuk</option>
                                            <option value="Reguler">Reguler</option>
                                            <option value="Beasiswa">Beasiswa</option>
                                            <option value="KIP" >KIP</option>
                                            <option value="Bidikmisi" selected>Bidikmisi</option>
                                        @else
                                            <option value="" selected disabled>Pilih Jalur Masuk</option>
                                            <option value="Reguler" >Reguler</option>
                                            <option value="Beasiswa" >Beasiswa</option>
                                            <option value="KIP" >KIP</option>
                                            <option value="Bidikmisi" >Bidikmisi</option>
                                        @endif
                                    </select>
                                </div>
                            </div>             
                            <div class="ln_solid">
                                <br>
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-primary">Submit</button>
                                        <button type='reset' class="btn btn-success">Reset</button>
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