@extends('frame.index')
@section('style')
<style>
/* Style the Image Used to Trigger the Modal */
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {
    opacity: 0.7;
}

/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.9);
    /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
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

/* Add Animation - Zoom in the Modal */
.modal-content,
#caption {
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
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
@media only screen and (max-width: 700px) {
    .modal-content {
        width: 100%;
    }
}

h2 {
    clear: both;
    font-size: 1.8em;
    margin-bottom: 10px;
    padding: 10px 0 10px 30px;
}

h3>span {
    border-bottom: 2px solid #C2C2C2;
    display: inline-block;
    padding: 0 5px 5px;
}

/* USER PROFILE */
#user-profile h2 {
    padding-right: 15px;
}

#user-profile .profile-status {
    font-size: 0.75em;
    padding-left: 12px;
    margin-top: -10px;
    padding-bottom: 10px;
    color: #8dc859;
}

#user-profile .profile-status.offline {
    color: #fe635f;
}

#user-profile .profile-img {
    border: 1px solid #e1e1e1;
    padding: 4px;
    margin-top: 10px;
    margin-bottom: 10px;
}

#user-profile .profile-label {
    text-align: center;
    padding: 5px 0;
}

#user-profile .profile-label .label {
    padding: 5px 15px;
    font-size: 1em;
}

#user-profile .profile-stars {
    color: #FABA03;
    padding: 7px 0;
    text-align: center;
}

#user-profile .profile-stars>i {
    margin-left: -2px;
}

#user-profile .profile-since {
    text-align: center;
    margin-top: -5px;
}

#user-profile .profile-details {
    padding: 15px 0;
    border-top: 1px solid #e1e1e1;
    border-bottom: 1px solid #e1e1e1;
    margin: 15px 0;
}

#user-profile .profile-details ul {
    padding: 0;
    margin-top: 0;
    margin-bottom: 0;
    margin-left: 40px;
}

#user-profile .profile-details ul>li {
    margin: 3px 0;
    line-height: 1.5;
}

#user-profile .profile-details ul>li>i {
    padding-top: 2px;
}

#user-profile .profile-details ul>li>span {
    color: #34d1be;
}

#user-profile .profile-header {
    position: relative;
}

#user-profile .profile-header>h3 {
    margin-top: 10px
}

#user-profile .profile-header .edit-profile {
    margin-top: -6px;
    position: absolute;
    right: 0;
    top: 0;
}

#user-profile .profile-tabs {
    margin-top: 30px;
}

#user-profile .profile-user-info {
    padding-bottom: 20px;
}

#user-profile .profile-user-info .profile-user-details {
    position: relative;
    padding: 4px 0;
}

#user-profile .profile-user-info .profile-user-details .profile-user-details-label {
    width: 110px;
    float: left;
    bottom: 0;
    font-weight: bold;
    left: 0;
    position: absolute;
    text-align: right;
    top: 0;
    width: 110px;
    padding-top: 4px;
}

#user-profile .profile-user-info .profile-user-details .profile-user-details-value {
    margin-left: 120px;
}

#user-profile .profile-social li {
    padding: 4px 0;
}

#user-profile .profile-social li>i {
    padding-top: 6px;
}

@media only screen and (max-width: 767px) {
    #user-profile .profile-user-info .profile-user-details .profile-user-details-label {
        float: none;
        position: relative;
        text-align: left;
    }

    #user-profile .profile-user-info .profile-user-details .profile-user-details-value {
        margin-left: 0;
    }

    #user-profile .profile-social {
        margin-top: 20px;
    }
}

@media only screen and (max-width: 420px) {
    #user-profile .profile-header .edit-profile {
        display: block;
        position: relative;
        margin-bottom: 15px;
    }

    #user-profile .profile-message-btn .btn {
        display: block;
    }
}


.main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    padding: 20px;
}

.main-box h2 {
    margin: 0 0 15px -20px;
    padding: 5px 0 5px 20px;
    border-left: 10px solid #c2c2c2;
    /*7e8c8d*/
}

.btn {
    border: none;
    padding: 6px 12px;
    border-bottom: 4px solid;
    -webkit-transition: border-color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;
    transition: border-color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;
    outline: none;
}

