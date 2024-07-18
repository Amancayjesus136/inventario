<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-md-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar style="max-height: 320px;">
                            <!-- item-->
                            <div class="dropdown-header">
                                <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                            </div>

                            <div class="dropdown-item bg-transparent text-wrap">
                                <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
                                <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i class="mdi mdi-magnify ms-1"></i></a>
                            </div>
                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                <span>Analytics Dashboard</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                <span>Help Center</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                <span>My account settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic1">
                                        <div class="flex-1">
                                            <h6 class="m-0">Angela Bernier</h6>
                                            <span class="fs-11 mb-0 text-muted">Manager</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic2">
                                        <div class="flex-1">
                                            <h6 class="m-0">David Grasso</h6>
                                            <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="assets/images/users/avatar-5.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">Mike Bunch</h6>
                                            <span class="fs-11 mb-0 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="text-center pt-3 pb-1">
                            <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                    @php
                        use App\Models\Notificacion;
                        $notifications = Notificacion::whereNull('read_at')->orderBy('created_at', 'desc')->get();
                        $newNotificationCount = $notifications->count();
                    @endphp
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-bell fs-22'></i>
                        <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">
                            {{ $newNotificationCount }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="dropdown-head bg-primary bg-pattern rounded-top">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                    </div>
                                    <div class="col-auto dropdown-tabs">
                                        <span class="badge badge-soft-light fs-13"> {{ $newNotificationCount }} Nuevos</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-2 pt-2">
                                <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab" aria-selected="true">
                                            All ({{ $newNotificationCount }})
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab" aria-selected="false">
                                            Messages
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab" aria-selected="false">
                                            Alerts
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content position-relative" id="notificationItemsTabContent">
                            <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                <div data-simplebar style="max-height: 300px;" class="pe-2" id="notification-list">
                                    @foreach($notifications as $notification)
                                        <div class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">Nueva Consulta</h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">{{ json_decode($notification->data)->message }}</p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="my-3 text-center view-all">
                                    <button type="button" class="btn btn-soft-success waves-effect waves-light">View All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                                </div>
                            </div>
                            <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel" aria-labelledby="messages-tab"></div>
                            <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel" aria-labelledby="alerts-tab"></div>
                        </div>
                    </div>
                </div>

                <audio id="notificationSound" src="{{ asset('assets/sounds/notification.mp3') }}" preload="auto"></audio>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var previousNotificationCount = {{ $newNotificationCount }};
                        var notificationSound = document.getElementById('notificationSound');

                        function fetchNotifications() {
                            fetch('/notifications')
                                .then(response => response.json())
                                .then(data => {
                                    var notificationList = document.getElementById('notification-list');
                                    notificationList.innerHTML = '';

                                    data.notifications.forEach(notification => {
                                        var notificationItem = document.createElement('div');
                                        notificationItem.className = 'text-reset notification-item d-block dropdown-item position-relative';
                                        notificationItem.innerHTML = `
                                            <div class="d-flex">
                                                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">Nueva Consulta</h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">${JSON.parse(notification.data).message}</p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> ${new Date(notification.created_at).toLocaleString()}</span>
                                                    </p>
                                                </div>
                                            </div>`;
                                        notificationList.appendChild(notificationItem);
                                    });

                                    // Update counts
                                    var newNotificationCount = data.newNotificationCount;
                                    if (newNotificationCount > previousNotificationCount) {
                                        notificationSound.play().catch(function(error) {
                                            console.error('Error playing notification sound:', error);
                                        });
                                    }

                                    previousNotificationCount = newNotificationCount;
                                })
                                .catch(error => console.error('Error fetching notifications:', error));
                        }

                        // Fetch notifications every 30 seconds
                        setInterval(fetchNotifications, 30000);
                    });
                </script>



                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            {{-- <img class="rounded-circle header-profile-user" src={{ asset('"assets/images/users/avatar-1.jpg') }}" alt="Header Avatar"> --}}
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><span class="badge bg-soft-success text-success mt-1 float-end">Usuario registrado</span></span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Bienvenido {{ Auth::user()->name }}!</h6>
                        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Perfil</span></a>
                        <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Mensajes</span></a>
                        <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Tablero de tareas</span></a>
                        <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Ayuda</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Facturas : <b>$0</b></span></a>
                        <a class="dropdown-item" href="pages-profile-settings.html"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Configuración</span></a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Bloquear pantalla</span></a>
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Cerrar Sección</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="menu-title"><span>Menu</span></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('login') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="bx bx-home"></i> <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                        </ul>



                        <li class="menu-title"><span>Gestión de productos</span></li>
                        <li class="nav-item">
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('facturas.index') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="ri-survey-line"></i> <span data-key="t-dashboard">Facturas</span>
                                </a>
                            </li>

                            <a class="nav-link menu-link" href="#sidebarProductos" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProductos">
                                <i class="ri-shopping-bag-line"></i> <span>Productos</span>
                            </a>

                            <div class="collapse menu-dropdown" id="sidebarProductos">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('products.index') }}" class="nav-link"> Modulos </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Productos desactivados </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarProveedores" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProveedores">
                                <i class="ri-truck-line"></i> <span>Proveedores</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarProveedores">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Modulos </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Reportes </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Evaluación </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarCompras" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCompras">
                                <i class="ri-shopping-cart-line"></i> <span>Compras</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCompras">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Solicitud de compra </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Ordenes de compra </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Recepción de compra </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Devoluciones del cliente </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Reportes </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarReportes" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarReportes">
                                <i class="ri-file-list-3-line"></i> <span>Reportes</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarReportes">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Inventario actual </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Ventas y compras </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Productos </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Análisis de costos </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}

                        <li class="menu-title"><span>Gestión de clientes</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarClientes" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarClientes">
                                <i class="ri-user-3-line"></i> <span>Usuarios</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarClientes">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Historial de clientes </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Historial de empleados </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Subscripciones </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title"><span>Configuración</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-settings-3-line"></i> <span>General</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('categories.index') }}" class="nav-link"> Categorias </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Logs </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
