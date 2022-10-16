
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-center my-3">Edit Konten</h2>
                </div>
            </div>
        </div>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Opss!</strong> Sepertinya input yang anda masukan salah.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('movies.update',$movie->id) }}" method="POST">
            @csrf
            @method('PUT')
    
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Judul:</strong>
                        <input type="text" name="title" value="{{ $movie->title }}" class="form-control" placeholder="Judul">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $movie->description }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center my-3">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection 