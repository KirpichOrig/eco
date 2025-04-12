<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="min-h-screen flex flex-col bg-[#fcf3eb]">
    @include('partials.header')

    <div class="montserrat section flex-1 flex items-center justify-center">
        <div class="h-full flex items-center justify-center gap-4 pt-16 pb-16">
            <!-- Изображение продукта -->
            <img src="{{ asset('storage/' . $product->image) }}" class="w-2/3" alt="{{ $product->name }}">
            
            <div class="w-1/2">
                <!-- Хлебные крошки -->
                <div class="flex gap-2 mb-2 text-[14px]">
                    <a href="/" class="text-[#72A233]">Домой</a> /
                    <a href="{{ route('catalog') }}" class="text-[#72A233]">Каталог</a> /
                    <a href="#" class="">{{ $product->name }}</a>
                </div>
                
                <!-- Описание продукта -->
                <p class="text-[30px] mb-4">"{{ $product->description }}"</p>

                <!-- Информация о категории и цвете -->
                <div class="flex gap-4 mb-4">
                    <div>
                        <p class="font-bold">Категория:</p>
                        <p>{{ $product->category ? $product->category->name : 'Нет категории' }}</p>
                    </div>
                    <div>
                        <p class="font-bold">Цвет:</p>
                        <p>{{ $product->color ?? 'Нет цвета' }}</p>
                    </div>
                </div>

                <div class="mt-4 flex gap-4">
                    <!-- Количество товара -->
                    <div class="w-24 h-16 bg-white border-2 border-[#72a233] flex items-center justify-between px-2">
                        <button class="text-3xl text-[#72a233]" id="decrement">-</button>
                        <span id="counter" class="text-2xl font-bold text-[#72a233] w-12 text-center">1</span>
                        <button class="text-3xl text-[#72a233]" id="increment">+</button>
                    </div>

                    <!-- Кнопка покупки -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="quantity" value="1">
                        <button type="submit"
                            class="w-72 h-16 bg-[#72A233] text-white font-[700] text-[14px] hover:bg-[#546b3b]">
                            В корзину - ₽{{ $product->cost }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const decrementButton = document.getElementById('decrement');
        const incrementButton = document.getElementById('increment');
        const counter = document.getElementById('counter');
        const quantityInput = document.getElementById('quantity');

        let count = parseInt(counter.textContent);

        decrementButton.addEventListener('click', () => {
            if (count > 1) {
                count--;
                counter.textContent = count;
                quantityInput.value = count;
            }
        });

        incrementButton.addEventListener('click', () => {
            if (count < 10) {
                count++;
                counter.textContent = count;
                quantityInput.value = count;
            }
        });
    </script>

    @include('partials.footer')
</body>
</html>