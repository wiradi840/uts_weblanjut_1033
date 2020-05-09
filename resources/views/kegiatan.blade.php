@extends('layout/main')

@section('title')
    Daftar Kegiatan   
@endsection

@section('body')
    
<div class="container">
   <a href="/form" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i>Tambah Kegiatan</a>
   <div class="container border rounded mt-2">
         <div class="my-4">
            @if(Session::has('success'))
               <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="close">×</button>
                     <i class="fa fa-check-circle"></i> <strong>Berhasil !</strong> <br>
                     {{ Session::get('success') }}
               </div>
            @endif
            <table class="table table-striped table-bordered" id="laravel_datatable" style="width:100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Nama Kegiatan</th>
                     <th>Tanggal</th>
                     <th>Kuota</th>
                     <th>Status</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
                  <tbody>
                     @foreach ($kegiatan as $kgt)
                        <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$kgt->nama}}</td>
                           <td>{{$kgt->tanggal}}</td>
                           <td>{{$kgt->sisa}} dari {{$kgt->kuota}}</td>
                           <td>{{$kgt->status}}</td>
                           <td>
                              <a href="/status/{{$kgt->id}}" class="btn btn-primary"><i class="fas fa-edit"></i>Ubah Status</a>
                              <a href="/detail/{{$kgt->id}}" class="btn btn-warning"><i class="fas fa-file-alt"></i>Detail</a>
                              <a href="/hapus/{{$kgt->id}}" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                           </td>
                        </tr>
                     @endforeach   
                  </tbody>
            </table>
         </div>
      </div>
   </div>

@endsection