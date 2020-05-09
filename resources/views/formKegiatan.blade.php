@extends('layout/main')

@section('title')
    Form Kegiatan
@endsection

@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="jumbotron">
                <h1 class="display-4">Tambah Kegiatan</h1>
                <hr>
                <form action="{{url('/tambahKegiatan')}}" method="POST" class="needs-validation" novalidate>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nama">Nama Kegiatan:</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan nama..." name="nama" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon mengisi nama kegiatan.</div>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Tanggal Kegiatan:</label>
                        <input type="text" class="form-control" id="datepicker" width="850" placeholder="dd/mm/yyyy" name="tanggal" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon untuk memilih tanggal kegiatan.</div>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Jumlah Pendaftar:</label>
                        <input type="number" class="form-control" id="kuota" placeholder="Masukan nilai..." name="kuota" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon untuk mengisi jumlah pendaftar.</div>
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