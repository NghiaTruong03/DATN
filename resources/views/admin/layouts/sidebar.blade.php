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
                  <a href="#" class="d-block">TruongNghia620</a>
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
                      <a href="{{ Route('admin.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Trang t???ng quan</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Qu???n l?? t??i kho???n
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/layout/top-nav.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>T??i kho???n ng?????i d??ng</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/layout/top-nav.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>T??i kho???n nh??n vi??n</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ Route('category.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>Qu???n l?? danh m???c</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ Route('brand.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-tag"></i>
                          <p> Qu???n l?? nh??n h??ng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('product.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-bars"></i>
                      <p>
                        Qu???n l?? s???n ph???m
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Qu???n l?? s???n ph???m
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ Route('product.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Th??m m???i</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ Route('product.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Danh s??ch</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ Route('attr.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-magic"></i>
                          <p>
                              Qu???n l?? thu???c t??nh SP
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Qu???n l?? ????n h??ng
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-truck"></i>
                          <p>
                              Qu???n l?? ????n v??? v???n chuy???n
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-box"></i>
                          <p>
                              Qu???n l?? t???n kho
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('product.upload') }}" class="nav-link">
                          <i class="nav-icon fas fa-image"></i>
                          <p>
                              Qu???n l?? banner
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
