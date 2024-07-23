@extends('layouts.client.admin-user')
@section('content2')

<style>
    .section {
        padding: 30px 0;
        position: relative;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <section class="section bg-light" id="marketplace">
                        <div class="container">

                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="text-center mb-5">
                                        <h2 class="mb-3 fw-semibold lh-base">Menú</h2>
                                        <ul class="nav nav-pills filter-btns justify-content-center" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fw-medium" type="button" data-filter="all">Todos</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fw-medium" type="button" data-filter="Clasicas">Clásicas</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fw-medium" type="button" data-filter="Especiales">Especiales</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fw-medium" type="button" data-filter="Entradas">Entradas</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fw-medium active" type="button" data-filter="Bebidas">Bebidas</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fw-medium" type="button" data-filter="Cócteles">Cócteles</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fw-medium" type="button" data-filter="Promociones">Promociones</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="product-container">
                                @foreach ($products as $product)
                                    <div class="col-12 col-md-6 col-lg-4 product-item artwork crypto-card 3d-style" data-category="{{ $product->filtro_product }}">
                                        <div class="card explore-box card-animate">
                                            <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                                                <button type="button" class="btn btn-icon active" data-bs-toggle="button" aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                                            </div>
                                            <div class="explore-place-bid-img">
                                                @if ($product->photo_product)
                                                    <img src="{{ asset('public/' . $product->photo_product) }}" alt="" class="card-img-top explore-img">
                                                @else
                                                    <img src="{{ asset('assets/images/sin-foto.png') }}" alt="" class="card-img-top explore-img">
                                                @endif
                                                <div class="bg-overlay"></div>
                                                <div class="place-bid-btn d-flex justify-content-between">
                                                    {{-- Agregar al carrito --}}
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="mb-1"><a href="apps-nft-item-details.html">{{ $product->name_product }}</a></h5>
                                            </div>
                                            <div class="card-footer border-top border-top-dashed">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-select mb-3 size-select" id="size-select-{{ $product->id_product }}" aria-label="Default select example">
                                                        @foreach ($product->multipleProducts as $multipleProduct)
                                                            <option value="{{ $multipleProduct->price_product_multiple }}">{{ $multipleProduct->size_product_multiple }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-footer border-top border-top-dashed">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 fs-14">
                                                        <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i>
                                                        <span id="price-display-{{ $product->id_product }}" class="fw-medium"></span>
                                                    </div>
                                                    <button type="button" class="btn btn-warning add-to-cart-btn"
                                                        data-product-id="{{ $product->id_product }}"
                                                        data-product-name="{{ $product->name_product }}">
                                                        <i class="ri-shopping-cart-fill align-bottom me-1"></i>Agregar al carrito
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    filterProducts('Bebidas');

                                    const filterButtons = document.querySelectorAll('.filter-btns button');
                                    filterButtons.forEach(function(button) {
                                        button.addEventListener('click', function() {
                                            const filter = this.getAttribute('data-filter');
                                            filterProducts(filter);
                                        });
                                    });

                                    function filterProducts(filter) {
                                        const products = document.querySelectorAll('.product-item');
                                        products.forEach(function(product) {
                                            if (filter === 'all' || product.dataset.category === filter) {
                                                product.style.display = 'block';
                                            } else {
                                                product.style.display = 'none';
                                            }
                                        });
                                    }
                                });
                            </script>

                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
</div>