.btn-default,
.wizard-cancel,
.wizard-back {
    background-color: #7e8c8d;
    border-color: #626f70;
    color: #fff;
}

.btn-default:hover,
.btn-default:focus,
.btn-default:active,
.btn-default.active,
.open .dropdown-toggle.btn-default,
.wizard-cancel:hover,
.wizard-cancel:focus,
.wizard-cancel:active,
.wizard-cancel.active,
.wizard-back:hover,
.wizard-back:focus,
.wizard-back:active,
.wizard-back.active {
    background-color: #949e9f;
    border-color: #748182;
    color: #fff;
}

.btn-default .caret {
    border-top-color: #FFFFFF;
}

.btn-info {
    background-color: #5daee7;
    border-color: #4c95c9;
}

.btn-info:hover,
.btn-info:focus,
.btn-info:active,
.btn-info.active,
.open .dropdown-toggle.btn-info {
    background-color: #4c95c9;
    border-color: #3f80af;
}

.btn-link {
    border: none;
}

.btn-primary {
    background-color: #3fcfbb;
    border-color: #2fb2a0;
}

.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary {
    background-color: #38c2af;
    border-color: #2aa493;
}

.btn-success {
    background-color: #8dc859;
    border-color: #77ab49;
}

.btn-success:hover,
.btn-success:focus,
.btn-success:active,
.btn-success.active,
.open .dropdown-toggle.btn-success {
    background-color: #77ab49;
}

.btn-danger {
    background-color: #fe635f;
    border-color: #dd504c;
}

.btn-danger:hover,
.btn-danger:focus,
.btn-danger:active,
.btn-danger.active,
.open .dropdown-toggle.btn-danger {
    background-color: #dd504c;
}

.btn-warning {
    background-color: #f1c40f;
    border-color: #d5ac08;
}

.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active,
.btn-warning.active,
.open .dropdown-toggle.btn-warning {
    background-color: #e0b50a;
    border-color: #bd9804;
}

.icon-box {}

.icon-box .btn {
    border: 1px solid #e1e1e1;
    margin-left: 3px;
    margin-right: 0;
}

.icon-box .btn:hover {
    background-color: #eee;
    color: #2BB6A3;
}

a {
    color: #2bb6a3;
    outline: none !important;
}

a:hover,
a:focus {
    color: #2bb6a3;
}


/* TABLES */
.table {
    border-collapse: separate;
}

.table-hover>tbody>tr:hover>td,
.table-hover>tbody>tr:hover>th {
    background-color: #eee;
}

.table thead>tr>th {
    border-bottom: 1px solid #C2C2C2;
    padding-bottom: 0;
}

.table tbody>tr>td {
    font-size: 0.875em;
    background: #f5f5f5;
    border-top: 10px solid #fff;
    vertical-align: middle;
    padding: 12px 8px;
}

.table tbody>tr>td:first-child,
.table thead>tr>th:first-child {
    padding-left: 20px;
}

.table thead>tr>th span {
    border-bottom: 2px solid #C2C2C2;
    display: inline-block;
    padding: 0 5px;
    padding-bottom: 5px;
    font-weight: normal;
}

.table thead>tr>th>a span {
    color: #344644;
}

.table thead>tr>th>a span:after {
    content: "\f0dc";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    margin-left: 5px;
    font-size: 0.75em;
}

.table thead>tr>th>a.asc span:after {
    content: "\f0dd";
}

.table thead>tr>th>a.desc span:after {
    content: "\f0de";
}

.table thead>tr>th>a:hover span {
    text-decoration: none;
    color: #2bb6a3;
    border-color: #2bb6a3;
}

.table.table-hover tbody>tr>td {
    -webkit-transition: background-color 0.15s ease-in-out 0s;
    transition: background-color 0.15s ease-in-out 0s;
}

.table tbody tr td .call-type {
    display: block;
    font-size: 0.75em;
    text-align: center;
}

.table tbody tr td .first-line {
    line-height: 1.5;
    font-weight: 400;
    font-size: 1.125em;
}

.table tbody tr td .first-line span {
    font-size: 0.875em;
    color: #969696;
    font-weight: 300;
}

.table tbody tr td .second-line {
    font-size: 0.875em;
    line-height: 1.2;
}

.table a.table-link {
    margin: 0 5px;
    font-size: 1.125em;
}

.table a.table-link:hover {
    text-decoration: none;
    color: #2aa493;
}

.table a.table-link.danger {
    color: #fe635f;
}

.table a.table-link.danger:hover {
    color: #dd504c;
}

.table-products tbody>tr>td {
    background: none;
    border: none;
    border-bottom: 1px solid #ebebeb;
    -webkit-transition: background-color 0.15s ease-in-out 0s;
    transition: background-color 0.15s ease-in-out 0s;
    position: relative;
}

.table-products tbody>tr:hover>td {
    text-decoration: none;
    background-color: #f6f6f6;
}

.table-products .name {
    display: block;
    font-weight: 600;
    padding-bottom: 7px;
}

.table-products .price {
    display: block;
    text-decoration: none;
    width: 50%;
    float: left;
    font-size: 0.875em;
}

.table-products .price>i {
    color: #8dc859;
}

.table-products .warranty {
    display: block;
    text-decoration: none;
    width: 50%;
    float: left;
    font-size: 0.875em;
}

.table-products .warranty>i {
    color: #f1c40f;
}

.table tbody>tr.table-line-fb>td {
    background-color: #9daccb;
    color: #262525;
}

.table tbody>tr.table-line-twitter>td {
    background-color: #9fccff;
    color: #262525;
}

.table tbody>tr.table-line-plus>td {
    background-color: #eea59c;
    color: #262525;
}

.table-stats .status-social-icon {
    font-size: 1.9em;
    vertical-align: bottom;
}

.table-stats .table-line-fb .status-social-icon {
    color: #556484;
}

.table-stats .table-line-twitter .status-social-icon {
    color: #5885b8;
}

.table-stats .table-line-plus .status-social-icon {
    color: #a75d54;
}

.daterange-filter {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    cursor: pointer;
    padding: 5px 10px;
}

.filter-block .form-group {
    margin-right: 10px;
    position: relative;
}

.filter-block .form-group .form-control {
    height: 36px;
}

.filter-block .form-group .search-icon {
    position: absolute;
    color: #707070;
    right: 8px;
    top: 11px;
}

.filter-block .btn {
    margin-left: 5px;
}

@media only screen and (max-width: 440px) {
    .filter-block {
        float: none !important;
        clear: both
    }

    .filter-block .form-group {
        float: none !important;
        margin-right: 0;
    }

    .filter-block .btn {
        display: block;
        float: none !important;
        margin-bottom: 15px;
        margin-left: 0;
    }

    #reportrange {
        clear: both;
        float: none !important;
        margin-bottom: 15px;
    }
}


.tabs-wrapper .tab-content {
    margin-bottom: 20px;
    padding: 0 10px;
}

/* RECENT - USERS */
.widget-users {
    list-style: none;
    margin: 0;
    padding: 0;
}

.widget-users li {
    border-bottom: 1px solid #ebebeb;
    padding: 15px 0;
    height: 96px;
}

.widget-users li>.img {
    float: left;
    margin-top: 8px;
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50%;
}

.widget-users li>.details {
    margin-left: 60px;
}

.widget-users li>.details>.name {
    font-weight: 600;
}

.widget-users li>.details>.name>a {
    color: #344644;
}

.widget-users li>.details>.name>a:hover {
    color: #2bb6a3;
}

.widget-users li>.details>.time {
    color: #2bb6a3;
    font-size: 0.75em;
    padding-bottom: 7px;
}

.widget-users li>.details>.time.online {
    color: #8dc859;
}


/* CONVERSATION */
.conversation-inner {
    padding: 0 0 5px 0;
    margin-right: 10px;
}

.conversation-item {
    padding: 5px 0;
    position: relative;
}

.conversation-user {
    width: 50px;
    height: 50px;
    overflow: hidden;
    float: left;
    border-radius: 50%;
    margin-top: 6px;
}

.conversation-body {
    background: #f5f5f5;
    font-size: 0.875em;
    width: auto;
    margin-left: 60px;
    padding: 8px 10px;
    position: relative;
}

.conversation-body:before {
    border-color: transparent #f5f5f5 transparent transparent;
    border-style: solid;
    border-width: 6px;
    content: "";
    cursor: pointer;
    left: -12px;
    position: absolute;
    top: 25px;
}

