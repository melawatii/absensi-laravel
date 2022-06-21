@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rayon</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rayons.create') }}"> Create</a>
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-white border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mb-4">
        <tr>
            <th>No</th>
            <th>Nama Rayon</th>
            <th>Pembimbing Rayon</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rayons as $rayon)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rayon->rayon }}</td>
            <td>{{ $rayon->pemb_rayon }}</td>
            <td>
                <form action="{{ route('rayons.destroy',$rayon->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('rayons.edit',$rayon->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin?')" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $rayons->links() !!}
@endsection