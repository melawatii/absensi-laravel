@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center mt-5">
            <div class="card-header">
                ABSENSI SISWA || SMK WIKRAMA BOGOR
            </div>
            <div class="card-body">
                @if (!is_null($absen))
                    @if (is_null($absen->jam_kepulangan))
                    <form method="POST" action="/balik/{{ Auth::id() }}">
                        @csrf
                        <button class="btn-lg btn-primary mb-4">PULANG</button>
                    </form>
                    @else
                    Hadir {{ $absen->jam_kedatangan }} &nbsp;
                    Pulang {{ $absen->jam_kepulangan }}
                    @endif
                @else
                    <form method="POST" action="/in">
                        @csrf
                        <button class="btn-lg btn-success mt-3 mb-3">HADIR</button>
                    </form>
                    <br>
                    <!-- <div class="mb-5">
                        <a href="/absen" class="btn-lg btn-danger">IZIN &nbsp; | &nbsp; SAKIT</a>
                    </div> -->
                @endif
            </div>
        </div>
        <h1 class="mt-5" align="center">
            <?php
                date_default_timezone_set('Asia/Jakarta');
                echo date('d-m-Y');
                echo ' &nbsp;&nbsp; <i id="h"></i> : <i id="m"></i> : <i id="s"></i>';
            ?>
        </h1>
    </div>

    <script>
        window.setTimeout("waktu()", 1000);
        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("h").innerHTML = waktu.getHours();
            document.getElementById("m").innerHTML = waktu.getMinutes();
            document.getElementById("s").innerHTML = waktu.getSeconds();
        }
    </script>
@endsection
