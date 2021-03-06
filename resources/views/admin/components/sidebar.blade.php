<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('create-products')}}" class="brand-link">
        <img src="/libs/client/img/logo/[removal.ai]_tmp-614ae5252355e.png" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>Sản Phẩm<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('create-products')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Mới Sản Phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('list-product')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Sản Phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Tài Khoản<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('create-user')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Mới Tài Khoản</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Tài Khoản</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fab fa-first-order"></i>
                        <p>Đơn Hàng<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('list-order')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Đơn Hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fab fa-first-order"></i>
                        <p>Liên Hệ<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Lời Nhắn</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
