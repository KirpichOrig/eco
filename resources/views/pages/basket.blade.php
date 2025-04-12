<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Корзина</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
@include('partials.head')
<body class="bg-[#fcf3eb]">

  <!-- Модальное окно -->
  <div class="flex bebas-like flex-col">
    <div class="flex flex-col gap-2 w-fit justify-center py-3 px-6 shadow-[0_0_11px_3px_rgba(0,0,0,0.35)] bg-[white]">
      <div class="flex gap-2">
          <img
              class="w-[140px] object-cover bg-gray-500 transition-shadow duration-300 group-hover:shadow-[0_0_11px_3px_rgba(0,0,0,0.35)]"
              src="{{ asset('img/product/2.png') }}" alt="Product"
          />
          <div class="py-1 flex flex-col gap-0 justify-between">
            <div>
              <p class="text-[16px]">Крем дезодорант</p>
              <p class="text-[14px] font-[600]">₽1400</p>
            </div>
            <div class="text-[14px] font-[600] flex gap-2">
              <p>Кол-во:</p>
              <p>1</p>
              <div class="flex gap-1 cursor-pointer">
                <p>+</p>
                <p>-</p>
              </div>
            </div>
            <a class="bg-[#af0f0f] cursor-pointer font-[700] text-[12px] p-2 text-white hover:bg-[#8a0b0b] w-fit">удалить</a>
          </div>
      </div>
      <div class="flex text-[16px] items-end justify-between">
        <p>Общаяя цена: ₽1400</p>
        {{-- <a class="bg-[#72A233] cursor-pointer text-[14px] p-2 text-white hover:bg-[#546b3b] w-fit">купить</a> --}}
        <p>Купить</p>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>