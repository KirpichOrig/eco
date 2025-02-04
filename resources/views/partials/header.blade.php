<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <!-- font-family: "Bebas Neue", serif; -->
    <!-- font-family: "Montserrat", serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="bebas text-black w-full z-1">
        <div class="bg-[#8cc63f] h-[40px] text-white flex justify-center items-center text-[20px]">Free Shipping in US on orders over $50</div>
        <div class="border-b" style="border-color: rgba(0, 0, 0, 0.2);">
            <div class="h-[60px] section bebas relative flex items-center justify-between">
                <a href="../" class="text-[30px]">ECO</a>

                <nav class="absolute left-1/2 transform -translate-x-1/2 flex gap-[14px] text-[20px]">
                    <a href="../">Home</a>
                    <a href="{{ url('/catalog') }}">Catalog</a>
                </nav>

                <div class="flex gap-[14px] text-[20px]">
                    @if (Auth::check())
                        <!-- Если пользователь авторизован, показываем кнопку "Profile" -->
                        <a href="{{ url('/profil') }}">Profil</a>
                    @else
                        <!-- Если пользователь не авторизован, показываем кнопки "Log in" и "Sign in" -->
                        <a href="{{ url('/login') }}">Log in</a>
                        <a href="{{ url('/register') }}">Sign in</a>
                    @endif
                </div>
            </div>
        </div>
    </header>
</body>
</html>