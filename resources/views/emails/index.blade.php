@extends('frame.index')
@section('title_admin','active')
@section('tchild_admin','current-page')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('css')
<style>
.input {
    border-radius: 10px;
    font-size: small;
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
                        <h2>Setting konfigurasi Email</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            method="POST" action="{{ route('set.email.store') }}">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="heademail">Judul:</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control input" name="header" id="header">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Isi
                                    Pengumuman:</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control input" name="isi" id="editor" cols="30"
                                        rows="10"></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="heademail">ID
                                    PMB</label>
                                <div class="col-md-6 col-sm-6">
                                    <select type="text" class="form-control input" name="id_pmb" id="id_pmb">

                                    </select>
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
                        <h2>Data Konfigurasi Email</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-responsive" class="table table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Judul</th>
                                                <th>Isi Pengumuman</th>
                                                <th>ID PMB</th>
                                                <th>status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($email as $mail)
                                            <tr>
                                                <td>{{$mail->header}}</td>
                                                <td>{!!$mail->isi!!}</td>
                                                <td>{{$mail->id_pmb}}</td>
                                                @if ($mail->status != 1)
                                                <td>
                                                    <p style="color: red">de-active</p>
                                                </td>
                                                @else
                                                <td>
                                                    <p style="color: green">active</p>
                                                </td>
                                                @endif
                                                <td>
                                                    <form action="{{route('set.email.update',$mail->id)}}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        @if ($mail->status != 0)
                                                        <a href="{{route('set.email.sebar',$mail->id)}}"
                                                            class="btn btn-sm btn-primary">Sebar</>
                                                            <a href="{{route('set.email.destroy',$mail->id)}}"
                                                                class="btn btn-sm btn-danger">Delete</a>
                                                            @else
                                                            <button class="btn btn-warning btn-sm">Active</button>
                                                            <a href="{{route('set.email.destroy',$mail->id)}}"
                                                                class="btn btn-sm btn-danger">Delete</a>
                                                            @endif
                                                    </form>
                                                </td>
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
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
$('#id_pmb').select2({
    placeholder: '- Pilih ID PMB -',
    ajax: {
        url: '{{url('/get-data-gelombnag-opened')}}',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
            return {
                results: $.map(data, function(pmb) {
                    return {
                        id: pmb.id_pmb,
                        text: pmb.id_pmb + ' - ' + pmb.gelombang
                    }
                })
            };
        },
        cache: true
    }
});
$(document).ready(function() {
  $('#editor').summernote();
});
</script>
@endsection