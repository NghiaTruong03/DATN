  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ Route('admin.index') }}" class="brand-link">
          <img src="{{ url('assets/admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Trang Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ url('assets/admin') }}/dist/img/Character_Ayaka.png" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{Auth::user()->name}}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Trang tổng quan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Quản lý tài khoản
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/layout/top-nav.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Danh sách nhân viên</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('account.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Danh sách người dùng</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ Route('category.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Quản lý danh mục
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ Route('brand.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-tag"></i>
                          <p>
                              Quản lý nhãn hàng
                          </p>
                      </a>
                  </li>
                  {{-- <li class="nav-item">
            <a href="{{Route('product.index')}}" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Quản lý sản phẩm
              </p>
            </a>
          </li> --}}
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Quản lý sản phẩm
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ Route('product.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Thêm mới</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ Route('product.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Danh sách</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ Route('attr.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-magic"></i>
                          <p>
                              Quản lý thuộc tính SP
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Quản lý đơn hàng
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-truck"></i>
                          <p>
                              Quản lý đơn vị vận chuyển
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-box"></i>
                          <p>
                              Quản lý tồn kho
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('product.upload') }}" class="nav-link">
                          <i class="nav-icon fas fa-image"></i>
                          <p>
                              Quản lý banner
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
