<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    @include('partials.header')
    <div class="pt-16 pb-16">
        <div class="section">
            <p class="bebas text-[32px]"><a href="../" class="text-[#72A233]">home</a> / <span class="cursor-pointer">catalog</span></p>
        </div>
        <div class="bebas section grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="group">
                <div class="relative w-full aspect-[3/2]">
                    <img
                        class="absolute inset-0 w-full h-full object-cover bg-gray-500 transition-shadow duration-300 group-hover:shadow-[0_0_11px_3px_rgba(0,0,0,0.35)]"
                        src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    />
                    @if (auth()->user() && auth()->user()->role == 'admin')
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="absolute px-2 py-1 bg-red-500 text-white top-1 right-2">
                                del
                            </button>
                        </form>
                    @endif
                </div>
                <div class="mt-2">
                    <div class="text-[22px]">{{ $product->name }}</div>
                    <div class="flex justify-between">
                        <div class="mt-[-4px]">
                            <p class="text-[14px]">{{ $product->description }}</p>
                            <p class="text-[16px] mt-[-4px]">${{ $product->cost }}</p>
                        </div>
                        <div class="flex gap-1">
                            <a href="{{ url('/product/' . $product->id) }}" class="text-[16px] h-[38px] w-[124px] flex justify-center items-center border border-black hover:border-[rgb(106_161_34)] hover:text-[rgb(106_161_34)]">
                                add to cart
                            </a>
                            <!-- Проверка роли администратора -->
                            @if (auth()->user() && auth()->user()->role == 'admin')
                                <a href="{{ url('/product/' . $product->id . '/edit') }}" class="text-[16px] h-[38px] w-[124px] flex justify-center items-center border border-black hover:border-[rgb(106_161_34)] hover:text-[rgb(106_161_34)]">
                                    edit
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @include('partials.footer')
</body>
</html>