<footer class="custom-footer bg-dark py-5 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4">
                <div>
                    <div>
                        <img src="assets2/images/logo-light.png" alt="logo light" height="60">
                    </div>
                    <div class="mt-4">
                        <p>El rincon Pizzero & Bienvenido</p>
                        <p>Te damos la bienvenida a nuestras opciones donde encontraras menu, soporte, contacto, direcciones!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 ms-lg-auto">
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Informacion</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="#">Direccion y horarios</a></li>
                                <li><a href="#">Numero de local</a></li>
                                <li><a href="#">Contactos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Carta</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="#">Menu</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Suport</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="pages-faqs.html">Terminos y condiciones</a></li>
                                <li><a href="pages-faqs.html">Terminos y condiciones del WhatsApp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row text-center text-sm-start align-items-center mt-5">
            <div class="col-sm-6">

                <div>
                    <p class="copy-rights mb-0">
                        <script> document.write(new Date().getFullYear()) </script> © Ricon Pizzero - Bienvenida
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end mt-3 mt-sm-0">
                    <ul class="list-inline mb-0 footer-social-link">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-facebook-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-instagram-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-whatsapp-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-google-fill"></i>
                                </div>
                            </a>
                        </li>
                        {{-- <li class="list-inline-item">
                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-tik-line"></i>
                                </div>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.add-to-cart-btn').on('click', function(event) {
            event.preventDefault();

            const productId = $(this).data('product-id');
            const productName = $(this).data('product-name');
            const selectedSize = $('#size-select-' + productId + ' option:selected').text();
            const selectedPrice = $('#price-display-' + productId).text();
            const productImage = $(this).closest('.crypto-card').find('.explore-img').attr('src');

            // Verificar si el producto ya está en el carrito
            if ($('#cart-items-list').find(`.product-id:contains(${productId})`).length > 0) {
                alert('Este producto ya ha sido añadido al carrito.');
                return;
            }

            const cartItemHtml = `
                <div class="d-flex align-items-center mt-2 dropdown-item-cart">
                    <img src="${productImage}" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                    <div class="flex-grow-1">
                        <h6 class="mt-0 mb-1 fs-14">
                            <a href="apps-ecommerce-product-details.html" class="text-reset">${productName}</a>
                        </h6>
                        <p class="mb-0 fs-12 text-muted">
                            Tamaño: <span>${selectedSize}</span><br>
                        </p>
                    </div>
                    <div class="px-2">
                        <h5 class="m-0 fw-normal">$<span class="cart-item-price">${selectedPrice}</span></h5>
                    </div>
                    <div class="ps-2">
                        <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn shadow-none"><i class="ri-close-fill fs-16"></i></button>
                    </div>
                </div>
            `;

            $('#cart-items-list').append(cartItemHtml);

            const itemCount = $('.dropdown-menu-cart .dropdown-item-cart').length;
            $('.cartitem-badge').text(itemCount);
            $('#empty-cart').hide();
            saveCartState();

            updateCartTotal();
        });

        function updateCartTotal() {
            let total = 0;

            $('.dropdown-menu-cart .dropdown-item-cart').each(function() {
                const price = parseFloat($(this).find('.cart-item-price').text().replace('$', ''));
                total += price;
            });

            $('#cart-item-total').text('$' + total.toFixed(2));
            $('#cart-item-total-count').html(`<span class="cartitem-badge">${$('.dropdown-menu-cart .dropdown-item-cart').length}</span> items`);
        }

        function saveCartState() {
            const cartItems = [];
            $('.dropdown-menu-cart .dropdown-item-cart').each(function() {
                const productId = $(this).find('.product-id').text();
                const productName = $(this).find('.fs-14 a').text();
                const selectedSize = $(this).find('.fs-12 span').text();
                const selectedPrice = $(this).find('.cart-item-price').text();
                const productImage = $(this).find('img').attr('src');

                const item = {
                    productId: productId,
                    productName: productName,
                    selectedSize: selectedSize,
                    selectedPrice: selectedPrice,
                    productImage: productImage
                };

                cartItems.push(item);
            });

            localStorage.setItem('cartItems', JSON.stringify(cartItems));
        }

        function loadCartState() {
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

            cartItems.forEach(function(item) {
                const cartItemHtml = `
                    <div class="d-flex align-items-center mt-2 dropdown-item-cart">
                        <img src="${item.productImage}" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                        <div class="flex-grow-1">
                            <h6 class="mt-0 mb-1 fs-14">
                                <a href="apps-ecommerce-product-details.html" class="text-reset">${item.productName}</a>
                            </h6>
                            <p class="mb-0 fs-12 text-muted">
                                Tamaño: <span>${item.selectedSize}</span><br>
                            </p>
                        </div>
                        <div class="px-2">
                            <h5 class="m-0 fw-normal">$<span class="cart-item-price">${item.selectedPrice}</span></h5>
                        </div>
                        <div class="ps-2">
                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn shadow-none"><i class="ri-close-fill fs-16"></i></button>
                        </div>
                    </div>
                `;

                $('#cart-items-list').append(cartItemHtml);
            });

            const itemCount = cartItems.length;
            $('.cartitem-badge').text(itemCount);
            $('#empty-cart').toggle(itemCount === 0);

            updateCartTotal();
        }

        loadCartState();

        $('.dropdown-menu-cart').on('click', '.remove-item-btn', function(event) {
            event.preventDefault();
            $(this).closest('.dropdown-item-cart').remove();

            saveCartState();

            const itemCount = $('.dropdown-menu-cart .dropdown-item-cart').length;
            $('.cartitem-badge').text(itemCount);

            updateCartTotal();

            if (itemCount === 0) {
                $('#empty-cart').show();
            }
        });

        function sendWhatsAppMessage() {
            const cartItems = [];
            $('.dropdown-menu-cart .dropdown-item-cart').each(function() {
                const productName = $(this).find('.fs-14 a').text().trim();
                const selectedPrice = $(this).find('.cart-item-price').text().trim();
                const selectedSize = findSizeByPrice(productName, selectedPrice);

                const item = {
                    productName: productName,
                    selectedPrice: selectedPrice,
                    selectedSize: selectedSize
                };

                cartItems.push(item);
            });

            if (cartItems.length === 0) {
                alert('No hay productos seleccionados para enviar.');
                return;
            }

            $.ajax({
                url: '/api/cart',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ cartItems: cartItems }),
                success: function(response) {
                    const introMessage = "Estoy interesado en los siguientes productos:\n\n";
                    const productsMessage = cartItems.map(item => `🍕 *Producto:* ${item.productName}\n 💲 *Precio:* ${item.selectedPrice}\n\n`).join("");

                    const fullMessage = encodeURIComponent(introMessage + productsMessage);
                    const whatsappLink = `https://api.whatsapp.com/send?phone=+51958096704&text=${fullMessage}`;
                    window.open(whatsappLink, '_blank');

                    resetCart();

                },
                error: function(error) {
                    alert('Error al enviar los productos al API.');
                }
            });
        }

        function findSizeByPrice(productName, selectedPrice) {
            let selectedSize = '';

            return selectedSize;
        }

        function resetCart() {
            $('#cart-items-list').empty();
            $('.cartitem-badge').text('0');
            $('#cart-item-total').text('$0.00');
            $('#empty-cart').show();

            $('#whatsapp-button').prop('disabled', true);

            localStorage.removeItem('cartItems');
        }

        function checkCartItems() {
            let itemCount = parseInt(document.getElementById('cart-item-total').innerText);

            $('#whatsapp-button').prop('disabled', itemCount === 0);
        }

        $(document).ready(function() {
            checkCartItems();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.filter-btns button').on('click', function() {
                const filterValue = $(this).data('filter');

                if (filterValue === 'all') {
                    $('.product-item').show();
                } else {
                    $('.product-item').hide();

                    $(`.product-item[data-category="${filterValue}"]`).show();
                }

                $('.filter-btns button').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sizeSelects = document.querySelectorAll('.size-select');

            sizeSelects.forEach(select => {
                const productId = select.id.split('-').pop();
                const priceDisplay = document.getElementById(`price-display-${productId}`);

                priceDisplay.innerText = select.options[select.selectedIndex].value;

                select.addEventListener('change', function() {
                    priceDisplay.innerText = this.value;
                });
            });
        });
    </script>
@endsection
