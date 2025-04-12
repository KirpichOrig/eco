<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body class="bg-[#fcf3eb]">
    <div class="flex flex-col min-h-screen">
        @include('partials.header')
        <div class="section montserrat flex flex-1 items-center">
            <div>
                <div class="section">
                    <p class="text-[32px]"><a href="/" class="text-[#72A233]">Домой</a> / <span class="cursor-pointer">Каталог</span></p>
                    <div class="flex gap-2 mb-1">
                        <p>Фильтр</p>
                        <form action="{{ route('catalog') }}" method="GET" class="flex gap-1">
                            <select name="category" id="category" onchange="this.form.submit()">
                                <option value="">Все категории</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select name="sort_by" id="sort_by" onchange="this.form.submit()">
                                <option value="created_at" {{ $sortBy == 'created_at' ? 'selected' : '' }} disabled hidden>Новые в начале</option>
                                <option value="cost" {{ $sortBy == 'cost' ? 'selected' : '' }}>Дешевле</option>
                                <option value="cost_desc" {{ $sortBy == 'cost_desc' ? 'selected' : '' }}>Дороже</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="section grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        <div class="group">
                            <div class="relative w-full aspect-[3/2]">
                                <a href="{{ url('/product/' . $product->id) }}">
                                    <img class="absolute inset-0 w-full h-full object-cover bg-gray-500 transition-shadow duration-300 group-hover:shadow-[0_0_11px_3px_rgba(0,0,0,0.35)]"
                                        src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                                </a>
                                @if (auth()->user() && auth()->user()->role == 'admin')
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Вы уверены, что хотите удалить данный товар?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="absolute px-2 py-1 bg-red-500 text-white top-1 right-2">
                                            del
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <div class="mt-2 w-[417px]">
                                <div class="text-[22px]">{{ $product->name }}</div>
                                <div class="flex justify-between items-center">
                                    <div class="">
                                        <p class="text-[16px]">₽{{ $product->cost }}</p>
                                    </div>
                                    <div class="flex gap-1">
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-[16px] px-2 py-2 flex justify-center items-center border border-black hover:border-[rgb(106_161_34)] hover:text-[rgb(106_161_34)]">
                                                В корзину
                                            </button>
                                        </form>
                                        <!-- Проверка роли администратора -->
                                        @if (auth()->user() && auth()->user()->role == 'admin')
                                            <a href="{{ url('/product/' . $product->id . '/edit') }}"
                                                class="text-[16px] px-2 py-2 flex justify-center items-center border border-black hover:border-[rgb(106_161_34)] hover:text-[rgb(106_161_34)]">
                                                Редактировать
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
</body>

</html>