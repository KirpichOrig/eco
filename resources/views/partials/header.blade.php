<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <!-- font-family: "Bebas Neue", serif; -->
    <!-- font-family: "Montserrat", serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>

    <!-- header -->

    <header class="montserrat text-black w-full z-1">
        <div class="bg-[#8cc63f] h-[40px] text-white flex justify-center items-center text-[18px]">У нас вы найдете то, что искали</div>
        <div class="border-b" style="border-color: rgba(0, 0, 0, 0.2);">
            <div class="h-[60px] section montserrat relative flex items-center justify-between">
                <a href="/" class="text-[26px]">Декор</a>

                <nav class="absolute left-1/2 transform -translate-x-1/2 flex gap-[14px] text-[18px]">
                    <a href="/">Домой</a>
                    <a href="{{ url('/catalog') }}">Каталог</a>
                    <a href="{{ url('/about') }}">О нас</a>
                    <a href="{{ url('/where') }}">Где нас найти?</a>
                </nav>

                <div class="flex gap-[14px] text-[18px] items-center">
                    <div class="relative">
                        <i id="basketIcon" class="fa-solid fa-basket-shopping" style="color: #000000; cursor: pointer;"></i>
                        <div id="cartModal" class="hidden z-1 absolute top-[30px] right-[-40px]">
                            <div class="flex bebas-like flex-col min-w-[400px]">
                                <div
                                    class="flex flex-col gap-2 w-fit justify-center py-3 px-6 shadow-[0_0_11px_3px_rgba(0,0,0,0.35)] bg-[#fcf3eb]"
                                    id="cartContent">
                                    <!-- Товары будут загружены сюда -->
                                </div>
                                <div class="flex text-[16px] items-end justify-between">
                                    <p id="totalPrice">Общая цена: ₽0</p>
                                    <form action="{{ route('order.store') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-[#72A233] cursor-pointer text-[14px] p-2 text-white hover:bg-[#546b3b] w-fit">Купить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                        <!-- Если пользователь авторизован, показываем кнопку "Profile" -->
                        <a href="{{ url('/profil') }}">Профиль</a>
                    @else
                        <!-- Если пользователь не авторизован, показываем кнопки "Log in" и "Sign in" -->
                        <a href="{{ url('/login') }}">Вход</a>
                        <a href="{{ url('/register') }}">Регистрация</a>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const basketIcon = document.getElementById('basketIcon');
            const cartModal = document.getElementById('cartModal');

            basketIcon.addEventListener('click', function () {
                cartModal.classList.toggle('hidden');
                if (!cartModal.classList.contains('hidden')) {
                    fetchCartItems();
                }
            });

            window.addEventListener('click', function (event) {
                if (!event.target.matches('.fa-basket-shopping') && !cartModal.contains(event.target)) {
                    cartModal.classList.add('hidden');
                }
            });

            function fetchCartItems() {
                fetch('{{ route("cart.items") }}')
                    .then(response => response.json())
                    .then(data => {
                        const cartContent = document.getElementById('cartContent');
                        cartContent.innerHTML = '';

                        let totalPrice = 0;

                        data.items.forEach(item => {
                            const product = item.product;
                            const totalCost = product.cost * item.quantity;
                            totalPrice += totalCost;

                            const itemHtml = `
                                <div class="flex gap-2">
                                    <img class="w-[140px] object-cover bg-gray-500 transition-shadow duration-300 group-hover:shadow-[0_0_11px_3px_rgba(0,0,0,0.35)]"
                                        src="{{ asset('storage/') }}${product.image}" alt="${product.name}" />
                                    <div class="py-1 flex flex-col gap-0 justify-between">
                                        <div>
                                            <p class="text-[16px]">${product.name}</p>
                                            <p class="text-[14px] font-[600]">₽${product.cost}</p>
                                        </div>
                                        <div class="text-[14px] font-[600] flex gap-2">
                                            <p>Кол-во:</p>
                                            <button class="decrement-btn bg-[#e0e0e0] p-1 rounded-l" data-id="${item.id}">-</button>
                                            <span id="quantity-${item.id}" class="w-10 text-center">${item.quantity}</span>
                                            <button class="increment-btn bg-[#e0e0e0] p-1 rounded-r" data-id="${item.id}">+</button>
                                        </div>
                                        <a href="#" class="bg-[#af0f0f] cursor-pointer font-[700] text-[12px] p-2 text-white hover:bg-[#8a0b0b] w-fit delete-item" data-id="${item.id}">удалить</a>
                                    </div>
                                </div>
                            `;

                            cartContent.innerHTML += itemHtml;
                        });

                        document.getElementById('totalPrice').textContent = `Общая цена: ₽${totalPrice}`;

                        // Удаление товаров из корзины
                        const deleteButtons = document.querySelectorAll('.delete-item');
                        deleteButtons.forEach(button => {
                            button.addEventListener('click', function (event) {
                                event.preventDefault();
                                const itemId = this.getAttribute('data-id');
                                deleteCartItem(itemId);
                            });
                        });

                        // Увеличение количества товара
                        const incrementButtons = document.querySelectorAll('.increment-btn');
                        incrementButtons.forEach(button => {
                            button.addEventListener('click', function (event) {
                                event.preventDefault();
                                const itemId = this.getAttribute('data-id');
                                updateCartItemQuantity(itemId, 1);
                            });
                        });

                        // Уменьшение количества товара
                        const decrementButtons = document.querySelectorAll('.decrement-btn');
                        decrementButtons.forEach(button => {
                            button.addEventListener('click', function (event) {
                                event.preventDefault();
                                const itemId = this.getAttribute('data-id');
                                updateCartItemQuantity(itemId, -1);
                            });
                        });
                    })
                    .catch(error => console.error('Ошибка при загрузке товаров из корзины:', error));
            }

            function deleteCartItem(itemId) {
                fetch(`/cart/delete/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    fetchCartItems(); // Перезагружаем товары из корзины
                })
                .catch(error => console.error('Ошибка при удалении товара из корзины:', error));
            }

            function updateCartItemQuantity(itemId, change) {
                const quantityElement = document.getElementById(`quantity-${itemId}`);
                let currentQuantity = parseInt(quantityElement.textContent);
                let newQuantity = currentQuantity + change;

                if (newQuantity <= 0) {
                    alert('Количество должно быть больше 0');
                    return;
                }

                fetch(`/cart/update/${itemId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ quantity: newQuantity })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                        quantityElement.textContent = data.new_quantity;
                        fetchCartItems(); // Перезагружаем товары из корзины для обновления общей цены
                    }
                })
                .catch(error => console.error('Ошибка при обновлении количества товара:', error));
            }
        });
    </script>
</body>

</html> 