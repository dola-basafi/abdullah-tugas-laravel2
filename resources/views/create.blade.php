@extends('template')
@section('title','Add Postingan')  

@section('content')
<form action="{{route('posts.index')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Judul</label>
    <input type="text" class="form-control" id="name" name="title">

    <label for="description" class="form-label">Deskripsi</label>
    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>    

    <label for="file" class="form-label">Gambar</label>
    <input type="file" class="form-control" id="file" name="file" accept="image/*">

  </div>
  
  <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection