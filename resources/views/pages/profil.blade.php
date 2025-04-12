<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="bg-[#fcf3eb]">
    <div class="montserrat flex">      
        <div class="w-1/2 h-screen flex flex-col justify-center items-center relative">
            <div class="flex flex-col gap-8">
                <div>
                    <!-- Выводим имя пользователя -->
                    <p class="font-[700] text-[50px]">Привет, {{ $user->name }}!</p>

                    <div>
                        <p>Заказы:</p>
                        {{-- Если нет заказов --}}
                        <p>Пусто, ты можешь найти, что то в нашем <a class="text-[#72A233]" href="{{ url('/catalog') }}">каталоге</a></p>
                        {{-- Если есть --}}
                        Заказ
                    </div>
                    
                    <!-- Появляется только если роль admin -->
                    @if($user->role == 'admin')
                        <!-- Выводим роль пользователя -->
                        <p class="mt-[-8px]">Роль: {{ $user->role }}</p>
                        <div class="mt-6">
                            <a href="{{ url('/add') }}" class="mr-2 border border-black px-8 py-4 h-[40px] w-[180px] text-[16px] hover:bg-black hover:text-white">
                                Добавить товар
                            </a>
                            <a href="{{ url('/addcategory') }}" class="mr-2 border border-black px-8 py-4 h-[40px] w-[180px] text-[16px] hover:bg-black hover:text-white">
                                Добавить категорию
                            </a>
                            <a href="{{ url('/admin') }}" class="border border-black px-8 py-4 h-[40px] w-[180px] text-[16px] hover:bg-black hover:text-white">
                                Админ панель
                            </a>
                        </div>
                        {{-- <div id="categories" class="mt-6 w-fit flex gap-[3px]">
                            <ul>
                                Все категории:
                                @foreach ($categories as $category)
                                    <li class="flex items-center justify-between">
                                        {{ $category->name }}
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[16px] hover:text-red-500">
                                                <i class="fa-solid fa-trash cursor-pointer" style="color: #000000;"></i>
                                            </button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div> --}}
                    @endif
                </div>
            </div>
            <a class="absolute top-4 left-4 font-[600]" href="/">назад</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="absolute top-4 left-18 font-[600]">
                    выход
                </button>
            </form>
        </div>
        <img src="img/profil.gif" class="brightness-[85%] w-1/2 h-screen object-cover" alt="">
    </div>
</body>
</html>