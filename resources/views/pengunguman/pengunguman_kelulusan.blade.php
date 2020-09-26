@extends('frame.index')
@section('title', 'PMB | UNNUR')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form | Pengumuman</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @foreach($pengunguman as $content)
                        <div class="row">
                            <div class="col-sm-12 shadow p-3 mb-5 bg-white rounded">
                                <div><h2 class="text-center">{{$content->header}}</h2></div>
                                <div>{!!$content->isi!!}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
