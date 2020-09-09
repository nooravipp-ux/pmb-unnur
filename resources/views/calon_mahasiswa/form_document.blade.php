@extends('frame.index')
@section('style')
<style>
#myImgKTP {
    border-radius: 5px;
    cursor: pointer;
    width: 200px;
    height: 300px;
    transition: 0.3s;
}

#myImgKTP:hover {opacity: 0.7;}

#myImgFOTO {
    border-radius: 5px;
    cursor: pointer;
    width: 200px;
    height: 300px;
    transition: 0.3s;
}

#myImgFOTO:hover {opacity: 0.7;}

#myImgKK {
    border-radius: 5px;
    cursor: pointer;
    width: 200px;
    height: 300px;
    transition: 0.3s;
}

#myImgKK:hover {opacity: 0.7;}

#myImgAKTA {
    border-radius: 5px;
    cursor: pointer;
    width: 200px;
    height: 300px;
    transition: 0.3s;
}

#myImgAKTA:hover {opacity: 0.7;}

#myImgIJAZAH {
    border-radius: 5px;
    cursor: pointer;
    width: 200px;
    height: 300px;
    transition: 0.3s;
}

#myImgIJAZAH:hover {opacity: 0.7;}

#myImgKET_SEHAT {
    border-radius: 5px;
    cursor: pointer;
    width: 200px;
    height: 300px;
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
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Upload Document </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Calon Mahasiswa</h2>
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
                   
                    <form action="{{ route('upload.document') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <br>
                      

                    <div class="form-group row" id="d_file_ktp" >
                        <label for="metode" class="col-md-4 col-form-label text-md-right">Upload Foto KTP*</label>
                        <div class="col-md-6">
                            <input type="hidden" name="hidden_email" id="hidden_email" value="{{ Auth::user()->email }}">
                            <input type="hidden" name="id_pendaftar" id="id_pendaftar" value="">
                            <input type="file" name="file_ktp" id="file_ktp" class="form-control-file @error('file_ktp') is-invalid @enderror">
                            @error('file_ktp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" id="d_gambar_ktp">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                        <div class="col-md-6 col-sm-6 ">
                            <img class="img-fluid" id="myImgKTP" alt="Foto KTP" src="">
                        </div>
                        <!-- The Modal -->
                        <div id="myModalKTP" class="modal">
                          <span class="close_ktp">&times;</span>
                          <img class="modal-content" id="ktp">
                          <div id="caption_ktp"></div>
                        </div>
                      </div>

                    <div class="form-group row" id="d_file_foto" >
                        <label for="metode" class="col-md-4 col-form-label text-md-right">Upload File Foto*</label>
                        <div class="col-md-6">
                            <input type="file" name="file_foto" id="file_foto" class="form-control-file @error('file_foto') is-invalid @enderror">
                            @error('file_foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" id="d_gambar_foto">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                        <div class="col-md-6 col-sm-6 ">
                            <img class="img-fluid" id="myImgFOTO" alt="Foto " src="">
                        </div>
                        <!-- The Modal -->
                        <div id="myModalFOTO" class="modal">
                          <span class="close_foto">&times;</span>
                          <img class="modal-content" id="foto">
                          <div id="caption_foto"></div>
                        </div>
                      </div>

                    <div class="form-group row" id="d_file_kk" >
                        <label for="metode" class="col-md-4 col-form-label text-md-right">Upload Foto Kartu Keluarga*</label>
                        <div class="col-md-6">
                            <input type="file" name="file_kk" id="file_kk" class="form-control-file @error('file_kk') is-invalid @enderror">
                            @error('file_kk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" id="d_gambar_kk">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                        <div class="col-md-6 col-sm-6 ">
                            <img class="img-fluid" id="myImgKK" alt="Foto KK" src="">
                        </div>
                        <!-- The Modal -->
                        <div id="myModalKK" class="modal">
                          <span class="close_kk">&times;</span>
                          <img class="modal-content" id="kk">
                          <div id="caption_kk"></div>
                        </div>
                      </div>

                    <div class="form-group row" id="d_file_akta" >
                        <label for="metode" class="col-md-4 col-form-label text-md-right">Upload Foto Akta Kelahiran*</label>
                        <div class="col-md-6">
                            <input type="file" name="file_akta" id="file_akta" class="form-control-file @error('file_akta') is-invalid @enderror">
                            @error('file_akta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" id="d_gambar_akta">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                        <div class="col-md-6 col-sm-6 ">
                            <img class="img-fluid" id="myImgAKTA" alt="Foto AKTA" src="">
                        </div>
                        <!-- The Modal -->
                        <div id="myModalAKTA" class="modal">
                          <span class="close_akta">&times;</span>
                          <img class="modal-content" id="akta">
                          <div id="caption_akta"></div>
                        </div>
                      </div>

                    <div class="form-group row" id="d_file_ijazah" >
                        <label for="metode" class="col-md-4 col-form-label text-md-right">Upload Foto Ijazah*</label>
                        <div class="col-md-6">
                            <input type="file" name="file_ijazah" id="file_ijazah" class="form-control-file @error('file_ijazah') is-invalid @enderror">
                            @error('file_ijazah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" id="d_gambar_ijazah">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                        <div class="col-md-6 col-sm-6 ">
                            <img class="img-fluid" id="myImgIJAZAH" alt="Foto IJAZAH" src="">
                        </div>
                        <!-- The Modal -->
                        <div id="myModalIJAZAH" class="modal">
                          <span class="close_ijazah">&times;</span>
                          <img class="modal-content" id="ijazah">
                          <div id="caption_ijazah"></div>
                        </div>
                      </div>

                    <div class="form-group row" id="d_file_ket_sehat" >
                        <label for="metode" class="col-md-4 col-form-label text-md-right">Upload Foto Keterangan Sehat*</label>
                        <div class="col-md-6">
                            <input type="file" name="file_ket_sehat" id="file_ket_sehat" class="form-control-file @error('file_ket_sehat') is-invalid @enderror">
                            @error('file_ket_sehat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" id="d_gambar_ket_sehat">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                        <div class="col-md-6 col-sm-6 ">
                            <img class="img-fluid" id="myImgKET_SEHAT" alt="Foto KET_SEHAT" src="">
                        </div>
                        <!-- The Modal -->
                        <div id="myModalKET_SEHAT" class="modal">
                          <span class="close_ket_sehat">&times;</span>
                          <img class="modal-content" id="ket_sehat">
                          <div id="caption_ket_sehat"></div>
                        </div>
                      </div>
                    

                    <span class="section"></span>

                    <div class="form-group row mb-0" id="btn-submit" >
                        <div class="col-md-8 offset-md-4">
                            <button id="btn-submit" type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$( document ).ready(function() {    
            var email = $('#hidden_email').val();
            console.log(email);
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });  

            $.ajax({
            method : "GET",
            url:'{{route('get.document')}}',
            data:{'email':email},
            success:function(data){
                console.log(data.id_pendaftar);
                $("#id_pendaftar").val(data.id_pendaftar);
                $("#myImgKTP").attr('src', 'data:image/png;base64,' + data.file_ktp);
                $("#myImgKK").attr('src', 'data:image/png;base64,' + data.file_kk);
                $("#myImgFOTO").attr('src', 'data:image/png;base64,' + data.file_foto);
                $("#myImgIJAZAH").attr('src', 'data:image/png;base64,' + data.file_ijazah);
                $("#myImgAKTA").attr('src', 'data:image/png;base64,' + data.file_akta);
                $("#myImgKET_SEHAT").attr('src', 'data:image/png;base64,' + data.file_ket_sehat);
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