<li class="menu-item {{ $active ? 'active open' : '' }}">
  <a href="javascript:void(0)" class="menu-link menu-toggle waves-effect">
    <i class="menu-icon tf-icons mdi mdi-{{ $icon }}"></i>
    <div data-i18n="{{ $label }}">{{ $label }}</div>
  </a>
  <ul class="menu-sub">
    {{ $slot }}
  </ul>
</li>
