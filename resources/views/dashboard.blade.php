@extends('layouts.admin-sidebar')
@section('content')

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/dayjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/locale/es.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .toast.success {
        background-color: #007bff; /* Azul */
        color: #fff;
    }
    .toast.success .toast-title {
        color: #fff;
    }
</style>


@php
    $user = auth()->user();
    $hora = now()->hour;
    $saludo = '';

    if ($hora >= 5 && $hora < 12) {
        $saludo = 'Buenos días';
    } elseif ($hora >= 12 && $hora < 24) {
        $saludo = 'Buenas tardes';
    } else {
        $saludo = 'Buenas madrugadas';
    }
@endphp

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">{{ $saludo }}, {{ Auth::user()->name }}!</h4>
                                        <p class="text-muted mb-0">Esto es lo que tienes en tu cuenta el día de hoy.</p>
                                    </div>
                                    <div class="mt-3 mt-lg-0">
                                        <form action="javascript:void(0);">
                                            <div class="row g-3 mb-0 align-items-center">
                                                <div class="col-sm-auto">
                                                    <div class="input-group">
                                                        <input id="hora-actual" type="text" class="form-control border-0 dash-filter-picker shadow">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-auto">
                                                    <button type="button" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i> <a href="{{ route('exportToExcel') }}"> Hacer reporte general</a></button>
                                                </div>
                                                <!--end col-->
                                                <div class="col-auto">
                                                    <button type="button" class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="ri-pulse-line"></i></button>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total facturaciones</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">S/. <span>{{ $totalIngresos ?? 0 }}</span> </h4>
                                                <a href="{{ route('facturas.index') }}" class="text-decoration-underline">Ver detalles</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-success-subtle rounded fs-3">
                                                    <i class="bx bx-dollar-circle text-success"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Delivery</p>
                                            </div>
                                            {{-- <div class="flex-shrink-0">
                                                <h5 class="text-muted fs-14 mb-0">
                                                    +0.00 %
                                                </h5>
                                            </div> --}}
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">S/. {{ $totalPriceAll ?? 0}} <span></span></h4>
                                                <a href="{{ route('ordenes.index') }}" class="text-decoration-underline">Ver detalles</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                    <i class="bx bx-cart text-warning"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Clientes registrados</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{ $usersTotal ?? 0}}</span> </h4>
                                                <a href="#" class="text-decoration-underline">Ver detalles</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                    <i class="bx bx-user-circle text-white"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                             <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Ordenes delivery</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{ $totalOrdenes ?? 0}}</span></h4>
                                                <a href="{{ route('ordenes.index') }}" class="text-decoration-underline">Ver detalles</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-info-subtle rounded fs-3">
                                                    <i class="bx bx-shopping-bag text-info"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                        </div> <!-- end row-->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Productos en la carta</h4>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown">
                                                <button type="button" class="btn btn-soft-info btn-sm">
                                                    <i class="ri-file-list-3-line align-middle"></i> <a href="{{ route('exportProductToExcel')}}">Generar reporte</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                                <tbody>
                                                    @if($facturas->isEmpty())
                                                        <tr>
                                                            <td colspan="12" class="text-center">Productos sin registrar</td>
                                                        </tr>
                                                    @else
                                                    @foreach ($products as $product)
                                                        @foreach ($product->multipleProducts as $multipleProduct)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                            <img src="{{ asset('public/' . $product->photo_product) }}" alt="" class="img-fluid d-block">
                                                                        </div>
                                                                        <div>
                                                                            <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">{{ $product->name_product }}</a></h5>
                                                                            <span class="text-muted">
                                                                                {{ $product->category->name_category }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 my-1 fw-normal">{{ $multipleProduct->size_product_multiple }}</h5>
                                                                    <span class="text-muted">Tamaño</span>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 my-1 fw-normal">S/. {{ $multipleProduct->price_product_multiple }}</h5>
                                                                    <span class="text-muted">Precio</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                            {{ $products->links() }}
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card card-height-100">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Facturas recientes</h4>
                                        {{-- <button type="button" class="btn btn-soft-info btn-sm">
                                            <i class="ri-file-list-3-line align-middle"></i> <a href="{{ route('exportFacturaToExcel') }}"> Generar reporte</a>
                                        </button> --}}
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                                <tbody>
                                                    @if($facturas->isEmpty())
                                                        <tr>
                                                            <td colspan="4" class="text-center">Facturas sin registrar</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($facturas as $factura)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div>
                                                                            <h5 class="fs-14 my-1 fw-medium">
                                                                                <a href="#" class="text-reset">
                                                                                    @if($factura->nombres_clientes)
                                                                                        <span class="text-center badge bg-info">{{ $factura->nombres_clientes }}</span>
                                                                                    @else
                                                                                        <span class="badge bg-danger">Sin nombre</span>
                                                                                    @endif
                                                                                </a>
                                                                            </h5>
                                                                            <span class="text-muted"><b>{{ $factura->name_mesa }}</b></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span class="text-muted">{{ \Carbon\Carbon::parse($factura->created_at)->locale('es')->isoFormat('MMMM D \d\e YYYY, h:mm A') }}</span>
                                                                </td>
                                                                <td>
                                                                    <p class="mb-0">{{ $factura->metodo_pago }}</p>
                                                                    <span class="text-muted">M. de pago</span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-muted">{{ $factura->relations->count() }} unidades</span>
                                                                </td>
                                                            </tr>
                                                            @foreach ($factura->relations as $relation)
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>{{ $relation->nombre_producto }}</td>
                                                                    <td>{{ $relation->cantidad }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                            <div class="col-sm">
                                                <div class="text-muted">
                                                    {{-- {{ $facturas->links() }} --}}
                                                </div>
                                            </div>
                                        </div>

                                    </div> <!-- .card-body-->
                                </div> <!-- .card-->
                            </div>
                        </div> <!-- end row-->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Clientes</h4>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-soft-info btn-sm">
                                                <i class="ri-file-list-3-line align-middle"></i> Generar reporte
                                            </button>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                <thead class="text-muted table-light">
                                                    <tr>
                                                        <th scope="col">Codigo de cliente</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Estado</th>
                                                        <th scope="col">Correo Electronico</th>
                                                        <th scope="col">Verificacion de correo</th>
                                                        <th scope="col">Rol</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($users->isEmpty())
                                                        <tr>
                                                            <td colspan="12" class="text-center">No hay clientes registrados</td>
                                                        </tr>
                                                    @else
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td>
                                                                <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2112</a>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-2">
                                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle">
                                                                    </div>
                                                                    <div class="flex-grow-1">{{ $user->name }}</div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if($user->status_user)
                                                                    <span class="badge bg-info">Cliente registrado</span>
                                                                @else
                                                                    <span class="badge bg-danger">Error</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="text-success">{{ $user->email }}</span>
                                                            </td>
                                                            <td>
                                                                @if($user->email_verified_at == null || $user->email_verified_at == '0')
                                                                    <span class="badge bg-danger">Sin verificación</span>
                                                                @else
                                                                    <span class="badge bg-success">Verificado</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @foreach ($user->roles as $role)
                                                                    <span class="badge bg-success-subtle text-success">{{ $role->role }}</span>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                        {{-- {{ $users->links() }} --}}
                                    </div>
                                </div> <!-- .card-->
                            </div> <!-- .col-->
                        </div> <!-- end row-->

                    </div> <!-- end .h-100-->

                </div> <!-- end col -->


            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

</div>

<style>
    .offcanvas, .offcanvas-lg, .offcanvas-md, .offcanvas-sm, .offcanvas-xl, .offcanvas-xxl {
    --vz-offcanvas-zindex: 1045;
    --vz-offcanvas-width: 780px;
    --vz-offcanvas-height: 30vh;
    --vz-offcanvas-padding-x: 1.25rem;
    --vz-offcanvas-padding-y: 1.25rem;
    --vz-offcanvas-bg: #fff;
    --vz-offcanvas-border-width: 1px;
    --vz-offcanvas-border-color: var(--vz-border-color);
    --vz-offcanvas-box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}
</style>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Offcanvas Right</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>

        <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        <script type="text/javascript">
            window.onload = function () {
                var dataPoints = @json($dataPoints);

                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Ingresos Mensuales"
                    },
                    data: [
                        {
                            type: "line",
                            dataPoints: dataPoints
                        }
                    ]
                });

                chart.render();
            }
        </script>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    toastr.options = {
        "toastClass": "toast success" // Aplica la clase personalizada
    };

    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @elseif (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif
</script>

<script>
    const horaActualInput = document.getElementById('hora-actual');

    function obtenerHoraActual() {
        const ahora = new Date();
        let horas = ahora.getHours();
        let minutos = ahora.getMinutes();
        let segundos = ahora.getSeconds();
        const ampm = horas >= 12 ? 'PM' : 'AM';
        horas = horas % 12;
        horas = horas ? horas : 12;
        minutos = minutos < 10 ? '0' + minutos : minutos;
        segundos = segundos < 10 ? '0' + segundos : segundos;
        const horaFormateada = horas + ':' + minutos + ':' + segundos + ' ' + ampm;
        return horaFormateada;
    }

    function actualizarHora() {
        const horaActual = obtenerHoraActual();
        horaActualInput.value = horaActual;
    }

    actualizarHora();

    setInterval(actualizarHora, 1000);
</script>

@endsection
