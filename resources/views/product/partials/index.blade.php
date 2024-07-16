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
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Fecha creado</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descuentos</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody id="task-list">

                            @if ($products->isEmpty())
                                <tr>
                                    <td colspan="12" class="text-center">No hay productos registradas</td>
                                </tr>
                            @else
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <div class="flex-grow-1"><h5 class="fs-14 mb-1"><a href="apps-ecommerce-product-details.html" class="text-body">{{ $product->name_product}}</a></h5>
                                        <p class="text-muted mb-0">Categoría : <span class="fw-medium">{{ $product->category->name_category }}</span></p></div>
                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#verProduct{{ $product->id_product }}">
                                            <div class="avatar-sm bg-light rounded p-1">
                                                @if ($product->photo_product)
                                                    <img src="{{ asset('storage/' . $product->photo_product) }}" alt="" class="img-fluid d-block">
                                                @else
                                                    <img src="{{ asset('assets/images/sin-foto.png') }}" alt="" class="img-fluid d-block">
                                                @endif
                                            </div>
                                        </a>
                                    </td>

                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td>

                                    <td>{{ $product->price_product}}</td>
                                    <td>
                                        @if($product->dicount_product)
                                            <span class="text-center">{{ $product->dicount_product }} %</span>
                                        @else
                                            <span class="badge bg-info">Sin descuento</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="hstack gap-3 fs-15">
                                            <a href="#" class="link-primary"><i class="ri-edit-2-fill"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteProduct{{ $product->id_product }}" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                        </div>
                                    </td>
                                </tr>s

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

            <form action="{{ route('products.store') }}" method="POST" class="tablelist-form needs-validation" alt="user-profile-image" enctype="multipart/form-data" autocomplete="off" novalidate>
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img id="user-profile-image" src="{{ asset('assets/images/sin-foto.png') }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                <input id="profile-img-file-input" name="photo_product" type="file" accept="image/*" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="name_product" class="form-label">Nombre del producto<span class="text-danger">*</span></label>
                        <input type="text" name="name_product" class="form-control" placeholder="Ingresar nombre del producto" required />
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="category_product" class="form-label">Tipo<span class="text-danger">*</span></label>
                        <select name="filtro_product" class="form-control" required>
                            <option value="" disabled selected>Selecciona ...</option>
                                <option value="Clasicas">Clasicas</option>
                                <option value="Especiales">Especiales</option>
                                <option value="Entradas">Entradas</option>
                                <option value="Promociones">Promociones</option>
                        </select>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="category_product" class="form-label">Categoría<span class="text-danger">*</span></label>
                        <select name="category_product" class="form-control" required>
                            <option value="" disabled selected>Selecciona categoría...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_category }}">{{ $category->name_category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="input-container" class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="size_product_multiple" class="form-label">Tamaño<span class="text-danger">*</span></label>
                                    <select name="size_product_multiple[]" class="form-control" required>
                                        <option value="" disabled selected>Seleccionar tamaño...</option>
                                        <option value="Mediana">Mediana</option>
                                        <option value="Familiar">Familiar</option>
                                    </select>
                                </div>

                                <div class="col-lg-3">
                                    <label for="price_product_multiple" class="form-label">Precio<span class="text-danger">*</span></label>
                                    <input type="text" name="price_product_multiple[]" class="form-control" placeholder="Ingresar el precio" required />
                                </div>

                                <div class="col-lg-3">
                                    <label for="discount_product_multiple" class="form-label">Descuentos<span class="text-danger">*</span></label>
                                    <input type="text" name="discount_product_multiple[]" class="form-control" placeholder="Ingresar el descuento" required />
                                </div>

                                <div class="col-lg-2" style="margin-top: 30px">
                                    <a href="#" id="add-button" class="btn btn-primary">Agregar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="additional-inputs" class="row"></div>

                    <div class="col-lg-12">
                        <label for="description_product" class="form-label">Descripción<span class="text-danger">*</span></label>
                        <input type="text" name="description_product" class="form-control" placeholder="Ingresar la descripción" required />
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
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('add-button');
        const inputContainer = document.getElementById('input-container');
        const additionalInputs = document.getElementById('additional-inputs');
        let inputCount = 0; // Contador para limitar la cantidad de duplicados

        addButton.addEventListener('click', function(event) {
            event.preventDefault();

            if (inputCount >= 2) {
                alert('Solo se pueden agregar un máximo de 2 conjuntos de campos.');
                return;
            }

            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'col-lg-12 mt-3';
            newInputGroup.innerHTML = `
                <div class="row">
                    <div class="col-lg-4">
                        <label for="category" class="form-label">Tamaño<span class="text-danger">*</span></label>
                        <select name="size_product_multiple[]" class="form-control" required>
                            <option value="" disabled selected>Seleccionar tamaño...</option>
                            <option value="Mediana">Mediana</option>
                            <option value="Familiar">Familiar</option>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="category" class="form-label">Precio<span class="text-danger">*</span></label>
                        <input type="text" name="price_product_multiple[]" class="form-control" placeholder="Ingresar el precio" required />
                    </div>

                    <div class="col-lg-3">
                        <label for="category" class="form-label">Descuentos<span class="text-danger">*</span></label>
                        <input type="text" name="discount_product_multiple[]" class="form-control" placeholder="Ingresar el descuento" required />
                    </div>

                    <div class="col-lg-2" style="margin-top: 30px">
                        <a href="#" class="btn btn-danger delete-button">Eliminar</a>
                    </div>
                </div>
            `;

            // Añadir evento de eliminar al botón
            const deleteButton = newInputGroup.querySelector('.delete-button');
            deleteButton.addEventListener('click', function(event) {
                event.preventDefault();
                newInputGroup.remove();
                inputCount--;
            });

            additionalInputs.appendChild(newInputGroup);
            inputCount++;
        });
    });
</script>


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
