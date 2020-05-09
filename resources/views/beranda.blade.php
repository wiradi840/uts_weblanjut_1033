@extends('layout/main')

@section('title', 'Beranda')

@section('body')
<!--jumbotron-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="jumbotron">
                <h1 class="display-2"><b>Hello, {{ Auth::user()->name }}!<b></h1>
                <p class="lead">Selamat Datang di Website Sistem Pendaftaran Panitia Kegiatan</p>
                <hr class="my-4">
                <p>Ujian Tengah Semester | Mata Kuliah Pemrograman Web Lanjut</p>
                <a class="btn btn-primary btn-lg" href="/kegiatan" role="button">Data Kegiatan</a>
            </div>
        </div>
    </div>
</div>
    
@endsection