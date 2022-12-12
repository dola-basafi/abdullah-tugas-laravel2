@extends('template')
@section('title', 'Edit')

@section('content')
    <form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="name" name="title" value="{{$post->title}}">
    
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="description" id="" cols="30" rows="10"> {{$post->description}} </textarea>    
    
        <label for="file" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="file" name="file" accept="image/*"  ">
    
      </div>
      
      <button type="submit" class="btn btn-primary">Edit</button>


    </form>
@endsection