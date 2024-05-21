<nav
  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-white border-bottom d-lg-none"
  id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center px-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="mdi mdi-menu mdi-24px"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center px-2" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <i class="mdi mdi-magnify mdi-24px me-2"></i>
        <input type="text" class="form-control border-0 shadow-none bg-body" placeholder="Telusuri..."
          aria-label="Telusuri..." />
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            @if (Auth::user()->role_id == 1)
              <img src="{{ asset('materio/assets/img/favicon/favicon.ico') }}" class="w-px-40 h-auto rounded-circle" />
            @elseif (Auth::user()->seller)
              <img src="{{ asset('storage/' . Auth::user()->seller->image) }}" class="w-px-40 h-auto rounded-circle" />
            @elseif (Auth::user()->customer)
              <img src="{{ asset('storage/' . Auth::user()->customer->image) }}"
                class="w-px-40 h-auto rounded-circle" />
            @else
              <img src="{{ asset('materio/assets/img/avatars/unknown.png') }}" alt="">
            @endif
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
          <li>
            <a class="dropdown-item pb-2 mb-1" href="#">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2 pe-1">
                  <div class="avatar avatar-online">
                    @if (Auth::user()->role_id == 1)
                      <img src="{{ asset('materio/assets/img/favicon/favicon.ico') }}"
                        class="w-px-40 h-auto rounded-circle" />
                    @elseif(Auth::user()->seller)
                      <img src="{{ asset('storage/' . Auth::user()->seller->image) }}"
                        class="w-px-40 h-auto rounded-circle" />
                    @elseif(Auth::user()->customer)
                      <img src="{{ asset('storage/' . Auth::user()->customer->image) }}"
                        class="w-px-40 h-auto rounded-circle" />
                    @else
                      <img src="{{ asset('materio/assets/img/avatars/unknown.png') }}" alt="">
                    @endif
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                  <small class="text-muted">{{ Auth::user()->role->role_name }}</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider my-1"></div>
          </li>
          <li>
            <div class="dropdown-divider my-1"></div>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}">
              <i class="mdi mdi-power me-1 mdi-20px"></i>
              <span class="align-middle">Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
