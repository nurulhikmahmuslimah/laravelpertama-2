@extends('layouts.app')

@section('title','Friends')

@section('content')

@foreach ($friends as $friend)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a hreff="/friends/({$friend['id'})" class="card-title">{{ $friend['nama']}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $friend['notlp']}}</h6>
    <p class="card-text">{{ $friend['alamat']}}</p>

    <a href="/friends/{{$friend['id']}}/edit" class="card-link btn-warning">Edit Teman</a>
    <form action="/friends/{{$friend[id]}}" method="POST">
    @csrf
    @method('DELETE')
      <button class="card-link btn-danger">Delete Teman</button>
  </div>
</div>
@endforeach
    {{ $friends->links()}}
@endsection