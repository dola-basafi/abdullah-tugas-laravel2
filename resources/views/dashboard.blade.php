@extends('template')
@section('title', 'Dashboard')

@section('content')

<a class="btn btn-primary" href="{{route('posts.create')}}" role="button">Tambah</a>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($posts as $item)
            <div class="col">
                <div class="card">
                    <img src="{{$item->file}}" class="card-img-top" alt="..." height="200">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        <form action="/posts/{{$item->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="/posts/{{$item->id}}/edit" role="button">Edit</a>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
