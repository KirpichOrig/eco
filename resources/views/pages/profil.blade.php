<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="bg-[#fcf3eb]">
    <div class="montserrat flex">      
        <div class="w-1/2 h-screen flex flex-col justify-center items-center relative">
            <div class="flex flex-col gap-8">
                <div>
                    <!-- Выводим имя пользователя -->
                    <p class="font-[700] text-[50px]">Hello, {{ $user->name }}!</p>
                    
                    <!-- Выводим роль пользователя -->
                    <p class="mt-[-8px]">Role: {{ $user->role }}</p>
                    
                    <!-- Появляется только если роль admin -->
                    @if($user->role == 'admin')
                        <div class="mt-6">
                            <a href="{{ url('/add') }}" class="mr-2 border border-black px-8 py-4 h-[40px] w-[180px] text-[16px] hover:bg-black hover:text-white">
                                Добавить товар
                            </a>
                            <a href="{{ url('/addcategor') }}" class="border border-black px-8 py-4 h-[40px] w-[180px] text-[16px] hover:bg-black hover:text-white">
                                Добавить категорию
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <a class="absolute top-4 left-4 font-[600]" href="../">назад</a>
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
