@extends('layouts.admin-sidebar')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Permisos</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Roles</a></li>
                    <li class="breadcrumb-item active">Permisos</li>
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
                        <h4 class=" mb-0"><span></span></h4>
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
                            <i class="bx bxs-user-account align-middle"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total de permisos</p>
                        <h4 class=" mb-0"><span></span></h4>
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
                            <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#createPermission"><i class="ri-add-fill me-1 align-bottom"></i> Agregar permisos</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div class="">
                        <table class="table align-middle table-nowrap mb-0" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th data-sort="Grupo" scope="col">Grupo</th>
                                    <th data-sort="Permiso" scope="col">Permiso</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @if($permisos->isEmpty())
                                    <tr>
                                        <td class="text-center" colspan="3">Permission not registered</td>
                                    </tr>
                                @else
                                    @foreach($permisos as $permiso)
                                        <tr>
                                            <td>{{ $permiso->grupo }}</td>
                                            <td>{{ $permiso->permiso }}</td>
                                            <td>
                                                <div class="hstack gap-2">
                                                    <button class="btn btn-sm btn-soft-info remove-list" data-bs-toggle="modal" data-bs-target="#removeTaskItemModal" data-remove-id="16"><i class="bx bx-block align-bottom"></i></button>
                                                    <button class="btn btn-sm btn-soft-danger remove-list" data-bs-toggle="modal" data-bs-target="#removeTaskItemModal" data-remove-id="16"><i class="bx bx-block align-bottom"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $permisos->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fadeInLeft" id="createPermission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header bg-soft-info p-3">
                <h5 class="modal-title" id="exampleModalLabel">Add Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="{{ route('permisos.store') }}" method="post" class="tablelist-form needs-validation" autocomplete="off" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <label for="grupo" class="form-label">Groups</label>
                            <input type="text" id="grupo" name="grupo" class="form-control" placeholder="Enter groups" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback text-end">
                                The Groups is necessary
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label for="permiso" class="form-label">Permission</label>
                            <input type="text" id="permiso" name="permiso" class="form-control" placeholder="Enter permission" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback text-end">
                                The Permission is necessary
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add Contact</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
