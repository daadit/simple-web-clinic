<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar">
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="sidebar-item {{ request()->segment(1) == '' ? 'selected' : '' }}">
                    <a class="sidebar-link {{ request()->segment(1) == '' ? 'active' : '' }}" href="{{ route('home') }}"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-home-2"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <!-- ============================= -->
                <!-- Apps -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Master Data</span>
                </li>
                <li
                    class="sidebar-item {{ request()->segment(1) == 'barang' || request()->segment(1) == 'pasien' ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span>
                            <i class="ti ti-archive"></i>
                        </span>
                        <span class="hide-menu">Master Data</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('barang') }}"
                                class="sidebar-link {{ request()->segment(1) == 'barang' ? 'active' : '' }}">
                                <i class="ti ti-list-details"></i>
                                <span class="hide-menu">Barang</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('pasien') }}"
                                class="sidebar-link {{ request()->segment(1) == 'pasien' ? 'active' : '' }}">
                                <i class="ti ti-users"></i>
                                <span class="hide-menu">Pasien</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- =================== -->
                <!-- Transaction -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('transaksi') }}" aria-expanded="false">
                        <span class="rounded-3">
                            <i class="ti ti-archive"></i>
                        </span>
                        <span class="hide-menu">Transaksi</span>
                    </a>
                </li>
            </ul>
            <div class="unlimited-access hide-menu bg-light-primary position-relative my-7 rounded d-block d-lg-none">
                <div class="d-flex">
                    <div class="unlimited-access-title">
                        <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Unlimited Access</h6>
                        <button class="btn btn-primary fs-2 fw-semibold lh-sm">Signup</button>
                    </div>
                    <div class="unlimited-access-img">
                        <img src="{{ asset('assets') }}/images/backgrounds/rocket.png" alt=""
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3 mx-9 d-block d-lg-none">
        <div class="hstack gap-3 justify-content-between">
            <div class="john-img">
                <img src="{{ asset('assets') }}/images/profile/user-1.jpg" class="rounded-circle" width="42"
                    height="42" alt="">
            </div>
            <div class="john-title">
                <h6 class="mb-0 fs-4">John Doe</h6>
                <span class="fs-2">Designer</span>
            </div>
            <button class="border-0 bg-transparent text-primary ms-2" tabindex="0" type="button"
                aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                <i class="ti ti-power fs-6"></i>
            </button>
        </div>
    </div>
</aside>
