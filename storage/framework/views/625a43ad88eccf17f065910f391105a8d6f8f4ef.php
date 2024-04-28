<nav
  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-white border-bottom"
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
          aria-label="Search..." />
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <?php if(Auth::user()->role_id == 1): ?>
              <img src="<?php echo e(asset('materio/assets/img/favicon/favicon.ico')); ?>" alt
                class="w-px-40 h-auto rounded-circle" />
            <?php elseif(Auth::user()->role_id == 2): ?>
              <img src="<?php echo e(asset('storage/' . Auth::user()->seller->image)); ?>" alt
                class="w-px-40 h-auto rounded-circle" />
            <?php elseif(Auth::user()->role_id == 3): ?>
              <img src="<?php echo e(asset('storage/' . Auth::user()->customer->image)); ?>" alt
                class="w-px-40 h-auto rounded-circle" />
            <?php endif; ?>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
          <li>
            <a class="dropdown-item pb-2 mb-1" href="#">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2 pe-1">
                  <div class="avatar avatar-online">
                    <?php if(Auth::user()->role_id == 1): ?>
                      <img src="<?php echo e(asset('materio/assets/img/favicon/favicon.ico')); ?>" alt
                        class="w-px-40 h-auto rounded-circle" />
                    <?php elseif(Auth::user()->role_id == 2): ?>
                      <img src="<?php echo e(asset('storage/' . Auth::user()->seller->image)); ?>" alt
                        class="w-px-40 h-auto rounded-circle" />
                    <?php elseif(Auth::user()->role_id == 3): ?>
                      <img src="<?php echo e(asset('storage/' . Auth::user()->customer->image)); ?>" alt
                        class="w-px-40 h-auto rounded-circle" />
                    <?php endif; ?>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-0"><?php echo e(Auth::user()->name); ?></h6>
                  <small class="text-muted"><?php echo e(Auth::user()->role->role_name); ?></small>
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
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
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
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/navbar.blade.php ENDPATH**/ ?>