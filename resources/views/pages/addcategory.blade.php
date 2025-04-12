<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="">
    <div class="montserrat flex bg-[#fcf3eb]">      
        <div class="w-1/2 h-screen flex flex-col justify-center items-center relative">
            <div class="flex flex-col gap-8">
                <div>
                    <p class="font-[700] text-[42px]">Добавить категорию</p>
                    <p class="mt-[-8px]">Спасибо за работу!</p>
                </div>
                @if ($errors->any())
                    <div class="text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <p class="text-green-500">{{ session('success') }}</p>
                @endif
                <form action="{{ route('categories.store') }}" method="POST" class="flex flex-col w-[500px] gap-2">
                    @csrf
                    <input type="text" name="name" placeholder="Название" class="border-b pl-1 pr-1 placeholder:text-black" required>
                    <div class="w-full text-center mt-10">
                        <button type="submit" class="border h-[44px] w-[180px] text-[16px] hover:bg-black hover:text-white">ГОТОВО</button>
                    </div>
                </form>
            </div>
            <a class="absolute top-4 left-4 font-[600]" href="{{ url('/profil') }}">назад</a>
        </div>
        <img src="/img/cat.jpg" class="brightness-[85%] w-1/2 h-screen object-cover" alt="">
    </div>
</body>
</html>