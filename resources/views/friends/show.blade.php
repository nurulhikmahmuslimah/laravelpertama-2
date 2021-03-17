@extends('layouts.app')

@section('title','cobaaaaaaa')

@section('content')
<div class="card">
    <div class="card body">
        <h3>Nama Teman : {{$friends['nama']}}</h3>
        <h3>No telpon : {{$friends['notlp']}}</h3>
        <h3>Alamat : {{$friends['alamat']}}</h3>
    </div>
</div>
@endsection