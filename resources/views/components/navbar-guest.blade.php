@php
  $user_role = Auth::user()->role_id ?? '';
@endphp

<div class="fixed-top">
  <nav class="layout-navbar shadow bg-white border">
    <div class="navbar navbar-expand-lg landing-navbar border-top-0 px-3 px-md-4 bg-white rounded">
      <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
        <button class="navbar-toggler border-0 px-0 me-4 d-inline-block d-lg-none" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="tf-icons mdi mdi-menu mdi-24px align-middle"></i>
        </button>
        <a href="{{ route('guest.home') }}" class="app-brand-link gap-3 me-lg-0 me-0">
          <span class="app-brand-logo demo" style="rotate: -180deg">
            <span style="color: #9055fd">
              <svg width="30" height="24" viewBox="0 0 250 196" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M12.3002 1.25469L56.655 28.6432C59.0349 30.1128 60.4839 32.711 60.4839 35.5089V160.63C60.4839 163.468 58.9941 166.097 56.5603 167.553L12.2055 194.107C8.3836 196.395 3.43136 195.15 1.14435 191.327C0.395485 190.075 0 188.643 0 187.184V8.12039C0 3.66447 3.61061 0.0522461 8.06452 0.0522461C9.56056 0.0522461 11.0271 0.468577 12.3002 1.25469Z"
                  fill="currentColor" />
                <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                  d="M0 65.2656L60.4839 99.9629V133.979L0 65.2656Z" fill="black" />
                <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                  d="M0 65.2656L60.4839 99.0795V119.859L0 65.2656Z" fill="black" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M237.71 1.22393L193.355 28.5207C190.97 29.9889 189.516 32.5905 189.516 35.3927V160.631C189.516 163.469 191.006 166.098 193.44 167.555L237.794 194.108C241.616 196.396 246.569 195.151 248.856 191.328C249.605 190.076 250 188.644 250 187.185V8.09597C250 3.64006 246.389 0.027832 241.935 0.027832C240.444 0.027832 238.981 0.441882 237.71 1.22393Z"
                  fill="currentColor" />
                <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                  d="M250 65.2656L189.516 99.8897V135.006L250 65.2656Z" fill="black" />
                <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                  d="M250 65.2656L189.516 99.0497V120.886L250 65.2656Z" fill="black" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                  fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                  fill="white" fill-opacity="0.15" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                  fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                  fill="white" fill-opacity="0.3" />
              </svg>
            </span>
          </span>
          <span class="app-brand-text demo text-heading fw-semibold">Warung</span>
        </a>
      </div>
      <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
        <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl" type="button"
          data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <ul class="navbar-nav d-lg-flex align-items-center justify-content-between gap-4 d-inline text-uppercase">
          <li class="nav-item my-lg-0 my-2">
            <a class="nav-link fw-medium {{ request()->routeIs('guest.home', 'customer.home') ? 'active text-primary' : 'text-dark' }}"
              href="@if ($user_role == 3) {{ route('customer.home') }} @else {{ route('guest.home') }} @endif">Beranda</a>
          </li>
          <li class="nav-item my-lg-0 my-2">
            <a class="nav-link fw-medium text-dark {{ request()->routeIs('guest.products', 'customer.products', 'guest.*.product', 'customer.*.product') ? 'active text-primary' : 'text-dark' }}"
              href="@if ($user_role == 3) {{ route('customer.products') }} @else {{ route('guest.products') }} @endif">Produk</a>
          </li>
          @auth
            <li class="nav-item my-lg-0 my-2">
              <a class="nav-link fw-medium text-dark"
                href="{{ route('customer.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item my-lg-0 my-2">
              <small
                class="cursor-pointer bg-label-primary px-2 px-lg-2 rounded rounded-lg nav-link fw-medium text-dark">{{ Auth::user()->name }}</small>
            </li>
          @endauth
        </ul>
      </div>
      <ul class="navbar-nav d-flex d-lg-flex d-md-flex align-items-center ms-auto text-uppercase">
        <li>
          @guest
            <a href="{{ route('login') }}" class="btn btn-primary px-2 px-sm-4 px-lg-2 px-xl-4">
              <i class="tf-icons mdi mdi-account me-0 me-lg-2 me-md-2"></i>
              <span class="d-none d-lg-inline d-md-inline">Login</span>
            </a>
          @endguest
          @auth
            <a href="{{ route('customer.cart') }}" class="me-4">
              <i class="mdi mdi-cart-outline mdi-24px"></i>
              <span class="position-absolute fs-tiny badge rounded-pill bg-danger" style="margin-left: -10px">
                @if (Auth::user()->role_id == 3)
                  {{ \App\Models\ProductsCart::where('customer_id', Auth::user()->customer->id)->count() }}
                @endif
              </span>
            </a>
            <div class="fw-medium btn btn-primary">
              <i class="mdi mdi-logout me-0 me-lg-2 me-md-2"></i>
              <a href="{{ route('logout') }}" class="d-none d-lg-inline d-md-inline text-white text-uppercase">Logout</a>
            </div>
          @endauth
        </li>
      </ul>
    </div>
  </nav>
</div>
