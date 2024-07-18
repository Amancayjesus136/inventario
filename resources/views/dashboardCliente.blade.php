@extends('layouts.client.admin-user')
@section('content2')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <section class="section bg-light pb-0" id="hero">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6">
                            <div>
                                <h1 class="display-6 fw-semibold text-capitalize mb-3 lh-base">Regístrate y aprovecha promociones exclusivas</h1>
                                <p class="lead text-muted lh-base mb-4">Crea una cuenta para recibir ofertas especiales. Al realizar compras iniciando sesión, disfrutarás de precios con descuentos por preferencia al ser nuestro cliente.</p>
                                <form action="#" class="job-panel-filter">
                                    <div class="row g-md-0 g-2">
                                        <div class="col-md-6">
                                            <div>

                                            </div>
                                        </div>
                                        <!--end col-->

                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>

                                <div class="hstack gap-2 justify-content-center">
                                    <a href="{{ route('login.usuario') }}" class="btn btn-primary">¡Iniciar Sesión! <i class="ri-arrow-right-line align-middle ms-1"></i></a>
                                    <a href="{{ route('register.usuario') }}" class="btn btn-danger">¡Crear Cuenta! <i class="ri-arrow-right-line align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <div class="position-relative home-img text-center mt-5 mt-lg-0">
                                <div class="card p-3 rounded shadow-lg inquiry-box">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0 me-3">
                                            <div class="avatar-title bg-warning-subtle text-warning rounded fs-18">
                                                <i class="ri-mail-send-line"></i>
                                            </div>
                                        </div>
                                        <h5 class="fs-15 lh-base mb-0">
                                            <a href="mailto:amancayjesus136@gmail.com">Correo electrónico</a>
                                        </h5>
                                    </div>
                                </div>
{{--
                                <div class="card p-3 rounded shadow-lg application-box">
                                    <h5 class="fs-15 lh-base mb-3">Applications</h5>
                                    <div class="avatar-group">
                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                            <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid">
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                            <div class="avatar-xs">
                                                <div class="avatar-title rounded-circle bg-danger">
                                                    S
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                            <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle img-fluid">
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top">
                                            <div class="avatar-xs">
                                                <div class="avatar-title rounded-circle bg-success">
                                                    Z
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                            <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-9.jpg" alt="" class="rounded-circle img-fluid">
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="More Appliances">
                                            <div class="avatar-xs">
                                                <div class="avatar-title fs-13 rounded-circle bg-light border-dashed border text-primary">
                                                    2k+
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}

                                <style>
                                    .user-img {
                                        width: 100%;
                                        height: auto; /* Mantiene la proporción de la imagen */
                                        border-radius: 10px; /* Opcional: agrega esquinas redondeadas */
                                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Opcional: agrega una sombra */
                                    }
                                </style>

                                <img src="https://cdn.pixabay.com/photo/2017/08/06/06/43/pizza-2589575_1280.jpg" alt="" class="user-img">

                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>

            <section class="section" id="services">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h1 class="mb-3 ff-secondary fw-semibold lh-base">Promociones</h1>
                                <p class="text-muted">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce the grammar</p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card explore-box card-animate border">
                                <div class="card-body">
                                    <div class="explore-place-bid-img overflow-hidden rounded">
                                        <img src="assets/images/nft/img-05.jpg" alt="" class="explore-img w-100">
                                        <div class="bg-overlay"></div>
                                        <div class="place-bid-btn">
                                            <a href="#!" class="btn btn-success"><i class="ri-auction-fill align-bottom me-1"></i> Place Bid</a>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="fs-16 mb-0"><a href="apps-nft-item-details.html">Patterns arts &amp; culture</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card explore-box card-animate border">
                                <div class="card-body">
                                    <div class="explore-place-bid-img overflow-hidden rounded">
                                        <img src="assets/images/nft/img-05.jpg" alt="" class="explore-img w-100">
                                        <div class="bg-overlay"></div>
                                        <div class="place-bid-btn">
                                            <a href="#!" class="btn btn-success"><i class="ri-auction-fill align-bottom me-1"></i> Place Bid</a>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="fs-16 mb-0"><a href="apps-nft-item-details.html">Patterns arts &amp; culture</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>

            <section class="section bg-light" id="marketplace">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h2 class="mb-3 fw-semibold lh-base">Categorias</h2>
                                <p class="text-muted mb-4">Collection widgets specialize in displaying many elements of the same type, such as a collection of pictures from a collection of articles.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-lg-4 product-item artwork crypto-card 3d-style">
                                <div class="card explore-box card-animate">
                                    <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                                        <button type="button" class="btn btn-icon active" data-bs-toggle="button" aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                                    </div>
                                    <div class="explore-place-bid-img">
                                        @if ($category->photo_category)
                                            <img src="{{ asset('public/' . $category->photo_category) }}" alt="" class="card-img-top explore-img">
                                        @else
                                            <img src="{{ asset('assets/images/sin-foto.png') }}" alt="" class="card-img-top explore-img">
                                        @endif
                                        <div class="bg-overlay"></div>
                                        <div class="place-bid-btn d-flex justify-content-between">
                                            @php
                                                $routeName = '';
                                                switch ($category->name_category) {
                                                    case 'Pizzas':
                                                        $routeName = route('dashboard_menu');
                                                        break;
                                                    case 'Bebidas':
                                                        $routeName = route('dashboard_menu_bebidas');
                                                        break;
                                                    case 'Cocteles':
                                                        $routeName = route('dashboard_menu');
                                                        break;
                                                    default:
                                                        $routeName = route('details.category', ['category' => $category->id]);
                                                        break;
                                                }
                                            @endphp
                                            <a href="{{ $routeName }}" class="btn btn-info me-1"><i class="ri-eye-fill align-bottom me-1"></i>Ver productos</a>
                                            {{-- <a href="#!" class="btn btn-warning"><i class="ri-shopping-cart-fill align-bottom me-1"></i></a> --}}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{-- <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i> 19.29k </p> --}}
                                        <h5 class="mb-1"><a href="{{ route('details.category', ['category' => $category->id]) }}">{{ $category->name_category }}</a></h5>
                                        {{-- <p class="text-muted mb-0">Photography</p> --}}
                                    </div>
                                    {{-- <div class="card-footer border-top border-top-dashed">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 fs-14">
                                                <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i> Total de productos: <span class="fw-medium"></span>
                                            </div>
                                            <h5 class="flex-shrink-0 fs-14 text-primary mb-0">0</h5>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>

<footer class="custom-footer bg-dark py-5 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4">
                <div>
                    <div>
                        <img src="assets/images/logo-light.png" alt="logo light" height="17">
                    </div>
                    <div class="mt-4">
                        <p>Premium Multipurpose Admin &amp; Dashboard Template</p>
                        <p>You can build any type of web application like eCommerce, CRM, CMS, Project management apps, Admin Panels, etc using Velzon.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 ms-lg-auto">
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Company</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="pages-profile.html">About Us</a></li>
                                <li><a href="pages-gallery.html">Gallery</a></li>
                                <li><a href="apps-projects-overview.html">Projects</a></li>
                                <li><a href="pages-timeline.html">Timeline</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Apps Pages</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="pages-pricing.html">Calendar</a></li>
                                <li><a href="apps-mailbox.html">Mailbox</a></li>
                                <li><a href="apps-chat.html">Chat</a></li>
                                <li><a href="apps-crm-deals.html">Deals</a></li>
                                <li><a href="apps-tasks-kanban.html">Kanban Board</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Support</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="pages-faqs.html">FAQ</a></li>
                                <li><a href="pages-faqs.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row text-center text-sm-start align-items-center mt-5">
            <div class="col-sm-6">

                <div>
                    <p class="copy-rights mb-0">
                        <script> document.write(new Date().getFullYear()) </script>2024 © Velzon - Themesbrand
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end mt-3 mt-sm-0">
                    <ul class="list-inline mb-0 footer-social-link">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-facebook-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-github-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-linkedin-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-google-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-dribbble-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

</div>

@endsection
