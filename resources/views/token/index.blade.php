
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

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Request</th>
            <th>Status</th>
            <th>Link</th>
        </tr>
        @php $i = 0 @endphp
	    @foreach ($tokens as $token)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td> judul </td>
            <td>
                test    
            </td>
            <td>
                @can('token-request')
                @if (!$token->is_progress)
                    <form action="{{ route('token.update', $token->id) }}"
                        method="post"
                        onclick="return confirm('Apakah anda yakin ingin melakukan request?')">
                        @csrf
                        <button class="btn btn-success"><i
                                class="fas fa-check-circle"></i>&nbsp;Request</button>
                    </form>
                @endif
                @endcan
            </td>
	        <td>@if ($token->is_progress == 0)
                <p>Lagi proses</p>
            @elseif ($token->is_progress == 1)
                <p>Berhasil</p>
            @endif
            </td>  
            <td>
                @can('token-confirm')
                @if (!$token->is_progress)
                    <form action="{{ route('token.confirm', $token->id) }}"
                        method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="links" placeholder="links">
                        </div>
                        <button class="btn btn-success">Konfirmasi</button>
                    </form>
                @endif
                @endcan
                
            </td>
	    </tr>
	    @endforeach
    </table>

</div>

@endsection 