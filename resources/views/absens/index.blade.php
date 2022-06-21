@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Absen</h2>
            </div>
            <div class="pull-right">
                <form action="/absens" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" id="mySearch" class="form-control bg-white border-0 small" name="search" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
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
            <th>NIS</th>
            <th>Jam Kedatangan</th>
            <th>Jam Kepulangan</th>
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($absens as $absen)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $absen->user->nis }}</td>
            <td>{{ $absen->jam_kedatangan }}</td>
            <td>{{ $absen->jam_kepulangan }}</td>
            <td>{{ $absen->keterangan }}</td>
            <td>
                <form action="{{ route('absens.destroy',$absen->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin?')" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $absens->links() !!}
@endsection
