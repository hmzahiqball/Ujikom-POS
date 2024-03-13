<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <button class="btn btn-sm btn-outline-light d-inline-block d-sm-none mt-2" id="sidebarToggle">
            <i class="bi bi-arrow-bar-left"></i>
        </button>
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{ URL::asset('images/logo/favicon.png') }}" alt="Logo_Kasir" height="50" width="70">
            <span class="fs-3 d-none d-sm-inline text-abu">PKK SALE</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="#" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-speedometer2 text-abu"></i> <span class="ms-1 d-none d-sm-inline text-abu">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-table text-abu"></i> <span class="ms-1 d-none d-sm-inline text-abu">Orders</span></a>
            </li>
            <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                    <i class="fs-4 bi-bootstrap text-abu"></i> <span class="ms-1 d-none d-sm-inline text-abu">Bootstrap</span></a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link px-0 text-abu"> <span class="d-none d-sm-inline text-abu">Item</span> 1</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 text-abu"> <span class="d-none d-sm-inline text-abu">Item</span> 2</a>
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
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
</div>

