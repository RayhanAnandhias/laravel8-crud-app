@extends('layout.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact Us</h1>
            @foreach($alamat as $a)
            <li>{{ $a['tipe'] }}</li>
            <li>{{ $a['alamat'] }}</li>
            <li>{{ $a['kota'] }}</li>
            @endforeach
        </div>
    </div>
</div>
@endsection