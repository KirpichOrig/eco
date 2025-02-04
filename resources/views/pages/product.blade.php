<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="min-h-screen flex flex-col">
    @include('partials.header')

    <div class="section flex-1 flex items-center justify-center">
        <div class="h-full flex items-center justify-center gap-4 pt-16 pb-16">
            <!-- Изображение продукта -->
            <img src="{{ asset('storage/' . $product->image) }}" class="w-2/3" alt="{{ $product->name }}">
            
            <div class="w-1/2 montserrat">
                <!-- Хлебные крошки -->
                <div class="flex gap-2 mb-2 text-[14px]">
                    <a href="../" class="text-[#72A233]">Home</a> /
                    <a href="{{ route('catalog') }}" class="text-[#72A233]">Catalog</a> /
                    <a href="#">{{ $product->name }}</a>
                </div>
                
                <!-- Описание продукта -->
                <p class="text-[30px] font-[600]">"{{ $product->description }}"</p>

                <div>
                    <p class="text-[16px]">
                        <span class="text-[#72A233] text-[20px]">★</span>
                        <span class="text-[#72A233] text-[20px]">★</span>
                        <span class="text-[#72A233] text-[20px]">★</span>
                        <span class="text-[#72A233] text-[20px]">★</span>
                        <span class="text-[#72A233] text-[20px] mr-1">★</span>
                        307 reviews
                    </p>
                </div>

                <div class="mt-4 flex gap-4">
                    <!-- Количество товара -->
                    <div class="w-24 h-16 bg-white border-2 border-[#72a233] flex items-center justify-between px-2">
                        <button class="text-3xl text-[#72a233]" id="decrement">-</button>
                        <span id="counter" class="text-2xl font-bold text-[#72a233] w-12 text-center">1</span>
                        <button class="text-3xl text-[#72a233]" id="increment">+</button>
                    </div>

                    <!-- Кнопка покупки -->
                    <button class="w-72 h-16 bg-[#72a233] text-white font-[700] text-[14px] hover:bg-[#546b3b]">
                        BUY - ${{ $product->cost }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const decrementButton = document.getElementById('decrement');
        const incrementButton = document.getElementById('increment');
        const counter = document.getElementById('counter');

        let count = parseInt(counter.textContent);

        decrementButton.addEventListener('click', () => {
            if (count > 1) {
                count--;
                counter.textContent = count;
            }
        });

        incrementButton.addEventListener('click', () => {
            if (count < 10) {
                count++;
                counter.textContent = count;
            }
        });
    </script>

    @include('partials.footer')
</body>
</html>
