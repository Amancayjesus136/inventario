<div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
    <div class="file-manager-sidebar">
        <div class="p-4 d-flex flex-column h-100">
            <div class="mb-3">
                <button class="btn btn-success w-100" data-bs-target="#modalRegistrar" data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Agregar deuda</button>
            </div>

            <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 468px);">
                <ul class="to-do-menu list-unstyled" id="projectlist-data">
                    <li>
                        <a data-bs-toggle="collapse" href="#velzonAdmin" class="nav-link fs-13 active">Velzon Admin & Dashboard</a>
                        <div class="collapse show" id="velzonAdmin">
                            <ul class="mb-0 sub-menu list-unstyled ps-3 vstack gap-2 mb-2">
                                <li>
                                    <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-danger"></i> v1.4.0</a>
                                </li>
                                <li>
                                    <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-secondary"></i> v1.5.0</a>
                                </li>
                                <li>
                                    <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-info"></i> v1.6.0</a>
                                </li>
                                <li>
                                    <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-primary"></i> v1.7.0</a>
                                </li>
                                <li>
                                    <a href="#!"><i class="ri-stop-mini-fill align-middle fs-15 text-warning"></i> v1.8.0</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>


            <div class="mt-auto text-center">
                <img src="{{ asset('assets/images/task.png') }}" alt="Task" class="img-fluid" />
            </div>
        </div>
    </div>
    <div class="file-manager-content w-100 p-4 pb-0">
        <div class="row mb-4">
            <div class="col-auto order-1 d-block d-lg-none">
                <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                    <i class="ri-menu-2-fill align-bottom"></i>
                </button>
            </div>
        </div>

        <div class="p-3 bg-light rounded mb-4">
            <div class="row g-2">
                <div class="col-lg-auto">
                    <select class="form-control" data-choices data-choices-search-false name="choices-select-sortlist" id="choices-select-sortlist">
                        <option value="">Sort</option>
                        <option value="By ID">By ID</option>
                        <option value="By Name">By Name</option>
                    </select>
                </div>
                <div class="col-lg-auto">
                    <select class="form-control" data-choices data-choices-search-false name="choices-select-status" id="choices-select-status">
                        <option value="">All Tasks</option>
                        <option value="Completed">Completed</option>
                        <option value="Inprogress">Inprogress</option>
                        <option value="Pending">Pending</option>
                        <option value="New">New</option>
                    </select>
                </div>
                <div class="col-lg">
                    <div class="search-box">
                        <input type="text" id="searchTaskList" class="form-control search" placeholder="Search task name">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <button class="btn btn-primary createTask" type="button" data-bs-toggle="modal" data-bs-target="#createTask">
                        <i class="ri-add-fill align-bottom"></i> Add Tasks
                    </button>
                </div>
            </div>
        </div>

        <div class="todo-content position-relative px-4 mx-n4" id="todo-content">
            <div class="todo-task" id="todo-task">
                <div class="table-responsive">
                    <table class="table align-middle position-relative table-nowrap">
                        <thead class="table-active">
                            <tr>
                                <th scope="col">Nombre categoria</th>
                                <th scope="col">Referencia</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody id="task-list">

                            @if ($categories->isEmpty())
                                <tr>
                                    <td colspan="12" class="text-center">No hay categorias registradas</td>
                                </tr>
                            @else
                                @foreach ($categories as $category)
                                    <tr>

                                        <td>{{ $category->name_category }}</td>
                                        <td>
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm bg-light rounded p-1">
                                                    @if ($category->photo_category)
                                                        <img src="{{ asset('public/' . $category->photo_category) }}" alt="" class="img-fluid d-block">
                                                    @else
                                                        <img src="{{ asset('assets/images/sin-foto.png') }}" alt="" class="img-fluid d-block">
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if ($category->status_category == 1)
                                                <span class="badge bg-success text-uppercase">Activado</span>
                                            @elseif ($category->status_category)
                                                <span class="badge bg-danger text-uppercase">Desactivado</span>
                                            @else
                                                <span class="badge bg-warning text-uppercase">Error de activación</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="hstack gap-2">
                                                <a href="#" class="btn btn-sm btn-soft-success edit-list"><i class="ri-eye-fill align-bottom"></i></a>
                                                <button class="btn btn-sm btn-soft-info edit-list" data-bs-toggle="modal" data-bs-target="#createTask" data-edit-id="#"><i class="ri-pencil-fill align-bottom"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade zoomIn" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered   ">
      <div class="modal-content">
        <div class="modal-header p-3 bg-soft-primary">
          <h5 class="modal-title" id="exampleModalLabel">Registrar categorias</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="{{ route('categories.store') }}" method="POST" class="tablelist-form needs-validation" alt="user-profile-image" enctype="multipart/form-data" autocomplete="off" novalidate>
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img id="user-profile-image" src="{{ asset('assets/images/sin-foto.png') }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                <input id="profile-img-file-input" name="photo_category" type="file" accept="image/*" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <label for="category" class="form-label">Nombres de categoría<span class="text-danger">*</span></label>
                        <input type="text" name="name_category" class="form-control" placeholder="Ingresar nombre de la categoría" required />
                    </div>

                </div>

                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-ghost-primary" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="addNewProject">Guardar</button>
                </div>
            </form>

        </div>
      </div>
    </div>
  </div>


  <script>
    (function () {
        'use strict';

        var forms = document.querySelectorAll('.tablelist-form');

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
    })();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('profile-img-file-input').addEventListener('change', function (e) {
            var selectedImage = e.target.files[0];

            if (selectedImage) {
                var imageUrl = URL.createObjectURL(selectedImage);

                document.getElementById('user-profile-image').src = imageUrl;
            }
        });
    });
</script>


