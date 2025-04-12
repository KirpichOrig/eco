<!doctype html>
<html>
@include('partials.head')
<body class="bg-[#fcf3eb]">

  <!-- header -->

  @include('partials.header')

  <!-- logo -->
   
  <div class="flex justify-center mt-[40px] items-center gap-[10px] font-[700] text-[#f0ab8d]">
    <img class="h-[160px]" src="{{ asset('img/logo/logo-o.png') }}" alt="">
    <p class="text-[20px]">Уют в каждом уголке: <br><span class="text-[28px]">Декор,</span> <br>который вдохновляет!</p>
  </div>
  {{-- <div class="flex justify-center mt-[40px] items-center gap-[10px] font-[700] text-black">
    <img class="h-[160px]" src="{{ asset('img/logo/logo-b.png') }}" alt="">
    <p class="text-[20px]">Уют в каждом уголке: <br><span class="text-[28px]">Декор,</span> <br>который вдохновляет!</p>
  </div> --}}

  <!-- banner -->

  <div class="montserrat section-50 relative w-[1440px] overflow-hidden">
    <div class="slider h-[650px] w-[1440px] relative flex">
      <!-- slide -->
      <div class="flex-shrink-0 w-full h-full object-cover relative">
        <img class="brightness-[90%]" src="/img/slider/banner.png" alt="231">
        <div class="absolute top-[50px] left-1/2 transform -translate-x-1/2 flex flex-col items-center gap-14">
          <div class="flex flex-col items-center">
            <p class="text-[64px] font-[800] caslo">Daily Essentials</p>
            <p class="text-[20px] font-[600]">Reduce waste in your everyday routine!</p>
          </div>
          <button class="bg-[#72A233] h-[69px] w-[238px] text-white hover:bg-[#546b3b]">SHOP SUSTAINABLY</button>
        </div>
      </div>
      <!-- slide -->
      <div class="flex-shrink-0 w-full h-full object-cover relative">
        <img class="brightness-[90%]" src="/img/slider/banner.png" alt="231">
        <div class="absolute top-[50px] left-1/2 transform -translate-x-1/2 flex flex-col items-center gap-14">
          <div class="flex flex-col items-center">
            <p class="text-[64px] font-[800] caslo">Daily Essentials</p>
            <p class="text-[20px] font-[600]">Reduce waste in your everyday routine!</p>
          </div>
          <button class="bg-[#72A233] h-[69px] w-[238px] text-white hover:bg-[#546b3b]">SHOP SUSTAINABLY</button>
        </div>
      </div>
    </div>
    <button class="prev-button absolute top-[325px] left-[70px] text-[32px] text-white" type="button" aria-label="Посмотреть предыдущий слайд">&lt;</button>
    <button class="next-button absolute top-[325px] right-[70px] text-[32px] text-white" type="button" aria-label="Посмотреть следующий слайд">&gt;</button>
  </div>

  <div class="h-[40px]"></div>
  @include('partials.footer')
</body>
</html>