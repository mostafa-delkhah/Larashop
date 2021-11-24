<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion pr-0" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <lord-icon
            src="https://cdn.lordicon.com/dqkyqxlp.json"
            trigger="hover"
            colors="primary:#ffffff,secondary:#08a88a"
            style="width:60px;height:60px">
        </lord-icon>

    </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span> Dashboard </span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading text-white">
        Shop
      </div>


      <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.brands.index") }}">
          <i class="fas fa-store"></i>
          <span> Brands </span></a>
      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-shopping-cart"></i>
          <span> Products </span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.products.index') }}">Products</a>
            <a class="collapse-item" href="#">Comments</a>
            <a class="collapse-item" href="{{ route('admin.categories.index') }}">Categories</a>
            <a class="collapse-item" href="{{ route('admin.attributes.index') }}">Attributes</a>
            <a class="collapse-item" href="{{ route('admin.tags.index') }}">Tags</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading text-white">
        لورم
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span> صفحات </span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> صفحات ورود : </h6>
            <a class="collapse-item" href="login.html"> ورود </a>
            <a class="collapse-item" href="register.html"> عضویت </a>
            <a class="collapse-item" href="forgot-password.html"> فراموشی رمز عبور </a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header"> صفحات دیگر : </h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="#">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area"></i>
          <span> نمودار ها </span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span> جداول </span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