.conversation-item.item-right .conversation-body {
    background: #dcfffa;
}

.conversation-item.item-right .conversation-body:before {
    border-color: transparent transparent transparent #dcfffa;
    left: auto;
    right: -12px;
}

.conversation-item.item-right .conversation-user {
    float: right;
}

.conversation-item.item-right .conversation-body {
    margin-left: 0;
    margin-right: 60px;
}

.conversation-body>.name {
    font-weight: 600;
    font-size: 1.125em;
}

.conversation-body>.time {
    position: absolute;
    font-size: 0.875em;
    right: 10px;
    top: 0;
    margin-top: 10px;
    color: #605f5f;
    font-weight: 300;
}

.conversation-body>.time:before {
    content: "\f017";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    margin-top: 4px;
    font-size: 0.875em;
}

.conversation-body>.text {
    padding-top: 6px;
}

.conversation-new-message {
    padding-top: 10px;
}

textarea.form-control {
    height: auto;
}

.form-control {
    border-radius: 0px;
    border-color: #e1e1e1;
    box-shadow: none;
    -webkit-box-shadow: none;
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
                        <h2>Info Registrasi</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="container bootstrap snippets bootdeys">
                                        <div class="row" id="user-profile">
                                            <div class="col-lg-3 col-md-4 col-sm-4">
                                                <div class="main-box clearfix">
                                                    <h2>{{$data_pendaftar->nama}}</h2>
                                                    <img src="{{$data_pendaftar->file_foto}} " alt="Foto Belum di Isi"
                                                        class="profile-img img-responsive center-block"
                                                        style="height: 300px;">

                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-3 col-sm-3">
                                                <div class="main-box clearfix">
                                                    <div class="profile-header">
                                                        <h3><span>Informasi Pendaftar</span></h3>
                                                    </div>

                                                    <div class="row profile-user-info">
                                                        <div class="col-sm-8">
                                                            <div class="profile-user-details clearfix">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">ID PMB
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly
                                                                            class="form-control-plaintext"
                                                                            value="{{$data_pendaftar->id_pmb}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="profile-user-details clearfix">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Tanggal
                                                                        Daftar
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly
                                                                            class="form-control-plaintext"
                                                                            value="{{$data_pendaftar->created_at}}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="profile-user-details clearfix">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">NIK
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly
                                                                            class="form-control-plaintext"
                                                                            value="{{$data_pendaftar->nik}}">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="profile-user-details clearfix">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Fakultas
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly
                                                                            class="form-control-plaintext"
                                                                            value="{{$data_pendaftar->nama_fakultas}}">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="profile-user-details clearfix">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Prodi
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly
                                                                            class="form-control-plaintext"
                                                                            value="{{$data_pendaftar->nama_prodi}}">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="profile-user-details clearfix">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Jenjang Prodi
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly
                                                                            class="form-control-plaintext"
                                                                            value="{{$data_pendaftar->jenis_strata}}">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="profile-user-details clearfix">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Jalur Masuk
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly
                                                                            class="form-control-plaintext"
                                                                            value="{{$data_pendaftar->jenis_pendaftar}}">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-3 col-sm-3">
                                                <div class="tabs-wrapper profile-tabs">
                                                    <ul class="nav nav-tabs">
                                                        <li><a href="#tab-chat" data-toggle="tab">Data Diri</a></li>
                                                        <li class="active"><a href="#tab-activity"
                                                                data-toggle="tab">Data Orang Tua (Ayah)</a></li>
                                                        <li><a href="#tab-friends" data-toggle="tab">Data Orang Tua
                                                                (Ibu)</a>
                                                        </li>

                                                    </ul>

                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="tab-activity">


                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">NIK Ayah
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->nik_ayah}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama Ayah
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->nama_ayah}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Tanggal Lahir
                                                                    Ayah
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->tgl_lahir_ayah}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Pendidikan
                                                                    Ayah
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->pendidikan_ayah}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Pekerjaan Ayah
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->pekerjaan_ayah}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Penghasilan
                                                                    Ayah
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->penghasilan_ayah}}">
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="tab-pane fade" id="tab-friends">

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">NIK Ibu
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->nik_ibu}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama Ibu
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->nama_ibu}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Tanggal Lahir Ibu
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->tgl_lahir_ibu}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Pendidikan Ibu
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->pendidikan_ibu}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Pekerjaan Ibu
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->pekerjaan_ibu}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Penghasilan Ibu
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->penghasilan_ibu}}">
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="tab-pane fade" id="tab-chat">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Tempat Lahir
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->tempat_lahir}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Tanggal Lahir
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->tgl_lahir}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Jenis Kelamin
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->jenis_kelamin}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Agama
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->agama}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Alamat
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->alamat}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Kelurahan
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->kelurahan}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Kecamatan
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->kecamatan}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Kode Pos
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->kode_pos}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Kota/Kabupaten
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->kota_kab}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Provinsi
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->provinsi}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">No Telehone
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" readonly
                                                                        class="form-control-plaintext"
                                                                        value="{{$data_pendaftar->no_telephone}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row kelengkapan-document">
                                            <div class="col-md">
                                                <img id="myImg" src="{{$data_pendaftar->file_foto}}" alt="File Foto"
                                                style="width:100%;max-width:300px">
                                            </div>
                                            <div class="col-md">
                                                <img id="myImg" src="{{$data_pendaftar->file_ktp}}" alt="file Ktp"
                                                style="width:100%;max-width:300px">
                                            </div>
                                            <div class="col-md">
                                                <img id="myImg2" src="{{$data_pendaftar->file_kk}}" alt="File Kartu Keluarga"
                                                style="width:100%;max-width:300px">
                                            </div>
                                            <div class="col-md">
                                                <img id="myImg3" src="{{$data_pendaftar->file_ijazah}}" alt="File Ijazah"
                                                style="width:100%;max-width:300px">
                                            </div>
                                            <div class="col-md">
                                                <img id="myImg4" src="{{$data_pendaftar->file_akta}}" alt="File Akta Kelahiran"
                                                style="width:100%;max-width:300px">
                                            </div>
                                            <div class="col-md">
                                                <img id="myImg5" src="{{$data_pendaftar->file_ket_sehat}}" alt="File Ket Sehat"
                                                style="width:100%;max-width:300px">
                                            </div>

                                            <!-- The Modal -->
                                            <div id="myModal" class="modal">

                                                <!-- The Close Button -->
                                                <span class="close">&times;</span>

                                                <!-- Modal Content (The Image) -->
                                                <img class="modal-content" id="img01">

                                                <!-- Modal Caption (Image Text) -->
                                                <div id="caption"></div>
                                            </div>
                                            <div id="myModal" class="modal">

                                                <!-- The Close Button -->
                                                <span class="close">&times;</span>

                                                <!-- Modal Content (The Image) -->
                                                <img class="modal-content" id="img02">

                                                <!-- Modal Caption (Image Text) -->
                                                <div id="caption"></div>
                                            </div>
                                            <div id="myModal" class="modal">

                                                <!-- The Close Button -->
                                                <span class="close">&times;</span>

                                                <!-- Modal Content (The Image) -->
                                                <img class="modal-content" id="img03">

                                                <!-- Modal Caption (Image Text) -->
                                                <div id="caption"></div>
                                            </div>
                                            <div id="myModal" class="modal">

                                                <!-- The Close Button -->
                                                <span class="close">&times;</span>

                                                <!-- Modal Content (The Image) -->
                                                <img class="modal-content" id="img04">

                                                <!-- Modal Caption (Image Text) -->
                                                <div id="caption"></div>
                                            </div>
                                            <div id="myModal" class="modal">

                                                <!-- The Close Button -->
                                                <span class="close">&times;</span>

                                                <!-- Modal Content (The Image) -->
                                                <img class="modal-content" id="img05">

                                                <!-- Modal Caption (Image Text) -->
                                                <div id="caption"></div>
                                            </div>
                                            <div id="myModal" class="modal">

                                                <!-- The Close Button -->
                                                <span class="close">&times;</span>

                                                <!-- Modal Content (The Image) -->
                                                <img class="modal-content" id="img06">

                                                <!-- Modal Caption (Image Text) -->
                                                <div id="caption"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
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
img.onclick = function() {
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