@extends('layout/main')

@section('title')
    Daftar Anggota Kegiatan   
@endsection

@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="jumbotron">
                <h1 class="display-4">Daftar Anggota Kegiatan</h1>
                <hr>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">×</button>
                            <i class="fa fa-check-circle"></i> <strong>Berhasil !</strong> <br>
                            {{ Session::get('success') }}
                    </div>
                @endif
                @if(Session::has('failed'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">×</button>
                            <i class="fas fa-exclamation-triangle"></i> <strong>Gagal !</strong> <br>
                            {{ Session::get('failed') }}
                    </div>
                @endif
                <form action="{{url('/prosesDaftar')}}" method="POST" class="needs-validation" novalidate>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nama">NIM Mahasiswa:</label>
                        <input type="text" class="form-control" id="nim" placeholder="Masukan NIM..." name="nim" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon mengisi NIM.</div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa:</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan nama..." name="nama" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon mengisi nama.</div>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Program Studi:</label>
                        <select class="custom-select" name="prodi" id="prodi" required>
                          <option value="">Pilih prodi...</option>
                          <option value="Pendidikan Teknik Informatika">Pendidikan Teknik Informatika</option>
                          <option value="Sistem Informasi">Sistem Informasi</option>
                          <option value="Manajemen Informasi">Manajemen Informasi</option>
                          <option value="Ilmu Komputer">Ilmu Komputer</option>
                        </select>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback"> Mohon untuk memilih salah satu.</div>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">Kegiatan:</label>
                        <select class="custom-select" name="kegiatan" id="kegiatan" required>
                            <option value="">Pilih kegiatan...</option>
                            @foreach ($var_kegiatan as $data)
                                @if ($data->status == "tutup")
                                    <option value="{{$data->id}}" disabled>{{$data->nama}}</option>
                                @else
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback"> Mohon untuk memilih salah satu.</div>
                    </div>

                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                      'use strict';
                      window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                          form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                          }, false);
                        });
                      }, false);
                    })();
                </script>

            </div>
        </div>
    </div>
</div>

@endsection