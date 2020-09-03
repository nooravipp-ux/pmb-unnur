@extends('frame.index')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jadwal Pendaftaran PMB Pertahun Gelombang dan Jalur Masuk</h2>
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
                      <br />
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{url('operator/pendaftaran/confirm-pembayaran-pmb')}}">
                        {{csrf_field()}}
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jalur Masuk <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <select name="no_pendaftaran" class="form-control">
                                <option value="">Pasca Sarjana</option>
                                <option value="">Fakultas Ilmu Sosial dan Ilmu Politik</option>
                                <option value="">Fakultas Teknik</option>
                                <option value="">Fakultas Ekonomi</option>
                                <option value="">Fakultas Ilmu Komputer dan Informatika</option>
                                <option value="">Fakultas Teknik Sore / Extension</option>
                                <option value="">UAMTC</option>
                                <option value="">KIP Kuliah</option>
                                <option value="">Undangan</option>
                                <option value="">Pindah FT Reguler</option>
                                <option value="">Pindah FT Sore</option>
                                <option value="">Alih Jenjang</option>
                                <option value="">Alih Jenjang FT Reguler</option>
                                <option value="">Alih Jenjang FT Sore</option>
                                <option value="">Beasiswa</option>
                                <option value="">Kelas Weekend</option>
                                <option value="">Seleksi Mandiri</option>
                                <option value="">Fakultas Teknik Sore</option>
                                <option value="">Pindahan</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tahun Masuk<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nama_lengkap" class="form-control " value="">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Gelombang<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="gelombang" class="form-control">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Mulai</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="date" name="start_date" class="form-control">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Selesai<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="date" type="text" name="finish_date" class="form-control ">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Biaya Pendaftaran<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="prodi" class="form-control" value="">
                          </div>
                        </div>
        
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                          <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">simpan</button>
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
                    <h2>Data Jadwal Pendaftaran PMB</h2>
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
                      <br />
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="text-muted font-13 m-b-30">
                                  
                                </p>
					
                                <table id="datatable-responsive" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                  <thead>
                                    <tr>
                                      <th>Jalur Masuk</th>
                                      <th>Tahun Masuk</th>
                                      <th>Gelombang</th>
                                      <th>Mulai</th>
                                      <th>Selesai</th>
                                      <th>Biaya Pendaftaran</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                    <tr>
                                      
                                    </tr>
                                    
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

@section('script')
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
    }

</script>
@endsection
