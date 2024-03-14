@extends('app')
@section('styles')
<style>
    body {
        font-family: 'Madimi One', cursive;
    }
    .icon-container {
    width: 50px; /* Lebar dan tinggi div */
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%; /* Membuat bentuk lingkaran */
  }

  .icon {
    color: #cecece; /* Warna ikon */
  }
</style>
@endsection
@section('content')
<div class="container">
    <h3>Dashboard</h3>
    <div class="row">
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Tanggal</h5>
                  <span class="h2 font-weight-bold mb-0">Hari Ini</span>
                </div>
                <div class="col-auto">
                    <div class="icon-container bg-dark">
                      <i class="icon fa fa-calendar"></i>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                  <span class="text-nowrap">28/05/2024</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Penjualan</h5>
                    <span class="h2 font-weight-bold mb-0">Hari ini</span>
                  </div>
                  <div class="col-auto">
                      <div class="icon-container bg-dark">
                        <i class="icon fa fa-arrow-up"></i>
                      </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                  <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 24</span>
                  <span class="text-nowrap">Penjualan</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Pendapatan</h5>
                    <span class="h2 font-weight-bold mb-0">Hari Ini</span>
                  </div>
                  <div class="col-auto">
                      <div class="icon-container bg-dark">
                        <i class="icon fa fa-dollar"></i>
                      </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                  <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> Rp.</span>
                  <span class="text-success mr-2"></i>999.999.000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total</h5>
                    <span class="h2 font-weight-bold mb-0">Produk</span>
                  </div>
                  <div class="col-auto">
                      <div class="icon-container bg-dark">
                        <i class="icon fa fa-shirt"></i>
                      </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                  <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 23</span>
                  <span class="text-nowrap">Produk</span>
                </p>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
</script>

@endsection

