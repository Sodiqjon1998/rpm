<header id="page-topbar" style="background: url({{asset('images/staticImages/backend/bg2.png')}});">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="background: none;">
                <div class="display-6 pt-3" style="color: white;">
                    Yuksalish
                </div>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

          

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{!is_null(Auth::user()->img) ? asset(Auth::user()->img) : asset('images/staticImages/defaultAvatar.png') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">
                        {{Auth::user()->name}}
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    {{-- <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i>
                        Profile</a>
                    <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My
                        Wallet</a> --}}
                    {{-- <a class="dropdown-item d-block" href="#"><span
                            class="badge bg-success float-end mt-1">11</span><i
                            class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i>
                        Lock screen</a> --}}
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item text-danger" href="{{ route('teacher.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
                        <span class="align-middle">Chiqish</span>
                    </a>
                    <form id="frm-logout" action="{{ route('teacher.logout') }}" method="POST"
                        style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="ri-settings-2-line"></i>
                </button>
            </div>

        </div>
    </div>
</header>
