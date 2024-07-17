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

                            @if ($facturas->isEmpty())
                                <tr>
                                    <td colspan="12" class="text-center">No hay facturas registradas</td>
                                </tr>
                            @else
                                @foreach ($facturas as $factura)
                                    <tr>

                                        <td>{{ $factura->name_category }}</td>

                                        <td>
                                            @if ($factura->status_category == 1)
                                                <span class="badge bg-success text-uppercase">Activado</span>
                                            @elseif ($factura->status_category)
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

            <form action="{{ route('facturas.store') }}" method="POST" class="tablelist-form needs-validation" alt="user-profile-image" enctype="multipart/form-data" autocomplete="off" novalidate>
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col-lg-4">
                        <label for="table" class="form-label">Mesa del cliente<span class="text-danger">*</span></label>
                        <select name="name_mesa" class="form-control" required>
                            <option value="">Seleccione una mesa</option>
                            <option value="Mesa 1">Mesa 1</option>
                            <option value="Mesa 2">Mesa 2</option>
                            <option value="Mesa 3">Mesa 3</option>
                            <option value="Mesa 4">Mesa 4</option>
                            <option value="Mesa 5">Mesa 5</option>
                            <option value="Mesa 6">Mesa 6</option>
                            <option value="Mesa 7">Mesa 7</option>
                            <option value="Mesa 8">Mesa 8</option>
                        </select>
                    </div>

                    <div class="col-lg-8">
                        <label for="customer_name" class="form-label">Nombre del cliente<span class="text-danger">(opcional)</span></label>
                        <input type="text" name="nombres_clientes" class="form-control" />
                    </div>
                </div>

                <div id="product-container">
                    <div class="row g-3 mb-3 product-set">
                        <div class="col-lg-4">
                            <label for="product" class="form-label">Producto<span class="text-danger">*</span></label>
                            <select name="name_product_factura[]" class="form-control product-select" required>
                                <option value="">Seleccione un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->name_product }}">{{ $producto->name_product }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <label for="size" class="form-label">Tamaño<span class="text-danger">*</span></label>
                            <input type="text" name="size_product_factura[]" class="form-control size-select" required />
                        </div>

                        <div class="col-lg-2">
                            <label for="price" class="form-label">Precio<span class="text-danger">*</span></label>
                            <input type="number" name="price_product_factura[]" class="form-control price-input" required />
                        </div>

                        <div class="col-lg-2">
                            <label for="igv" class="form-label">IGV. Incluido<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="18%" readonly />
                            <input type="hidden" name="igv_incluido[]" value="0.18" />
                        </div>

                        <div class="col-lg-2" style="margin-top: 42px">
                            <a href="#" class="btn btn-info add-product">Agregar +</a>
                            <a href="#" class="btn btn-danger remove-product" style="display: none;">Eliminar</a>
                        </div>
                    </div>
                </div>

                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-ghost-primary" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="addNewProject">Guardar</button>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const productContainer = document.getElementById('product-container');

                    const productsData = @json($productos);

                    productContainer.addEventListener('change', function(event) {
                        if (event.target.classList.contains('product-select')) {
                            const selectedProductId = event.target.value;
                            const productSet = event.target.closest('.product-set');
                            const sizeSelect = productSet.querySelector('.size-select');
                            const priceInput = productSet.querySelector('.price-input');

                            sizeSelect.innerHTML = '';
                            priceInput.value = '';

                            const selectedProduct = productsData.find(product => product.id == selectedProductId);
                            if (selectedProduct) {
                                selectedProduct.multiple_products.forEach(size => {
                                    const option = document.createElement('option');
                                    option.value = size.size_product_multiple;
                                    option.textContent = size.size_product_multiple;
                                    option.dataset.price = size.price;
                                    sizeSelect.appendChild(option);
                                });
                            }
                        }

                        if (event.target.classList.contains('size-select')) {
                            const selectedSize = event.target.value;
                            const priceInput = event.target.closest('.product-set').querySelector('.price-input');
                            const selectedOption = event.target.querySelector(`option[value="${selectedSize}"]`);
                            if (selectedOption) {
                                const price = selectedOption.dataset.price;
                                priceInput.value = price ? price : '';
                            }
                        }
                    });

                    document.querySelector('.add-product').addEventListener('click', function(event) {
                        event.preventDefault();
                        const productSet = document.querySelector('.product-set');
                        const newProductSet = productSet.cloneNode(true);

                        newProductSet.querySelector('.product-select').value = '';
                        newProductSet.querySelector('.size-select').value = '';
                        newProductSet.querySelector('.price-input').value = '';

                        newProductSet.querySelector('.size-select').innerHTML = '<option value="">Seleccione un tamaño</option>';

                        newProductSet.querySelector('.add-product').style.display = 'none';
                        newProductSet.querySelector('.remove-product').style.display = 'inline-block';
                        productContainer.appendChild(newProductSet);
                    });

                    productContainer.addEventListener('click', function(event) {
                        if (event.target.classList.contains('remove-product')) {
                            event.preventDefault();
                            event.target.closest('.product-set').remove();
                        }
                    });
                });

            </script>

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
