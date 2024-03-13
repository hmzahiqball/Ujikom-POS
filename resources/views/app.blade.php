<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Madimi+One&display=swap');
        .text-abu{
            color: #CCCCCC;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Point Of Sale Putra</title>
    <!-- site icon -->
    <link rel="icon" href="{{ URL::asset('images/logo/favicon.png') }}" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <!-- dataTables css -->
    <link rel="stylesheet" href="{{ URL::asset('css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/buttons.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/dataTables.min.css') }}" />
    <!-- sweetalert2 css -->
    <link rel="stylesheet" href="{{ URL::asset('css/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/sweetalert2.min.css') }}" />
    <!-- fontawesome css -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
    <!-- bootstrap JS -->
    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/mdb.umb.min.js') }}"></script>
    <!-- dataTables JS -->
    <script src="{{ URL::asset('js/datatables.min.js') }}"></script>
    <!-- fontawesome JS -->
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <!-- sweetalert2 JS -->
    <script src="{{ URL::asset('js/sweetalert2.min.js') }}"></script>
    <!-- zingchart JS -->
    <script src="{{ URL::asset('js/zingchart.min.js') }}"></script>
</head>
@yield('styles')
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <!-- Navbar -->
            @include('layouts.navbar')
            <div class="col py-3">
                <!-- Main Content -->
                @yield('content')
            </div>
        </div>
    </div>
</body>
@yield('scripts')
</html>
