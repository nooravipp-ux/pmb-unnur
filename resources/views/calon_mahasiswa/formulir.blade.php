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
                        <form class="" action="" method="post">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">ID Test<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="id_test" value="" readonly />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' name="email" value="{{$data_pendaftar->email}}" readonly/></div>
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
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="nama" value="{{$data_pendaftar->nama}}"></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No HP<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="no_telepon" value="{{$data_pendaftar->no_telepon}}"></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No HP Orang Tua<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="no_hp_orang_tua"></div>
                            </div>
                                        
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fakultas<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="fakultas"  value="{{$data_pendaftar->nama_fakultas}}"> /><br>
                                    <input class="form-control" type="text" name="Kode Voucher" placeholder="Kode Voucher (Kosongkan jika tidak ada)" />
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Biaya Registrasi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="biaya_registrasi"  required />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jenjang Prodi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="jenjang" value="{{$data_pendaftar->jenis_strata}}"  required />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jurusan Asal<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" type="text" name="jurusan_asal">
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="MAN">MAN</option>
                                        <option value="SMK">SMK</option>
                                        <option value="S1">S1</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Program Studi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="prodi" value="{{$data_pendaftar->nama_prodi}}" />
                                </div>
                            </div>           
                            <div class="ln_solid">
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