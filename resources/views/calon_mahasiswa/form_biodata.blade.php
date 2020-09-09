@extends('frame.index')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title"></h2></strong>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                Step 1<br />
                                <small>Data Diri</small>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                Step 2<br />
                                <small>Data Orang Tua/Wali (Ayah)</small>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                Step 3<br />
                                <small>Data Orang Tua/Wali (Ibu)</small>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                Step 4<br />
                                <small>Selesai</small>
                            </span>
                          </a>
                        </li>
                      </ul>
                      @if($status_pembayaran == false)
                      <div class="row">
                          <div class="col-md-12 text-center">
                              <span style="background-color: lightblue;"><h2>Silahkan lakukan pembayaran terlebih dahulu</h2></span>
                          </div>
                      </div>
                      @else
                      <form id="form-biodata" class="form-horizontal form-label-left" method="POST" action="{{url('/calon-mahasiswa/form-biodata/simpan-data-biodata')}}">
                          @csrf
                          <div id="step-1">
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Lengkap <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="nama" class="form-control " value="{{$data_pendaftar->nama}}">
                                  <input type="hidden" name="id_pendaftar" class="form-control " value="{{$data_pendaftar->id_pendaftar}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="nik" class="form-control" value="{{$data_pendaftar->nik}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tempat Lahir <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input class="form-control" type="text" name="tempat_lahir" value="{{$data_pendaftar->tempat_lahir}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input class="date-picker form-control" type="date" name="tgl_lahir" value="{{$data_pendaftar->tgl_lahir}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-6 ">
                                  <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                      <input type="radio" name="jenis_kelamin" value="L" class="join-btn"> &nbsp; Male &nbsp;
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                      <input type="radio" name="jenis_kelamin" value="P" class="join-btn"> Female
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Agama<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <select name="agama" class="form-control ">
                                      <option value="ISLAM"> - </option>
                                      <option value="ISLAM">ISLAM</option>
                                      <option value="KRISTEN">KRISTEN</option>
                                      <option value="HINDU">HINDU</option>
                                      <option value="BUDHA">BUDHA</option>
                                      <option value="KONGUCHU">KONGUCHU</option>
                                      <option value="LAIN-LAIN">LAIN-LAIN</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kewargnegaraan<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" id="last-name" name="warganegara" class="form-control " value="{{$data_pendaftar->warganegara}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="alamat" class="form-control " value="{{$data_pendaftar->alamat}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kelurahan / Desa<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="kelurahan_desa" class="form-control " value="{{$data_pendaftar->kelurahan}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kode Pos<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="kode_pos" class="form-control " value="{{$data_pendaftar->kode_pos}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kecamatan<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="kecamatan" class="form-control " value="{{$data_pendaftar->kecamatan}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kota</label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input class="form-control col" type="text" name="kota" value="{{$data_pendaftar->kota_kab}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Provinsi</label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input class="form-control col" type="text" name="provinsi" value="{{$data_pendaftar->provinsi}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input class="form-control col" type="text" name="email" value="{{$data_pendaftar->email}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No Telepon</label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input  class="form-control col" type="text" name="no_telepon" value="{{$data_pendaftar->no_telepon}}">
                                </div>
                              </div>
                          </div>
                          <div id="step-2">
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK Ayah
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" class="form-control" name="nik_ayah" value="{{$data_pendaftar->nik_ayah}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Ayah
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="nama_ayah" class="form-control  " value="{{$data_pendaftar->no_telepon}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir Ayah
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input class="date-picker form-control" name="tgl_lahir_ayah" type="date" value="{{$data_pendaftar->tgl_lahir_ayah}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Ayah
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input class="date-picker form-control" type="text" name="pendidikan_ayah" value="{{$data_pendaftar->pendidikan_ayah}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pekerjaan Ayah
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="pekerjaan_ayah" class="form-control " value="{{$data_pendaftar->pekerjaan_ayah}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Penghasilan Ayah
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="penghasilan_ayah" class="form-control " value="{{$data_pendaftar->penghasilan_ayah}}">
                                </div>
                              </div>
                              <br>
                          </div>
                          <div id="step-3">
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK Ibu <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="nik_ibu" class="form-control  " value="{{$data_pendaftar->nik_ibu}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Ibu <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="nama_ibu" class="form-control  " value="{{$data_pendaftar->nama_ibu}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir Ibu <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input class="date-picker form-control" name="tgl_lahir_ibu" type="date" value="{{$data_pendaftar->tgl_lahir_ibu}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Ibu <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input class="date-picker form-control" name="pendidikan_ibu" type="text" value="{{$data_pendaftar->pendidikan_ibu}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pekerjaan Ibu <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text" name="pekerjaan_ibu" class="form-control " value="{{$data_pendaftar->pekerjaan_ibu}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Penghasilan Ibu <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input type="text"  name="penghasilan_ibu" class="form-control " value="{{$data_pendaftar->penghasilan_ibu}}">
                                </div>
                              </div>
                              <br>
                          </div>
                          <div id="step-4" class="text-center">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                            <button type="submit" form="form-biodata" class="btn btn-primary">Simpan</button>
                            
                          </div>
                      </form>
                      @endif
                    </div>
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('script')
<script src="{{ asset('template/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>
@endsection