<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="bg-[#fcf3eb]">
    <div class="montserrat flex">      
        <img id="randomImage" class="brightness-[85%] w-1/2 h-screen object-cover" alt="">
        <div class="w-1/2 h-screen flex flex-col justify-center items-center relative">
            <div class="flex flex-col gap-8">
                <div>
                    <p class="font-[700] text-[50px]">Log in</p>
                    <p class="mt-[-8px]">Glad to see you again! Not registered yet? <a class="text-[#72A233]" href="{{ url('/register') }}">Sign in</a></p>
                </div>
                <form action="{{ url('/login') }}" method="POST" class="flex flex-col w-[500px] gap-2">
                    @csrf
                    <input type="text" name="email" placeholder="Email" class="focus:outline-none border-b pl-1 pr-1 placeholder:text-black">
                    <input type="password" name="password" placeholder="Password" class="border-b pl-1 pr-1 placeholder:text-black">
                    <button type="submit" class="border h-[40px] w-[180px] text-[16px] hover:bg-black hover:text-white">ENTER</button>
                </form>
            </div>
            <a class="absolute top-4 left-4 font-[600]" href="../">back</a>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const images = [
            "/img/login-auth/1.jpg",
            "/img/login-auth/2.jpg",
            "/img/login-auth/3.jpg"
        ]; 
        const randomImage = images[Math.floor(Math.random() * images.length)];
        document.getElementById("randomImage").src = randomImage;
    });
</script>
</body>
</html>
