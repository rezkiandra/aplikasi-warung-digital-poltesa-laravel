<li>
  <a class="dropdown-item waves-effect" {{ request()->routeIs($route) ? 'active' : '' }} href="{{ $route }}">{{ $name }}</a>
</li>