<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">Ananda Adhi Surya G211220012</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item">
              <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(Request::is('*dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('users')); ?>" class="nav-link <?php echo e(Request::is('*users') ? 'active' : ''); ?>">
                <i class="fas fa-users nav-icon"></i>
                <p>Data Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('crud')); ?>" class="nav-link <?php echo e(Request::is('*crud') ? 'active' : ''); ?>">
                <i class="fas fa-user nav-icon"></i>
                <p>Data Penyewa </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('produk')); ?>" class="nav-link <?php echo e(Request::is('*produk') ? 'active' : ''); ?>">
                <i class="fas fa-mobile-alt nav-icon"></i>
                <p>Data Produk</p>
              </a> 
            </li>
            
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div><?php /**PATH C:\Users\ACER NITRO 5\proyek_akhir\resources\views/dashboard/sidebar.blade.php ENDPATH**/ ?>