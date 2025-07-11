<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Mahasiswa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/mahasiswa') }}">
            {{ $auth->nama }} - {{ $auth->prodi }}
        </a>
        <a href="{{ url('/logout') }}" class="btn btn-danger">
            Logout
        </a>
    </nav>

    <div class="container mt-lg-4">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <hr>

        <div class="container">
            <div class="card-body">
                @if ($auth->bayar == '1')
                <h4 class="text-center">
                    Kamu Sudah Membayar Pendaftaran
                </h4>
                @elseif ($auth->status == 'validasi')
                <h4 class="text-center">
                    Pembayaran Uang Kuliah
                    <br>
                    Rp. 5.000.000,-
                </h4>
                <br>
                <a href="{{ url('/mahasiswa/bayar', $auth->id) }}" class="btn btn-block btn-danger" onclick="return confirm('apakah kamu sudah melakukan pembayaran ?')">
                    Bayar
                </a>
                @elseif ($auth->status == 'selesai')
                <h4 class="text-center">
                    Kamu Sudah Selesai Pendaftaran
                </h4>
                @elseif ($auth->status == 'tolak')
                <h4 class="text-center">
                    Kamu Di Tolak Pendaftaran
                </h4>
                @else
                <h4 class="text-center">
                    Menunggu Validasi Admin
                </h4>
                @endif
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>