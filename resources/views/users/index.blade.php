
@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-center my-3">Manajemen Users</h2>
        </div>
        <div class="pull-right my-3">
          @can('user-create')
          <a class="btn btn-success" href="{{ route('users.create') }}"> Buat User Baru</a>
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
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @php $i = 0 @endphp
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
      <a class="badge bg-info text-dark" href="{{ route('users.show', $user->id) }}">Show</a>
                            @can('user-edit')
                                <a class="badge bg-primary text-dark" href="{{ route('users.edit', $user->id) }}">Edit</a>
                            @endcan
                            @can('user-delete')
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="badge bg-danger" style="border: none;">Delete</button>
                                </form>
                            @endcan
    </td>
  </tr>
 @endforeach
</table>
</div>
@endsection 