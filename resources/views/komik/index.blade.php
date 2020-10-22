@extends('layout.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/komik/create" class="btn btn-primary mt-3">Tambah Data Komik</a>
            <h1 class="mt-2">Daftar Komik</h1>
            @if(session()->get('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('pesan') }}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach($komik as $k)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td><img src="/img/{{ $k['sampul'] }}" alt="" class="sampul"></td>
                        <td>{{ $k['judul'] }}</td>
                        <td><a href="/komik/{{ $k['slug'] }}" class="btn btn-success">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection