@extends('layout.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik</h2>

            <form action="/komik/save" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" autofocus value="{{ old('judul') }}">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $errors->first('judul') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ old('penulis') }}">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $errors->first('penulis') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $errors->first('penerbit') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">

                            <input type="file" class="custom-file-input @error('sampul') is-invalid @enderror" id="sampul" name="sampul" onchange="previewImage()">

                            <label class="custom-file-label" for="sampul">Pilih gambar..</label>

                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $errors->first('sampul') }}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection