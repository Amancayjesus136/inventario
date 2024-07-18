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
                        <i class="ri-add-fill align-bottom"></i> Buscar
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
                                <th scope="col">Cliente externo</th>
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody id="task-list">
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($jsonData as $data)
                                @php
                                    $products = json_decode($data->json_data);
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ 'Cliente ' . $counter }}</td>
                                        <td>{{ $product->productName }}</td>
                                        <td>{{ $product->selectedPrice }}</td>
                                        {{-- <td>{{ $product->selectedSize }}</td> --}}
                                        <td>
                                            @if ($data->status_orden == 1)
                                                <span class="badge bg-warning text-uppercase">Pendiente</span>
                                            @elseif ($data->status_orden == 2)
                                                <span class="badge bg-success text-uppercase">Cancelado</span>
                                                @elseif ($data->status_orden == 0)
                                                <span class="badge bg-danger text-uppercase">Cancelado</span>
                                            @else
                                                <span class="badge bg-warning text-uppercase">Error de activación</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="hstack gap-3 fs-15">
                                                <a href="#" class="link-primary"><i class="ri-edit-2-fill"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteProduct" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        </tbody>

                    </table>

                </div>
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
