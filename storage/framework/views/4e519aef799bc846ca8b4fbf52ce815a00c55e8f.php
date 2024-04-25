<li class="menu-item <?php echo e($active ? 'active open' : ''); ?>">
  <a href="javascript:void(0)" class="menu-link menu-toggle waves-effect">
    <i class="menu-icon tf-icons mdi mdi-<?php echo e($icon); ?>"></i>
    <div data-i18n="<?php echo e($label); ?>"><?php echo e($label); ?></div>
  </a>
  <ul class="menu-sub">
    <?php echo e($slot); ?>

  </ul>
</li>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/sidebar-dropdown.blade.php ENDPATH**/ ?>