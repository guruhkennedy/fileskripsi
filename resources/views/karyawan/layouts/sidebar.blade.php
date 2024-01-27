<div class="col-md-3 ps-0 pe-0 bg-ungu2 sidebar-new">
    <div class="d-flex flex-column flex-shrink-0 p-4 bg-ungu2 text-white">
        <div class="d-flex flex-column align-items-start mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
            <span class="fs-5 fw-bold">{{ auth()->user()->name }}</span>
            <span>({{ auth()->user()->email }})</span>
        </div>
        <hr />
        @php
            $route_name = \Route::currentRouteName();
        @endphp
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ url('karyawan/home') }}"
                    class="btn btn-toggle align-items-center rounded {{ $route_name == 'karyawan.home' ? 'active' : '' }}">
                    <i class="fa fa-tachometer me-2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('karyawan/reservasi') }}"
                    class="btn btn-toggle align-items-center rounded {{ $route_name == 'karyawan.reservasi.index' ? 'active' : '' }}">
                    <i class="fa fa-calendar me-2"></i>
                    Reservasi
                </a>
            </li>
            <li>
                <a href="{{ url('karyawan/pembatalan') }}"
                    class="btn btn-toggle align-items-center rounded {{ $route_name == 'karyawan.pembatalan.index' ? 'active' : '' }}">
                    <i class="fa fa-calendar-times-o me-2"></i>
                    Pembatalan
                </a>
            </li>
        </ul>
    </div>
</div>
