<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @font-face {
            font-family: 'Outfit';
            src: url('/fonts/Outfit-Regular.ttf') format('truetype');
            /* Ganti Nama-Font-Regular.ttf dengan nama file font yang sesuai */
            font-weight: normal;
            font-style: normal;
        }

        @import '~bootstrap-icons/font/bootstrap-icons.css';

        .text-abu {
            color: #CCCCCC;
        }

        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Point Of Sale Putra</title>
    <!-- site icon -->
    <link rel="icon" href="{{ asset('images/logo/favicon.png') }}" type="image/png" />


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ZingChart JS -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
</head>
@yield('styles')

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <!-- Navbar -->
            <!-- Navbar -->
            @if (Session::has('tb_petugas') && Session::get('tb_petugas')['role_user'] == 'admin')
                @include('layouts.adminsidebar')
            @elseif(Session::has('tb_petugas') && Session::get('tb_petugas')['role_user'] == 'kasir')
                @include('layouts.sidebar')
            @endif
            <div class="col py-3">
                <!-- Main Content -->
                @yield('content')
            </div>
        </div>
    </div>
</body>
@yield('scripts')
</html>
