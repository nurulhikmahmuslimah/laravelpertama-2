@extends('layouts.app')

@section('title','Friends')

@section('content')
<form action="/friends/{{$friend['id']}}" method="POST" >
@csrf
@method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" 
    value="{{old('nama') ? old('nama') : $friend[nama] }}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">No.Tlp</label>
    <input type="text" class="form-control" name="notlp" id="exampleInputPassword1" 
    value="{{old('notlp') ? old('notlp') : $friend[notlp]}}">
    @error('notlp')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" 
    value="{{old('alamat') ? old('alamat') : $friend[alamat]}}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection