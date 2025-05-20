<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <style>
        footer {
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
            background-color: #f8f9fa;
            text-align: right;
            padding: 10px;
        }
        .navbar {
    padding-top: 0 !important;
    margin-top: 0 !important;
        }
        .modal-content {
    display: block;
}
    </style>
  </head>
    <body class="with-welcome-text">
        <div class="container-scroller">
            <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
              <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                  <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                  </button>
                </div>
                <div>
                  <a class="navbar-brand brand-logo" href="admin">
                    <img src="assets/images/logo.svg" alt="logo">
                  </a>
                  <a class="navbar-brand brand-logo-mini" href="admin">
                    <img src="assets/images/logo-mini.svg" alt="logo">
                  </a>
                </div>
              </div>
              <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                  <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Hello, <span class="text-black fw-bold">Admin</span></h1>
                  </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <form class="search-form" action="#">
                      <i class="icon-search"></i>
                      <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                      <i class="icon-bell"></i>
                      <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                      <a class="dropdown-item py-3 border-bottom">
                        <p class="mb-0 fw-medium float-start">You have 4 new notifications </p>
                        <span class="badge badge-pill badge-primary float-end">View all</span>
                      </a>
                      <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                          <i class="mdi mdi-alert m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                          <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                          <p class="fw-light small-text mb-0"> Just now </p>
                        </div>
                      </a>
                      <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                          <i class="mdi mdi-lock-outline m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                          <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                          <p class="fw-light small-text mb-0"> Private message </p>
                        </div>
                      </a>
                      <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                          <i class="mdi mdi-airballoon m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                          <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                          <p class="fw-light small-text mb-0"> 2 days ago </p>
                        </div>
                      </a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="icon-mail icon-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                      <a class="dropdown-item py-3">
                        <p class="mb-0 fw-medium float-start">You have 7 unread mails </p>
                        <span class="badge badge-pill badge-primary float-end">View all</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <img src="assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                          <p class="preview-subject ellipsis fw-medium text-dark">Marian Garner </p>
                          <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                        </div>
                      </a>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <img src="assets/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                          <p class="preview-subject ellipsis fw-medium text-dark">David Grey </p>
                          <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                        </div>
                      </a>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <img src="assets/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                          <p class="preview-subject ellipsis fw-medium text-dark">Travis Jenkins </p>
                          <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                        </div>
                      </a>
                    </div>
                  </li>
                  <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                      <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                        <p class="mb-1 mt-3 fw-semibold">Admin</p>
                        <p class="fw-light text-muted mb-0">admin@gmail.com</p>
                      </div>
                      <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                      <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                      <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                      <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item border-0 bg-transparent w-100 text-start">
                            <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
                        </button>
                    </form>
                    </div>
                  </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                  <span class="mdi mdi-menu"></span>
                </button>
              </div>
            </nav>
            <div class="container-fluid page-body-wrapper">
              <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="admin">
                      <i class="mdi mdi-grid-large menu-icon"></i>
                      <span class="menu-title">Dashboard</span>
                    </a>
                  </li>
                  <li class="nav-item nav-category">Function</li>
                  </li>
                  <li class="nav-item">
                    <a href="/ProductAdmin" class="nav-link">
                      <i class="menu-icon mdi mdi-card-text-outline"></i>
                      <span class="menu-title">Product</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/CategoryAdmin" class="nav-link" >
                      <i class="menu-icon mdi mdi-notebook"></i>
                      <span class="menu-title">Category</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/VoucherAdmin" class="nav-link" >
                      <i class="menu-icon mdi mdi-notebook"></i>
                      <span class="menu-title">Vourcher</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/UserAdmin" class="nav-link">
                      <i class="menu-icon mdi mdi-account"></i>
                      <span class="menu-title">User</span>
                    </a>
                  </li>
                </ul>
              </nav>
        @yield('content')
        <footer>
            <p>&copy; By Hoang Phuoc</p>
        </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

  </body>
</html>
