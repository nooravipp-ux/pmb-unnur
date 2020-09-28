@extends('frame.index')
@section('title', 'PMB | UNNUR')
@section('style')
<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    width: 200px;
    height: 300px;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
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
                    <h2>Data Detail Pendaftar (Aktivasi Akun PMB)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <br />
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{url('operator/pendaftaran/confirm-pembayaran-pmb')}}">
                        {{csrf_field()}}
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No Pendaftaran <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="no_pendaftaran" class="form-control" value="{{$detail_pendaftar->id_pendaftar}}" readonly>
                         </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nik" class="form-control" value="{{$detail_pendaftar->nik}}" readonly>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Lengkap <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nama_lengkap" class="form-control " value="{{$detail_pendaftar->nama}}" readonly>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="email" class="form-control" value="{{$detail_pendaftar->email}}" readonly>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No Telepon</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input name="no_telepon" class="form-control" type="text" value="{{$detail_pendaftar->no_telepon}}" readonly>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Fakultas</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input name="jenjang" class="form-control" type="text" readonly value="{{$detail_pendaftar->nama_fakultas}}">
                            <input name="id_prodi" class="form-control" type="hidden" value="{{$detail_pendaftar->id_prodi}}">
                            <input name="tahun" class="form-control" type="hidden" value="{{$detail_pendaftar->tahun}}">
                            <input name="gelombang" class="form-control" type="hidden" value="{{$detail_pendaftar->gelombang}}">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input name="prodi" class="form-control" type="text" readonly value="{{$detail_pendaftar->nama_prodi}}">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jenjang Pendidikan</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input name="jenjang" class="form-control" type="text" readonly value="{{$detail_pendaftar->jenis_strata}}">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kelas</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input name="jenjang" class="form-control" type="text" readonly value="{{$detail_pendaftar->nama_kelas}}">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Biaya Pendaftaran</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input name="status_pembayaran" class="form-control" type="text" value="{{$detail_pendaftar->biaya_registrasi}}" readonly>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Metode Pembayaran</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input name="metode_pembayaran" id="metode_pembayaran" class="form-control" type="text" value="{{$detail_pendaftar->metode_pembayaran}}" readonly>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Status Pembayaran</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input name="status_pembayaran" class="form-control" type="text" value="{{$detail_pendaftar->status_pembayaran_registrasi}}" readonly>
                          </div>
                        </div>

                        <div class="item form-group" id="d_gambar">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bukti Pembayaran</label>
                          <div class="col-md-6 col-sm-6 ">
                              <img class="img-fluid" id="myImg" alt="Bukti Pembayaran" src="{{$detail_pendaftar->bukti_pem}}">
                          </div>
                          <!-- The Modal -->
                          <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                          <div class="col-md-6 col-sm-6 offset-md-3">
                            @if ($detail_pendaftar->status_pembayaran_registrasi != 'SUDAH DI KONFIRMASI')
                                <button type="submit" class="btn btn-success">Confirm Pembayaran</button>
                            @elseif ($detail_pendaftar->status_pembayaran_registrasi == 'SUDAH DI KONFIRMASI')
                                <a href="{{route('cetak.kwitansi',$detail_pendaftar->id_pendaftar)}}" target="_blank"  class="btn btn-success">Cetak Bukti Pembayaran</a>
                            @endif
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
<script>
  $( document ).ready(function() {
    $('#d_gambar').hide();
    var metode = $('#metode_pembayaran').val();
    if(metode == "transfer"){
      $('#d_gambar').show();
    }else{
      $('#d_gambar').hide();
    }
  });
</script>
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
