
@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center my-3">Manajemen Konten</h2>
            </div>
            <div class="pull-right my-3">
                @can('movie-create')
                <a class="btn btn-success" href="{{ route('movies.create') }}">Buat Konten Baru</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @php $i = 0 @endphp
	    @foreach ($movies as $movie)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $movie->title }}</td>
	        <td>{{ $movie->description }}</td>
	        <td>
                <a class="btn btn-info" href="{{ route('movies.show',$movie->id) }}">Show</a>
                @can('movie-edit')
                    <a class="btn btn-primary" href="{{ route('movies.edit',$movie->id) }}">Edit</a>
                @endcan
                <form action="{{ route('movies.destroy',$movie->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    @can('movie-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
            
	    </tr>
	    @endforeach
    </table>
</div>

@endsection 