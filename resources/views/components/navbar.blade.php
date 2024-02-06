<div class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav align-items-center justify-content-end ms-auto flex-row">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('modernize/src/assets/images/profile/user-1.jpg') }}" alt=""
                            width="35" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="javascript:void(0)" class="d-flex align-items-center dropdown-item gap-2">
                                <i class="ti ti-user fs-6"></i>
                                <p class="fs-3 mb-0">My Profile</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center dropdown-item gap-2">
                                <i class="ti ti-mail fs-6"></i>
                                <p class="fs-3 mb-0">My Account</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center dropdown-item gap-2">
                                <i class="ti ti-list-check fs-6"></i>
                                <p class="fs-3 mb-0">My Task</p>
                            </a>
                            <a href="./authentication-login.html"
                                class="btn btn-outline-primary d-block mx-3 mt-2">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
