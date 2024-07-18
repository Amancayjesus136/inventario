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

                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-category-alt fs-22'></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fw-semibold fs-15"> Redes Sociales </h6>
                                </div>
                                <div class="col-auto">
                                    {{-- <a href="#!" class="btn btn-sm btn-soft-info shadow-none"> View All Apps
                                        <i class="ri-arrow-right-s-line align-middle"></i></a> --}}
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ asset('assets2/images/brands/fb.png') }}" alt="Github">
                                        <span>Facebook</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ asset('assets2/images/brands/ig.png') }}" alt="bitbucket">
                                        <span>Instagram</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="{{ asset('assets2/images/brands/tik.png') }}" alt="dribbble">
                                        <span>Tik Tok</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="https://wa.me/+51933924456">
                                        <img src="{{ asset('assets2/images/brands/wsp2.png') }}" alt="dropbox">
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="mailto:amancayjesus136@gmail.com">
                                        <img src="{{ asset('assets2/images/brands/gmail.png') }}" alt="mail_chimp">
                                        <span>Gmail</span>
                                    </a>
                                </div>

                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        {{-- <img src="assets2/images/brands/slack.png" alt="slack">
                                        <span>Slack</span> --}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" id="page-header-cart-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-shopping-bag fs-22'></i>
                        <span id="cart-item-count" class="position-absolute topbar-badge cartitem-badge fs-10 translate-middle badge rounded-pill bg-info">0</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 dropdown-menu-cart" aria-labelledby="page-header-cart-dropdown">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold"> Mi carrito</h6>
                                </div>
                                <div class="col-auto">
                                    <span id="cart-item-total-count" class="badge bg-warning-subtle text-warning fs-13"><span class="cartitem-badge">0</span> items</span>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 300px;">
                            <div id="cart-items-list" class="p-2">
                                <div class="text-center empty-cart" id="empty-cart">
                                    <div class="avatar-md mx-auto my-3">
                                        <div class="avatar-title bg-info-subtle text-info fs-36 rounded-circle">
                                            <i class='bx bx-cart'></i>
                                        </div>
                                    </div>
                                    <h5 class="mb-3">Carrito vacio</h5>
                                    {{-- <a href="apps-ecommerce-products.html" class="btn btn-success w-md mb-3">Shop Now</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border" id="checkout-elem">
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <h5 class="m-0 text-muted">Total:</h5>
                                <div class="px-2">
                                    <h5 id="cart-item-total">S/.0.00</h5>
                                </div>
                            </div>
                            <button onclick="sendWhatsAppMessage()" class="btn btn-success text-center w-100">
                                <i class="ri-whatsapp-line"></i> Enviar al WhatsApp
                            </button>

                        </div>
                    </div>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                {{-- <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
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
                </script> --}}

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
                            {{-- <li class="menu-title"><span data-key="t-menu">Menu</span></li> --}}
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('dashboardCliente') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="bx bx-home"></i> <span data-key="t-dashboard">Inicio</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('details.category') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="bx bx-book-open"></i> <span data-key="t-dashboard">Carta</span>
                                </a>
                            </li>
                        </ul>


                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="tel:+51933924456" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="bx bx-phone-call"></i> <span data-key="t-dashboard">Llámanos <b class="text-danger">+51 958096704</b></span>
                                </a>
                            </li>
                        </ul>

                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="bx bx-map"></i> <span data-key="t-dashboard">Dirección y horarios</span>
                                </a>
                            </li>
                        </ul>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="mdi mdi-view-dashboard"></i> <span data-key="t-dashboards">Otros</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-crypto"> Sobre nosotros </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-analytics"> Contactos </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-projects"> Terminos y condiciones </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-nft"> Terminos y condiciones de whatsapp</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.add-to-cart-btn').on('click', function(event) {
                    event.preventDefault();

                    const productId = $(this).data('product-id');
                    const productName = $(this).data('product-name');
                    const selectedSize = $('#size-select-' + productId + ' option:selected').text();
                    const selectedPrice = $('#price-display-' + productId).text();
                    const productImage = $(this).closest('.crypto-card').find('.explore-img').attr('src');

                    const cartItemHtml = `
                        <div class="d-flex align-items-center mt-2 dropdown-item-cart">
                            <img src="${productImage}" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                            <div class="flex-grow-1">
                                <h6 class="mt-0 mb-1 fs-14">
                                    <a href="apps-ecommerce-product-details.html" class="text-reset">${productName}</a>
                                </h6>
                                <p class="mb-0 fs-12 text-muted">
                                    Tamaño: <span>${selectedSize}</span><br>
                                </p>
                            </div>
                            <div class="px-2">
                                <h5 class="m-0 fw-normal">$<span class="cart-item-price">${selectedPrice}</span></h5>
                            </div>
                            <div class="ps-2">
                                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn shadow-none"><i class="ri-close-fill fs-16"></i></button>
                            </div>
                        </div>
                    `;

                    $('#cart-items-list').append(cartItemHtml);

                    const itemCount = $('.dropdown-menu-cart .dropdown-item-cart').length;
                    $('.cartitem-badge').text(itemCount);
                    $('#empty-cart').hide();
                    saveCartState();

                    updateCartTotal();
                });

                function updateCartTotal() {
                    let total = 0;

                    $('.dropdown-menu-cart .dropdown-item-cart').each(function() {
                        const price = parseFloat($(this).find('.cart-item-price').text().replace('$', ''));
                        total += price;
                    });

                    $('#cart-item-total').text('$' + total.toFixed(2));
                    $('#cart-item-total-count').html(`<span class="cartitem-badge">${$('.dropdown-menu-cart .dropdown-item-cart').length}</span> items`);
                }

                function saveCartState() {
                    const cartItems = [];
                    $('.dropdown-menu-cart .dropdown-item-cart').each(function() {
                        const productId = $(this).find('.product-id').text();
                        const productName = $(this).find('.fs-14 a').text();
                        const selectedSize = $(this).find('.fs-12 span').text();
                        const selectedPrice = $(this).find('.cart-item-price').text();
                        const productImage = $(this).find('img').attr('src');

                        const item = {
                            productId: productId,
                            productName: productName,
                            selectedSize: selectedSize,
                            selectedPrice: selectedPrice,
                            productImage: productImage
                        };

                        cartItems.push(item);
                    });

                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                }

                function loadCartState() {
                    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

                    cartItems.forEach(function(item) {
                        const cartItemHtml = `
                            <div class="d-flex align-items-center mt-2 dropdown-item-cart">
                                <img src="${item.productImage}" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1 fs-14">
                                        <a href="apps-ecommerce-product-details.html" class="text-reset">${item.productName}</a>
                                    </h6>
                                    <p class="mb-0 fs-12 text-muted">
                                        Tamaño: <span>${item.selectedSize}</span><br>
                                    </p>
                                </div>
                                <div class="px-2">
                                    <h5 class="m-0 fw-normal">$<span class="cart-item-price">${item.selectedPrice}</span></h5>
                                </div>
                                <div class="ps-2">
                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn shadow-none"><i class="ri-close-fill fs-16"></i></button>
                                </div>
                            </div>
                        `;

                        $('#cart-items-list').append(cartItemHtml);
                    });

                    const itemCount = cartItems.length;
                    $('.cartitem-badge').text(itemCount);
                    $('#empty-cart').toggle(itemCount === 0);

                    updateCartTotal();
                }

                loadCartState();

                $('.dropdown-menu-cart').on('click', '.remove-item-btn', function(event) {
                    event.preventDefault();
                    $(this).closest('.dropdown-item-cart').remove();

                    saveCartState();

                    const itemCount = $('.dropdown-menu-cart .dropdown-item-cart').length;
                    $('.cartitem-badge').text(itemCount);

                    updateCartTotal();

                    if (itemCount === 0) {
                        $('#empty-cart').show();
                    }
                });
            });

            function sendWhatsAppMessage() {
                const cartItems = [];
                $('.dropdown-menu-cart .dropdown-item-cart').each(function() {
                    const productName = $(this).find('.fs-14 a').text().trim();
                    const selectedPrice = $(this).find('.cart-item-price').text().trim();
                    const selectedSize = findSizeByPrice(productName, selectedPrice);

                    const item = {
                        productName: productName,
                        selectedPrice: selectedPrice,
                        selectedSize: selectedSize
                    };

                    cartItems.push(item);
                });

                if (cartItems.length === 0) {
                    alert('No hay productos seleccionados para enviar.');
                    return;
                }

                $.ajax({
                    url: '/api/cart',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ cartItems: cartItems }),
                    success: function(response) {
                        const introMessage = "Estoy interesado en los siguientes productos:\n\n";
                        const productsMessage = cartItems.map(item => `🍕 *Producto:* ${item.productName}\n 💲 *Precio:* ${item.selectedPrice}\n\n`).join("");

                        const fullMessage = encodeURIComponent(introMessage + productsMessage);
                        const whatsappLink = `https://api.whatsapp.com/send?phone=+51958096704&text=${fullMessage}`;
                        window.open(whatsappLink, '_blank');

                        resetCart();

                    },
                    error: function(error) {
                        alert('Error al enviar los productos al API.');
                    }
                });
            }


            function findSizeByPrice(productName, selectedPrice) {
                let selectedSize = '';

                return selectedSize;
            }

            function resetCart() {
                $('#cart-items-list').empty();
                $('.cartitem-badge').text('0');
                $('#cart-item-total').text('$0.00');
                $('#empty-cart').show();

                $('#whatsapp-button').prop('disabled', true);

                localStorage.removeItem('cartItems');
            }

            function checkCartItems() {
                let itemCount = parseInt(document.getElementById('cart-item-total').innerText);

                $('#whatsapp-button').prop('disabled', itemCount === 0);
            }

            $(document).ready(function() {
                checkCartItems();
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.filter-btns button').on('click', function() {
                    const filterValue = $(this).data('filter');

                    if (filterValue === 'all') {
                        $('.product-item').show();
                    } else {
                        $('.product-item').hide();

                        $(`.product-item[data-category="${filterValue}"]`).show();
                    }

                    $('.filter-btns button').removeClass('active');
                    $(this).addClass('active');
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sizeSelects = document.querySelectorAll('.size-select');

                sizeSelects.forEach(select => {
                    const productId = select.id.split('-').pop();
                    const priceDisplay = document.getElementById(`price-display-${productId}`);

                    priceDisplay.innerText = select.options[select.selectedIndex].value;

                    select.addEventListener('change', function() {
                        priceDisplay.innerText = this.value;
                    });
                });
            });
        </script>
