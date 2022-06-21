@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create</a>

                <form action="/students" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" id="mySearch" class="form-control bg-white border-0 small" name="search"  placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append" >
                            <button class="btn btn-primary" type="submit" >
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
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->rombel->rombel }}</td>
            <td>{{ $student->rayon->rayon }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin?')" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $students->links() !!}
@endsection
