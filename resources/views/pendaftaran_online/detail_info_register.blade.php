@extends('frame.index')
@section('style')
<style>
    #myImgKTP {
        border-radius: 5px;
        cursor: pointer;
        width: 220px;
        height: 220px;
        transition: 0.3s;
    }
    
    #myImgKTP:hover {opacity: 0.7;}
    
    #myImgFOTO {
        border-radius: 5px;
        cursor: pointer;
        width: 220px;
        height: 220px;
        transition: 0.3s;
    }
    
    #myImgFOTO:hover {opacity: 0.7;}
    
    #myImgKK {
        border-radius: 5px;
        cursor: pointer;
        width: 220px;
        height: 220px;
        transition: 0.3s;
    }
    
    #myImgKK:hover {opacity: 0.7;}
    
    #myImgAKTA {
        border-radius: 5px;
        cursor: pointer;
        width: 220px;
        height: 220px;
        transition: 0.3s;
    }
    
    #myImgAKTA:hover {opacity: 0.7;}
    
    #myImgIJAZAH {
        border-radius: 5px;
        cursor: pointer;
        width: 220px;
        height: 220px;
        transition: 0.3s;
    }
    
    #myImgIJAZAH:hover {opacity: 0.7;}
    
    #myImgKET_SEHAT {
        border-radius: 5px;
        cursor: pointer;
        width: 220px;
        height: 220px;
        transition: 0.3s;
    }
    
    #myImgKET_SEHAT:hover {opacity: 0.7;}
    
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
    #caption_ktp {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }
    
    #caption_foto {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }
    
    #caption_kk {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }
    
    #caption_akta {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }
    
    #caption_ijazah {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }
    
    #caption_ket_sehat {
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
    .close_ktp {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    
    .close_ktp:hover,
    .close_ktp:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    
    .close_foto {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    
    .close_foto:hover,
    .close_foto:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    
    .close_kk {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    
    .close_kk:hover,
    .close_kk:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    
    .close_akta {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    
    .close_akta:hover,
    .close_akta:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    
    .close_ijazah {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    
    .close_ijazah:hover,
    .close_ijazah:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    
    .close_ket_sehat {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    
    .close_ket_sehat:hover,
    .close_ket_sehat:focus {
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
              <h2>Data Pendaftar</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="{{ $data_pendaftar->file_foto }}" width="220" height="220" alt="Avatar" title="Change the avatar">
                  </div>
                </div>
                <h3>{{ $data_pendaftar->nama }}</h3>

                <ul class="list-unstyled user_data">
                  <li>
                      <i class="fa fa-map-marker user-profile-icon"></i> {{ $data_pendaftar->tempat_lahir }}
                  </li>
                </ul>

              </div>
              <div class="col-md-9 col-sm-9 ">


                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data Diri</a>
                    </li>
                    <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Data Orang Tua (Ayah)</a>
                    </li>
                    <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Data Orang Tua (Ibu)</a>
                    </li>
                    <li role="presentation" class="active"><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Data Dokumen</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                      <!-- start recent activity -->
                      <hr>

                      <label for="" class="col-md-2 col-form-label text-md-left">No Pendaftar</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->id_pendaftar }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">NIK</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->nik }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Nama Lengkap</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->nama }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">No Telephone</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->no_telepon }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Jenis Kelamin</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->jenis_kelamin }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Tanggal Lahir</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->tgl_lahir }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Tempat Lahir</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->tempat_lahir }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Agama</label>
                      <label for="agama" id="agama" class="col-form-label"></label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Alamat</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->jln }} RT{{ $data_pendaftar->rt }}/{{ $data_pendaftar->rw }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Kewarganegaraan</label>
                      <label for="warganegara" id="warganegara" class="col-form-label "></label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Provinsi</label>
                      <label for="provinsi" id="provinsi" class="col-form-label "></label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Kota</label>
                      <label for="kota" id="kota" class="col-form-label "></label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Kecamatan</label>
                      <label for="kecamatan" id="kecamatan" class="col-form-label "></label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Kelurahan / Desa</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->ds_kel }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Kode Pos</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->kode_pos }}</label>

                      <hr>
                      <!-- end recent activity -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                      <!-- start user projects -->
                      <hr>
                      <label for="" class="col-md-2 col-form-label text-md-left">NIK</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->nik_ayah }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Nama</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->nama_ayah }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Tanggal Lahir</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->tgl_lahir_ayah }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Pendidikan</label>
                      <label for="pendidikan_a" id="pendidikan_a" class="col-form-label "></label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Pekerjaan</label>
                      <label for="pekerjaan_a" id="pekerjaan_a" class="col-form-label "></label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Penghasilan Ayah</label>
                      <label for="penghasilan_a" id="penghasilan_a" class="col-form-label "></label>
                      <hr>
                      <!-- end user projects -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <hr>
                      <label for="" class="col-md-2 col-form-label text-md-left">NIK</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->nik_ibu }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Nama</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->nama_ibu }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Tanggal Lahir</label>
                      <label for="nik" id="nik" class="col-form-label ">: {{ $data_pendaftar->tgl_lahir_ibu }}</label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Pendidikan</label>
                      <label for="pendidikan_i" id="pendidikan_i" class="col-form-label "></label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Pekerjaan</label>
                      <label for="pekerjaan_i" id="pekerjaan_i" class="col-form-label "></label>
                      <br>
                      <label for="" class="col-md-2 col-form-label text-md-left">Penghasilan Ayah</label>
                      <label for="penghasilan_i" id="penghasilan_i" class="col-form-label "></label>
                      <hr>
                      <!-- end user projects -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                        <hr>
                        <img id="myImgKTP" src="{{ $data_pendaftar->file_ktp }}" width="220" height="220" alt="File KTP">
                            <!-- The Modal -->
                            <div id="myModalKTP" class="modal">
                                <span class="close_ktp">&times;</span>
                                <img class="modal-content" id="ktp">
                                <div id="caption_ktp"></div>
                              </div>
                        &nbsp;
                        <img id="myImgFOTO" src="{{ $data_pendaftar->file_foto }}" width="220" height="220" alt="File Foto">
                              <!-- The Modal -->
                          <div id="myModalFOTO" class="modal">
                            <span class="close_foto">&times;</span>
                            <img class="modal-content" id="foto">
                            <div id="caption_foto"></div>
                          </div>
                        &nbsp;
                        <img id="myImgKK" src="{{ $data_pendaftar->file_kk }}" width="220" height="220" alt="File Kartu Keluarga">
                          <!-- The Modal -->
                          <div id="myModalKK" class="modal">
                            <span class="close_kk">&times;</span>
                            <img class="modal-content" id="kk">
                            <div id="caption_kk"></div>
                          </div>
                        <br>
                        <br>
                        <img id="myImgIJAZAH" src="{{ $data_pendaftar->file_ijazah }}" width="220" height="220" alt="File Ijazah">
                          <!-- The Modal -->
                          <div id="myModalIJAZAH" class="modal">
                            <span class="close_ijazah">&times;</span>
                            <img class="modal-content" id="ijazah">
                            <div id="caption_ijazah"></div>
                          </div>
                        &nbsp;
                        <img id="myImgKET_SEHAT" src="{{ $data_pendaftar->file_ket_sehat }}" width="220" height="220" alt="File Keterangan Sehat">
                          <!-- The Modal -->
                           <div id="myModalKET_SEHAT" class="modal">
                            <span class="close_ket_sehat">&times;</span>
                            <img class="modal-content" id="ket_sehat">
                            <div id="caption_ket_sehat"></div>
                          </div>
                        &nbsp;
                        <img id="myImgAKTA" src="{{ $data_pendaftar->file_akta }}" width="220" height="220" alt="File Foto">
                          <!-- The Modal -->
                        <div id="myModalAKTA" class="modal">
                            <span class="close_akta">&times;</span>
                            <img class="modal-content" id="akta">
                            <div id="caption_akta"></div>
                          </div>
                        <hr>
                    </div>
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
  $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
        $.ajax({
				type : "GET",
				url:'{{route('agama.get')}}',
				data:{'id':'{{ $data_pendaftar->agama }}'},
				success:function(data){
          console.log(data.nm_agama);
          $('#agama').text(': '+data.nm_agama);
				}
			});

      $.ajax({
				type : "GET",
				url:'{{route('provinsi.get')}}',
				data:{'id':'{{ $data_pendaftar->id_prov }}'},
				success:function(data){
          console.log(data);
          $('#provinsi').text(': '+data.provinsi);
				}
			});
      
      $.ajax({
				type : "GET",
				url:'{{route('kota.get')}}',
				data:{'id':'{{ $data_pendaftar->id_kota }}'},
				success:function(data){
          console.log(data);
          $('#kota').text(': '+data.kota);
				}
			});
     
      $.ajax({
				type : "GET",
				url:'{{route('kecamatan.get')}}',
				data:{'id':'{{ $data_pendaftar->id_wil }}'},
				success:function(data){
          console.log(data);
          $('#kecamatan').text(': '+data.kecamatan);
				}
			});
      
      $.ajax({
				type : "GET",
				url:'{{route('pendidikan.get')}}',
				data:{'id':'{{ $data_pendaftar->pendidikan_ayah }}'},
				success:function(data){
          console.log(data);
          $('#pendidikan_a').text(': '+data.nm_jenj_didik);
				}
			});
      
      $.ajax({
				type : "GET",
				url:'{{route('pekerjaan.get')}}',
				data:{'id':'{{ $data_pendaftar->pekerjaan_ayah }}'},
				success:function(data){
          console.log(data);
          $('#pekerjaan_a').text(': '+data.nm_pekerjaan);
				}
			});
      
      $.ajax({
				type : "GET",
				url:'{{route('penghasilan.get')}}',
				data:{'id':'{{ $data_pendaftar->penghasilan_ayah }}'},
				success:function(data){
          console.log(data);
          $('#penghasilan_a').text(': '+data.nm_penghasilan);
				}
			});

      $.ajax({
				type : "GET",
				url:'{{route('pendidikan.get')}}',
				data:{'id':'{{ $data_pendaftar->pendidikan_ibu }}'},
				success:function(data){
          console.log(data);
          $('#pendidikan_i').text(': '+data.nm_jenj_didik);
				}
			});
      
      $.ajax({
				type : "GET",
				url:'{{route('pekerjaan.get')}}',
				data:{'id':'{{ $data_pendaftar->pekerjaan_ibu }}'},
				success:function(data){
          console.log(data);
          $('#pekerjaan_i').text(': '+data.nm_pekerjaan);
				}
			});
      
      $.ajax({
				type : "GET",
				url:'{{route('penghasilan.get')}}',
				data:{'id':'{{ $data_pendaftar->penghasilan_ibu }}'},
				success:function(data){
          console.log(data);
          $('#penghasilan_i').text(': '+data.nm_penghasilan);
				}
			});
      
      $.ajax({
				type : "GET",
				url:'{{route('warganegara.get')}}',
				data:{'id':'{{ $data_pendaftar->warganegara }}'},
				success:function(data){
          console.log(data);
          $('#warganegara').text(': '+data.nm_wil);
				}
			});
  });
