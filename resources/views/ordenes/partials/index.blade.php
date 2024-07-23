<div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
    <div class="file-manager-sidebar">
        <div class="p-4 d-flex flex-column h-100">
            <div class="mb-3">
                {{-- <button class="btn btn-success w-100" data-bs-target="#modalRegistrar" data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Agregar deuda</button> --}}
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
                                    @if ($product->estado == 1) <!-- Mostrar solo productos con estado 1 -->
                                        <tr>
                                            <td>{{ 'Cliente ' . $counter }}</td>
                                            <td>{{ $product->productName }}</td>
                                            <td>{{ $product->selectedPrice }}</td>
                                            <td>
                                                @if ($product->estado == 1)
                                                    <span class="badge bg-warning text-uppercase">Pendiente</span>
                                                @elseif ($product->estado == 0)
                                                    <span class="badge bg-success text-uppercase">Cancelado</span>
                                                @else
                                                    <span class="badge bg-danger text-uppercase">Error de estado</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="#" class="link-primary"><i class="ri-edit-2-fill"></i></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteProduct" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                    @if ($product->estado == 1)
                                                        <form action="{{ route('jsonData.updateStatus', ['id' => $data->id, 'status' => 0]) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="link-info border-0 bg-transparent"><i class="ri-refresh-line"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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
