@extends('layouts.admin-sidebar')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Modulos de empleados</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Roles</a></li>
                                <li class="breadcrumb-item active">Modulos de empleados</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                        <i class="bx bx-user-pin align-middle"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total de perfiles</p>
                                    <h4 class=" mb-0"><span>0</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                        <i class="bx bx-check align-middle"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total de permisos</p>
                                    <h4 class=" mb-0"><span>0</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xxl-12">
                <div class="card" id="contactList">
                    <div class="card-header">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="search-box">
                                    <input type="text" class="form-control search" placeholder="Buscar...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-auto ms-auto">
                                <div class="flex-grow-1">
                                    <button class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#createProfiles"><i class="ri-add-fill me-1 align-bottom"></i> Agregar perfiles</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="table-responsive table-card mb-3">
                                <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="font-size: 12px;" scope="col">Nombre</th>
                                            <th style="font-size: 12px;" scope="col">Email</th>
                                            <th style="font-size: 12px;" scope="col">Email verificado</th>
                                            <th style="font-size: 12px;" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @if($clientes->isEmpty())
                                            <tr>
                                                <td class="text-center" colspan="12" style="font-size: 15px">Aun no tiene empleados registrados</td>
                                            </tr>
                                        @else
                                            @foreach( $clientes as $cliente )
                                                <tr>
                                                    <td style="font-size: 12px;">{{ $cliente->name }}</td>
                                                    <td style="font-size: 12px;">{{ $cliente->email }}</td>
                                                    <td style="font-size: 12px;">{{ $cliente->email_verified_at }}</td>
                                                    <td>
                                                        <div class="hstack gap-2">
                                                            <a href="#" class="btn btn-sm btn-soft-primary remove-list" data-bs-toggle="modal" data-bs-target="#editProfiles"><i class="bx bx-edit align-bottom"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{ $clientes->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fadeInLeft" id="createProfiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-soft-info p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="#" method="post" class="tablelist-form needs-validation" autocomplete="off" novalidate>
                            @csrf
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <label for="role" class="form-label">Perfil</label>
                                        <input type="text" id="role" name="role" class="form-control" placeholder="Ingresar perfiles" required />
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback text-end">
                                            The perfil is necessary
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="role" class="form-label">Acesso admin</label>
                                        <select id="acceso_admin" name="acceso_admin" class="form-control" required>
                                            <option value="" disabled selected>Seleccionar accesso</option>
                                            <option value="0">No access</option>
                                            <option value="1">Access</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endsection
        </div>
    </div>
</div>

