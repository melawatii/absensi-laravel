@extends('layout.master')

@section('content')
    <div class="text" align="center">
        <h1 class="mt-5">DASHBOARD ABSENSI SISWA</h1>
        <h2 class="mb-4">SMK WIKRAMA BOGOR</h2>

        <hr>
        <h1 class="mt-4">
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