</script>
<script>
    // Get the modal
    var modal_ktp = document.getElementById("myModalKTP");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_ktp = document.getElementById("myImgKTP");
    var modalImg_ktp = document.getElementById("ktp");
    var captionText_ktp = document.getElementById("caption_ktp");
    img_ktp.onclick = function(){
      modal_ktp.style.display = "block";
      modalImg_ktp.src = this.src;
      captionText_ktp.innerHTML = this.alt;
    }

    // Get the modal
    var modal_foto = document.getElementById("myModalFOTO");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_foto = document.getElementById("myImgFOTO");
    var modalImg_foto = document.getElementById("foto");
    var captionText_foto = document.getElementById("caption_foto");
    img_foto.onclick = function(){
      modal_foto.style.display = "block";
      modalImg_foto.src = this.src;
      captionText_foto.innerHTML = this.alt;
    }    

    // Get the modal
    var modal_kk = document.getElementById("myModalKK");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_kk = document.getElementById("myImgKK");
    var modalImg_kk = document.getElementById("kk");
    var captionText_kk = document.getElementById("caption_kk");
    img_kk.onclick = function(){
      modal_kk.style.display = "block";
      modalImg_kk.src = this.src;
      captionText_kk.innerHTML = this.alt;
    }

    // Get the modal
    var modal_akta = document.getElementById("myModalAKTA");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_akta = document.getElementById("myImgAKTA");
    var modalImg_akta = document.getElementById("akta");
    var captionText_akta = document.getElementById("caption_akta");
    img_akta.onclick = function(){
      modal_akta.style.display = "block";
      modalImg_akta.src = this.src;
      captionText_akta.innerHTML = this.alt;
    }

    // Get the modal
    var modal_ijazah = document.getElementById("myModalIJAZAH");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_ijazah = document.getElementById("myImgIJAZAH");
    var modalImg_ijazah = document.getElementById("ijazah");
    var captionText_ijazah = document.getElementById("caption_ijazah");
    img_ijazah.onclick = function(){
      modal_ijazah.style.display = "block";
      modalImg_ijazah.src = this.src;
      captionText_ijazah.innerHTML = this.alt;
    }

    // Get the modal
    var modal_ket_sehat = document.getElementById("myModalKET_SEHAT");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_ket_sehat = document.getElementById("myImgKET_SEHAT");
    var modalImg_ket_sehat = document.getElementById("ket_sehat");
    var captionText_ket_sehat = document.getElementById("caption_ket_sehat");
    img_ket_sehat.onclick = function(){
      modal_ket_sehat.style.display = "block";
      modalImg_ket_sehat.src = this.src;
      captionText_ket_sehat.innerHTML = this.alt;
    }                

    // Get the <span> element that closes the modal
    var span_ktp = document.getElementsByClassName("close_ktp")[0];

    // When the user clicks on <span> (x), close the modal
    span_ktp.onclick = function() { 
      modal_ktp.style.display = "none";
    }

    // Get the <span> element that closes the modal
    var span_foto = document.getElementsByClassName("close_foto")[0];

    // When the user clicks on <span> (x), close the modal
    span_foto.onclick = function() { 
      modal_foto.style.display = "none";
    }

    // Get the <span> element that closes the modal
    var span_kk = document.getElementsByClassName("close_kk")[0];

    // When the user clicks on <span> (x), close the modal
    span_kk.onclick = function() { 
      modal_kk.style.display = "none";
    }

    // Get the <span> element that closes the modal
    var span_akta = document.getElementsByClassName("close_akta")[0];

    // When the user clicks on <span> (x), close the modal
    span_akta.onclick = function() { 
      modal_akta.style.display = "none";
    }

    // Get the <span> element that closes the modal
    var span_ijazah = document.getElementsByClassName("close_ijazah")[0];

    // When the user clicks on <span> (x), close the modal
    span_ijazah.onclick = function() { 
      modal_ijazah.style.display = "none";
    }

    // Get the <span> element that closes the modal
    var span_ket_sehat = document.getElementsByClassName("close_ket_sehat")[0];

    // When the user clicks on <span> (x), close the modal
    span_ket_sehat.onclick = function() { 
      modal_ket_sehat.style.display = "none";
    }
</script>
@endsection