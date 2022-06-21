@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center mt-5 mb-5">
            <div class="card-header">
                ABSENSI SISWA  &nbsp; | &nbsp; KETIDAKHADIRAN
            </div>
            <div class="card-body">
                <label for="" class="mt-3">Keterangan :</label>
                <select class="form-control" aria-label="Default select example">
                    <option selected> - Input Keterangan - </option>
                    <option value="1">Izin</option>
                    <option value="2">Sakit</option>
                </select>
                <div class="mt-5">
                    <label for="">Bukti :</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mt-5">
                    <label for="">Catatan :</label>
                    <textarea class="form-control" name="catatan" id="" cols="50" rows="5"></textarea>
                </div>
                <a href="#" class="btn btn-primary mt-5">KIRIM</a>
            </div>
        </div>
    </div>
@endsection