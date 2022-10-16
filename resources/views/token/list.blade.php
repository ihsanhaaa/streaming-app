
@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center my-3">Manajemen Token</h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

</div>

@endsection 