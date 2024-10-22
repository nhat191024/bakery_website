<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo.svg') }} " />
    <title>ODOUCEURS - Quản lý</title>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <!-- Custom fonts for this template -->
    <link href="{{ url('') . '/' }}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('') . '/' }}css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ url('') . '/' }}css/styles.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ url('') . '/' }}vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('') . '/' }}admin">
                <div class="sidebar-brand-icon ">
                    <img src="{{ asset('img/logo.svg') }}" width="60%">
                </div>
                <div class="sidebar-brand-text mx-3">ODOUCEURS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item  {{ Request::is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('') . '/' }}admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang tổng quan</span></a>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('') . '/' }}#" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{ url('') . '/' }}buttons.html">Buttons</a>
                        <a class="collapse-item" href="{{ url('') . '/' }}cards.html">Cards</a>
                    </div>
                </div>
            </li> --}}

            <!-- Nav Item - Utilities Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('') . '/' }}#" data-toggle="collapse"
                    data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="{{ url('') . '/' }}utilities-color.html">Colors</a>
                        <a class="collapse-item" href="{{ url('') . '/' }}utilities-border.html">Borders</a>
                        <a class="collapse-item" href="{{ url('') . '/' }}utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="{{ url('') . '/' }}utilities-other.html">Other</a>
                    </div>
                </div>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Chức năng
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('') . '/' }}#" data-toggle="collapse"
                    data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="{{ url('') . '/' }}login.html">Login</a>
                        <a class="collapse-item" href="{{ url('') . '/' }}register.html">Register</a>
                        <a class="collapse-item" href="{{ url('') . '/' }}forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="{{ url('') . '/' }}404.html">404 Page</a>
                        <a class="collapse-item" href="{{ url('') . '/' }}blank.html">Blank Page</a>
                    </div>
                </div>
            </li> --}}

            <!-- Nav Item - Charts -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ url('') . '/' }}charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> --}}

            <!-- Nav Item - Tables -->
            <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Danh mục</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/product*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.product.index') }}">
                    <i class="fas fa-fw fa-cookie"></i>
                    <span>Sản phẩm</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/banner*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.banner.index') }}">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Banner</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/about*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.about.index') }}">
                    <i class="fas fa-fw fa-pen-fancy"></i>
                    <span>About Us</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/bill*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.bill.index') }}">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Hóa đơn</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/message*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.message.index') }}">
                    <i class="fas fa-fw fa-bell "></i>
                    <span>Tin nhắn KH</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/variation*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.variation.index') }}">
                    <i class="fas fa-fw fa-chevron-circle-right"></i>
                    <span>Quản lý size</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/accessory*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.accessory.index') }}">
                    <i class="fas fa-fw fa-birthday-cake"></i>
                    <span>Quản lý phụ kiện</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/promotion*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.promotion.index') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Băng rôn quảng cáo SP</span></a>
            </li>
            <li class="nav-item {{ Request::is('admin/voucher*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.voucher.index') }}">
                    <i class="fas fa-fw fa-money-check"></i>
                    <span>Voucher</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/blog*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.blog.index') }}">
                    <i class="fas fa-fw fa-blog"></i>
                    <span>Quản lý Blog</span></a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.method.index') }}">
                    <i class="fas fa-fw fa-cookie"></i>
                    <span>Cách thức nấu</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.branch.index') }}">
                    <i class="fas fa-fw fa-warehouse"></i>
                    <span>Chi nhánh</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.kitchen.index') }}">
                    <i class="fas fa-fw fa-dumpster-fire"></i>
                    <span>Bếp</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.table.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bàn</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dish.index') }}">
                    <i class="fas fa-fw fa-cloud-meatball"></i>
                    <span>Món ăn</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Quản lý tài khoản</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button type="button" id="sidebarToggleTop"
                            class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    {{-- <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter pending-bill-count">0</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Hoá đơn đang chờ
                                </h6>
                                <div id="pending-bill-list" class="overflow-auto" style="max-height: 500px;"></div>
                                <div class="d-none billPendingTemplate">
                                    <a class="dropdown-item d-flex align-items-center" href="" id="bill-link">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div id="order_date" class="small text-gray-900">December 12, 2019</div>
                                            <span id="bill-description" class="font-weight-bold">Đơn hàng mới</span>
                                            <div id="bill-phone" class="small text-gray-900">0987654321</div>
                                        </div>
                                    </a>
                                </div>
                                <a class="dropdown-item text-center small text-gray-600" href="{{ route('admin.bill.index') }}">Xem toàn bộ
                                    đơn hàng</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter message-count">0</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Tin nhắn từ khách hàng
                                </h6>
                                <div id="message-list" class="overflow-auto" style="max-height: 500px;"></div>
                                <div class="d-none messageTemplate">
                                    <p id="message-id" class="d-none">0</p>
                                    <a class="dropdown-item d-flex align-items-center" id="message-link"
                                        href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle"
                                                src="{{ url('') . '/' }}img/undraw_profile_1.svg" alt="...">
                                            <div class="status-indicator">
                                                <div id="message-index"
                                                    style="font-size: 10px; transform: translate(1px, -5px)"></div>
                                            </div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate" id="message-subject">Subject</div>
                                            <div class="small text-gray-900" id="message-info">Name · 1m</div>
                                        </div>
                                    </a>
                                </div>
                                <a class="dropdown-item text-center small text-gray-600"
                                    href="{{ route('admin.message.index') }}">Xem thêm tin nhắn
                                </a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->email }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ url('') . '/' }}img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->
                @yield('main')
                <!-- End of Page Wrapper -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy;2024 Xây dựng và thiết kế | FPT Polytechnic Hải Phòng</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="{{ url('') . '/' }}#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="{{ url('') . '/' }}logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="{{ url('') . '/' }}vendor/jquery/jquery.min.js"></script>
            <script src="{{ url('') . '/' }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="{{ url('') . '/' }}vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{ url('') . '/' }}js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="{{ url('') . '/' }}vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="{{ url('') . '/' }}vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="{{ url('') . '/' }}js/demo/datatables-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

            <script src="{{ url('') . '/' }}js/admin/blog.js"></script>
</body>

</html>
<script>
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>
