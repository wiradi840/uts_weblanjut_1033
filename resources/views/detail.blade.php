@extends('layout/main')

@section('title')
    Daftar Anggota Kegiatan   
@endsection

@section('body')
    
<div class="container">
   <div class="container border rounded mt-2">
         <div class="my-4">
            <h2><strong>{{$var_kegiatan[0]->nama}}</strong></h2>
            <hr class="my-4">
            <table class="table table-striped table-bordered" id="laravel_datatable" style="width:100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>NIM</th>
                     <th>Nama</th>
                     <th>Program Studi</th>
                  </tr>
               </thead>
                  <tbody>
                        @foreach ($var_anggota as $agt)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$agt->nim}}</td>
                                <td>{{$agt->nama}}</td>
                                <td>{{$agt->prodi}}</td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
                  
         </div>
         
      </div>
      <div>
         <a class="btn btn-success btn-md mb-4 mt-3" href="/kegiatan" role="button">Kembali</a>
      </div>
   </div>
  

@endsection