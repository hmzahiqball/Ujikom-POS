<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{ URL::asset('images/logo/favicon.png') }}" alt="Logo_Kasir" height="50" width="70">
            <span class="fs-3 d-none d-sm-inline text-abu">PKK SALE</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ URL('/kasir/dashboard') }}" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-speedometer2 text-abu"></i> <span class="ms-1 d-none d-sm-inline text-abu">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ URL('/kasir/transaksi') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-cart text-abu"></i> <span class="ms-1 d-none d-sm-inline text-abu">Transaksi</span></a>
            </li>
            <li>
                <a href="#" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-person text-abu"></i> <span class="ms-1 d-none d-sm-inline text-abu">Tambah Member</span></a>
            </li>
            <li>
                <a href="#submenutabel" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                    <i class="fs-4 bi-table text-abu"></i> <span class="ms-1 d-none d-sm-inline text-abu">Tabel Data</span></a>
                <ul class="collapse nav flex-column ms-1" id="submenutabel" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{ URL('/kasir/dataproduk') }}" class="nav-link px-0 text-abu"><i class="fs-4 bi-table text-abu"></i> <span class="ms-1 d-none d-sm-inline text-abu">Data Produk</span></a>
                    </li>
                    <li>
                        <a href="{{ URL('/kasir/riwayattransaksi') }}" class="nav-link px-0 text-abu"><i class="fs-4 bi-table text-abu"></i> <span class="ms-1 d-none d-sm-inline text-abu">Riwayat Transaksi</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <hr class="dropdown-divider">
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">loser</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="{{ URL('/kasir/dashboard') }}">Dashboard</a></li>
                <li><a class="dropdown-item" href="{{ URL('/kasir/transaksi') }}">Transaksi</a></li>
                <li><a class="dropdown-item" href="#">Tambah Member</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
</div>

