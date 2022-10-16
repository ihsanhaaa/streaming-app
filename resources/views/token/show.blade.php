
@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-center my-3">Detail Konten</h2>
                </div>
            </div>
        </div>
    
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul:</strong>
                    {{ $movie->title }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deksripsi:</strong>
                    {{ $movie->description }}
                </div>
            </div>
        </div>
        <div class="pull-right my-3">
            <a class="btn btn-primary" href="{{ route('movies.index') }}">Kembali</a>
        </div>
    </div>
@endsection
