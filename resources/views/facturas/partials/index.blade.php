<div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
    <div class="file-manager-sidebar">
        <div class="p-4 d-flex flex-column h-100">
            <div class="mb-3">
                <button class="btn btn-secondary w-100" data-bs-target="#modalRegistrar" data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Agregar factura</button>
            </div>

            <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 468px);">
                <ul class="to-do-menu list-unstyled" id="projectlist-data">
                    <li>
                        <a data-bs-toggle="collapse" href="#velzonAdmin" class="nav-link fs-13 active">Documentos</a>
                        <div class="collapse show" id="velzonAdmin">
                            <ul class="mb-0 sub-menu list-unstyled ps-3 vstack gap-2 mb-2">
                                <li>
                                    <a href="#" class="btn btn-success btn-sm"><i class="ri-file-excel-2-line fs-12"></i> Solo facturas</a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-success btn-sm"><i class="ri-file-excel-2-line fs-12"></i> Facturas + clientes</a>
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
            <form action="{{ route('facturas.busquedas') }}" method="GET">
                <div class="row g-2">
                    <div class="col-lg-auto">
                        <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-lg-auto">
                        <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-lg">
                        <input type="text" class="form-control" name="nombres_clientes" placeholder="Buscar por nombre del cliente" value="{{ request('nombres_clientes') }}">
                    </div>
                    <div class="col-lg-auto">
                        <select class="form-control" name="metodo_pago">
                            <option value="">Todos los métodos de pago</option>
                            <option value="Yape" {{ request('metodo_pago') == 'Yape' ? 'selected' : '' }}>Yape</option>
                            <option value="Plin" {{ request('metodo_pago') == 'Plin' ? 'selected' : '' }}>Plin</option>
                            <option value="Efectivo" {{ request('metodo_pago') == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                            <option value="Transferencia" {{ request('metodo_pago') == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                        </select>
                    </div>
                    {{-- <div class="col-lg-auto">
                        <select class="form-control" name="status_factura">
                            <option value="">Todos los estados</option>
                            <option value="1" {{ request('status_factura') == '1' ? 'selected' : '' }}>Pagado</option>
                            <option value="0" {{ request('status_factura') == '0' ? 'selected' : '' }}>Pendiente</option>
                        </select>
                    </div> --}}
                    <div class="col-lg-auto">
                        <button type="submit" class="btn btn-primary">Buscar <i class="ri-search-line"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="todo-content position-relative px-4 mx-n4" id="todo-content">
            <div class="todo-task" id="todo-task">
                <div class="table-responsive">
                    <table class="table align-middle position-relative table-nowrap">
                        <thead class="table-active">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre de cliente</th>
                                <th scope="col">Fecha registrado</th>
                                <th scope="col">T. de productos</th>
                                <th scope="col">Metodo de pago</th>
                                <th scope="col">Total</th>
                                {{-- <th scope="col">Estado</th> --}}
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
                                        <td><b>{{ $factura->name_mesa }}</b></td>
                                        <td>
                                            @if ($factura->nombres_clientes)
                                                <span class="badge bg-info text-uppercase">{{ $factura->nombres_clientes }}</span>
                                            @elseif (empty($factura->nombres_clientes))
                                                <span class="badge bg-danger text-uppercase">Sin nombres del cliente</span>
                                            @else
                                                <span class="badge bg-warning text-uppercase">Error de activación</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($factura->created_at)->locale('es')->isoFormat('MMMM D \d\e YYYY, h:mm A') }}</td>
                                        <td>{{ $factura->relations->count() }} unidades</td>
                                        <td>
                                            @switch($factura->metodo_pago)
                                                @case('Yape')
                                                    <span class="badge bg-primary text-uppercase">Yape</span>
                                                    @break
                                                @case('Plin')
                                                    <span class="badge bg-secondary text-uppercase">Plin</span>
                                                    @break
                                                @case('Efectivo')
                                                    <span class="badge bg-success text-uppercase">Efectivo</span>
                                                    @break
                                                @case('Transferencia')
                                                    <span class="badge bg-warning text-uppercase">Transferencia</span>
                                                    @break
                                                @default
                                                    {{ $factura->metodo_pago }}
                                            @endswitch
                                        </td>
                                        <td>S/. {{ $factura->relations->sum('price_product_factura') }}</td>
                                        {{-- <td>
                                            @if ($factura->status_factura == 1)
                                                <span class="badge bg-success text-uppercase">Pagado</span>
                                            @elseif ($factura->status_factura)
                                                <span class="badge bg-danger text-uppercase">Pendiente</span>
                                            @else
                                                <span class="badge bg-warning text-uppercase">Error de activación</span>
                                            @endif
                                        </td> --}}
                                        <td>
                                            <div class="hstack gap-2">
                                                <a href="#" class="btn btn-sm btn-soft-primary edit-list"><i class="ri-eye-fill align-bottom"></i> Ver factura </a>
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
          <h5 class="modal-title" id="exampleModalLabel">Registrar factutas</h5>
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

                    <div class="col-lg-5">
                        <label for="customer_name" class="form-label">Nombre del cliente<span class="text-danger">(opcional)</span></label>
                        <input type="text" name="nombres_clientes" class="form-control" />
                    </div>

                    <div class="col-lg-3">
                        <label for="customer_name" class="form-label">Metodo de pago<span class="text-danger">*</span></label>
                        <select name="metodo_pago" class="form-control" required>
                            <option value="">Seleccione un metodo</option>
                            <option value="Yape">Yape</option>
                            <option value="Plin">Plin</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                        </select>
                    </div>

                    <hr>

                    <div class="mb-3 d-flex justify-content-end mt-2">
                        <a href="#" class="btn btn-info add-product">Agregar consumos +</a>
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

                        <div class="col-lg-3">
                            <label for="size" class="form-label">Tamaño<span class="text-danger">*</span></label>
                            <select name="size_product_factura[]" class="form-control" required>
                                <option value="">Seleccione el tamaño</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Familiar">Familiar</option>
                                <option value="1 L">1 L</option>
                                <option value="600 ml">600 ml</option>
                                <option value="Personal">Personal</option>
                                <option value="Chicha 1L">Chicha 1L</option>
                                <option value="Chicha 500 ml">Chicha 500 ml</option>
                            </select>
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

                        <div class="col-lg-1" style="margin-top: 42px">
                            <a href="#" class="btn btn-danger remove-product"><i class="ri-delete-bin-fill"></i></a>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="total_factura" id="total_factura" value="0" />

                <div class="hstack gap-2 justify-content-end" style="margin-top: 50px">
                    <button type="button" class="btn btn-ghost-primary" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="addNewProject">Guardar</button>
                </div>
            </form>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const productContainer = document.getElementById('product-container');

                function addProductSet() {
                    const lastProductSet = productContainer.lastElementChild;
                    const newProductSet = lastProductSet.cloneNode(true);

                    const inputs = newProductSet.querySelectorAll('input, select');
                    inputs.forEach(input => {
                        if (input.type === 'text' || input.type === 'number') {
                            input.value = '';
                        } else if (input.type === 'hidden') {
                            input.value = '0.18';
                        }
                    });

                    newProductSet.querySelector('input[type="text"]').value = '18%';

                    productContainer.appendChild(newProductSet);
                }

                document.querySelector('.add-product').addEventListener('click', function(e) {
                    e.preventDefault();
                    addProductSet();
                });

                productContainer.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-product')) {
                        e.preventDefault();
                        const productSet = e.target.closest('.product-set');
                        if (productSet) {
                            productContainer.removeChild(productSet);
                        }
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
