<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PMB | UNNUR</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{ asset('regtem/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ asset('regtem/css/style.css') }}">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="{{ asset('regtem/images/nur.png') }}" alt="">
				</div>
                <form method="POST" action="{{ route('simpan.calonmhs') }}">
                    @csrf
					<h3>Pendaftaran Calon Mahasiswa</h3>
					<div class="form-row">
						<input id="nik" type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="" required autocomplete="nik" placeholder="NIK"  autofocus>
                                
                                @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
								@enderror
								
								<input id="nama" type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" value="" placeholder="Nama Lengkap" required  autofocus>
                            
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
					</div>
					<div class="form-row">
						<input id="telp" type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" value="" placeholder="No Telephone"  required  autofocus>
                            
                                @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
					</div>
					<div class="form-row">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" placeholder="Password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
								@enderror
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password " required autocomplete="new-password">
										
					</div>
					<div class="form-row">
						<div class="form-holder">
							<select name="fakultas" id="fakultas" class="form-control">
								<option value=""selected disabled>Pilih Fakultas</option>
								@foreach($list_fakultas as $value)
                                    <option value="{{$value->id_fakultas}}">{{$value->nama_fakultas}}</option>
                                @endforeach
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
						<div class="form-holder">
							<select name="prodi" id="prodi" class="form-control">
								<option value=""selected disabled>Pilih Jurusan / Program Studi</option>
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
					</div>
					
					<div class="form-row">						
						<div class="form-holder">
							<select name="jenjangp" id="jenjangp" class="form-control">
								<option value=""selected disabled>Pilih Jenjang Pendidikan</option>
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
						<div class="form-holder">
							<select name="kelas" id="kelas" class="form-control">
								<option value=""selected disabled>Pilih Kelas</option>
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
					</div>

					<div class="form-row">
						<input id="tahun" type="text" class="form-control" name="tahun" value="" placeholder="Tahun Masuk" readonly>
						<input id="biaya_regis" type="text" class="form-control" name="biaya_regis" value="" placeholder="Biaya Pendaftaran" readonly>
					</div>
					<button>Daftar
						<i class="zmdi zmdi-long-arrow-right"></i>
					</button>
				</form>
				
			</div>
		</div>

		<script src="{{ asset('regtem/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('regtem/js/main.js') }}"></script>
        <script type="text/javascript">
            $( document ).ready(function() {
                var d = new Date();
                var n = d.getFullYear();
                // var d = new Date();
                // var strDate = d.getFullYear().toString() + "-" + ( '0' + (d.getMonth()+1) ).slice(-2).toString() + "-" + ( '0' + d.getDate() ).slice(-2).toString();
                $('#tahun').val(n);
            
                $('#fakultas').change(function(e){
                        console.log(e);
                        var id_fakultas = $(this).val();
                        console.log(id_fakultas);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });  
                        
                    $.ajax({
                            type : "GET",
                            url:'{{route('get.prodi')}}',
                            data:{'id_fakultas':id_fakultas},
                            success:function(data){
                                console.log(data);
                                $('#prodi').empty();
                                    $('#prodi').append('<option value=""selected disabled>Pilih Jurusan / Program Studi</option>');
            
                                    $('#jenjangp').empty();
                                    $('#jenjangp').append('<option value=""selected disabled>Pilih Jenjang Pendidikan</option>');
            
                                    $('#kelas').empty();
                                    $('#kelas').append('<option value=""selected disabled>Pilih Kelas</option>');
                                    $('#biaya_regis').val("");
                                    $('#id_pmb').val("");
                                for(var i = 0; i < data.length; i++) {
                                    var opt = '<option value="'+ data[i].id_prodi +'">'+ data[i].nama_prodi +'</option>';
                                    $('#prodi').append(opt);
                                }
                                                   
                            }
                        });
            
                        });
            
                        $('#prodi').on('change', function(e){
                        console.log(e);
                        var id_prodi = $(this).val();
            
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });  
                            
                        $.ajax({
                                type : "GET",
                                url:'{{route('get.strata')}}',
                                data:{'id_prodi':id_prodi},
                                success:function(data){
                                    console.log(data);
                                    $('#jenjangp').empty();
                                    $('#jenjangp').append('<option value=""selected disabled>Pilih Jenjang Pendidikan</option>');
                                    $('#kelas').empty();
                                    $('#kelas').append('<option value=""selected disabled>Pilih Kelas</option>');
                                    $('#biaya_regis').val("");
                                    $('#id_pmb').val("");
                                    for(var i = 0; i < data.length; i++) {
                                        var opt = '<option value="'+ data[i].id_strata +'">'+ data[i].jenis_strata +'</option>';
                                        $('#jenjangp').append(opt);
                                    }
                                                    
                                }
                            });
                        });
            
                        $('#jenjangp').on('change', function(e){
                        console.log(e);
                        var id_strata = $(this).val();
                        $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });  
                            
                        $.ajax({
                                type : "GET",
                                url:'{{route('get.kelas')}}',
                                data:{'id_strata':id_strata},
                                success:function(data){
                                    console.log(data);
                                    $('#kelas').empty();
                                    $('#kelas').append('<option value=""selected disabled>Pilih Kelas</option>');
                                    $('#biaya_regis').val("");
                                    $('#id_pmb').val("");
                                    for(var i = 0; i < data.length; i++) {
                                        var opt = '<option value="'+ data[i].id_kelas +'">'+ data[i].nama_kelas +'</option>';
                                        $('#kelas').append(opt);
                                    }
                                                    
                                }
                            });
                    });
            
                    $('#kelas').on('change', function(e){
                        var id_fakultas = $('#fakultas').val();
                        var id_strata = $('#jenjangp').val();
                        var id_kelas = $('#kelas').val();
            
                        $.ajax({
                        method : "GET",
                        url:'{{route('get.biaya')}}',
                        data:{'id_fakultas':id_fakultas,'id_strata':id_strata,'id_kelas':id_kelas},
                        success:function(data){
                            console.log("biaya");
                            console.log(data.biaya_registrasi);
            
                            $('#biaya_regis').val(data.biaya_registrasi);
                            //$('#id_pmb').val(data.id_pmb);
            
                        }
                        });
            
                    });
            
            });
            
            
            </script>
	</body>
</html>