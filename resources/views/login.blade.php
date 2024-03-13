<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Point Of Sale Putra</title>
        <!-- site icon -->
        <link rel="icon" href="{{ URL::asset('images/logo/favicon.png') }}" type="image/png" />
        <!-- bootstrap css -->
        <link rel="stylesheet" href="{{ URL::asset('css/mdb.min.css') }}" />
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
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <section class="vh-100 bg-dark mb-0">
                <div class="container py-5 p-0 h-100">
                  <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="{{ asset('images/logo/logo.png') }}" class="img-fluid" alt="Deskripsi Gambar">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                      <form>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <input type="email" id="form1Example13" class="form-control form-control-lg" />
                          <label class="form-label" for="form1Example13">Email address</label>
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                          <input type="password" id="form1Example23" class="form-control form-control-lg" />
                          <label class="form-label" for="form1Example23">Password</label>
                        </div>
                        <!-- Submit button -->
                        <a href="{{ URL('/dashboard') }}" class="btn btn-primary btn-lg btn-block">Sign in
                        </a>
                      </form>
                    </div>
                  </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
