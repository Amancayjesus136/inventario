@extends('layouts.admin-sidebar')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Facturas</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Facturas</a></li>
                                <li class="breadcrumb-item active">Listado</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            @include('facturas.partials.index')

        </div>
    </div>
</div>



@endsection
