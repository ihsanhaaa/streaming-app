
@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center my-3">Manajemen movie</h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @php $i = 0 @endphp
	@foreach ($movies as $movie)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $movie->title }}</h5>
              <p class="card-text">{{ $movie->description }}</p>
              <a href="{{ route('token.buat', $movie->slug) }}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    @endforeach

</div>

@endsection 