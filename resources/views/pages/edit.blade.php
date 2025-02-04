<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="bg-[#fcf3eb]">
    <div class="montserrat flex">      
        <div class="w-1/2 h-screen flex flex-col justify-center items-center relative">
            <div class="flex flex-col gap-8">
                <div>
                    <p class="font-[700] text-[50px]">Edit product</p>
                    <p class="mt-[-8px]">Thanks for the work</p>
                </div>
                <form class="flex flex-col w-[500px] gap-2" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input class="border-b pl-1 pr-1 placeholder:text-black" type="text" name="name" value="{{ $product->name }}" placeholder="Name">
                    <input class="border-b pl-1 pr-1 placeholder:text-black" type="text" name="description" value="{{ $product->description }}" placeholder="Description">
                    <input class="border-b pl-1 pr-1 placeholder:text-black" type="text" name="cost" value="{{ $product->cost }}" placeholder="Cost">
                    <input class="border-b pl-1 pr-1 placeholder:text-black" type="file" name="image">
                    <div class="w-full text-center mt-10">
                        <button class="border h-[44px] w-[180px] text-[16px] hover:bg-black hover:text-white"" type="submit">Save changes</button>
                    </div>

                </form>
            </div>
            <a class="absolute top-4 left-4 font-[600]" href="../">back</a>
        </div>
        <img src="{{ asset('img/cat.jpg') }}" class="brightness-[85%] w-1/2 h-screen object-cover" alt="">

    </div>
</body>
</html>
