<li class="menu-item {{ $active ? 'active' : '' }}">
  <a href="{{ $route }}" class="menu-link">
    <i class="menu-icon tf-icons mdi mdi-{{ $icon }}"></i>
    <div data-i18n="{{ $label }}">{{ $label }}</div>
    {{-- <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div> --}}
  </a>
</li>
