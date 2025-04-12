<!doctype html>
<html>
@include('partials.head')
<body class="bg-[#fcf3eb]">

  <!-- header -->

  @include('partials.header')

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

  <!-- about -->

  <div class="mt-[160px] mb-[160px]">
    <!-- first -->
    <div class="flex items-stretch">
      <img src="{{ asset('img/about/1.png') }}" class="w-1/2 object-cover">
      <div class="bg-[#FFE7D0] w-1/2 text-center flex flex-col justify-center">
        <div class="caslo text-[48px]">
          <p>Plastic-Free Cleaning</p>
          <p class="mt-[-20px]">Supplies</p>
        </div>
        <div class="text-center text-[16px] mt-10">
          <p><span class="text-[#72A233] font-bold">Zero-Waste & Reusable Products</span> for your <span class="font-bold">Home & Kitchen</span></p>
          <p><span class="text-[#72A233] font-bold">Shop the Cleaning Kit & Save 10%</span></p>
        </div>
      </div>
    </div>
    <!-- second -->
    <div class="flex items-stretch">
      <div class="bg-[#FFE7D0] w-1/2 text-center flex flex-col justify-center">
        <div class="caslo text-[48px]">
          <p>Plastic-Free Cleaning</p>
          <p class="mt-[-20px]">Supplies</p>
        </div>
        <div class="text-center text-[16px] mt-10">
          <p><span class="text-[#72A233] font-bold">Zero-Waste & Reusable Products</span> for your <span class="font-bold">Home & Kitchen</span></p>
          <p><span class="text-[#72A233] font-bold">Shop the Cleaning Kit & Save 10%</span></p>
        </div>
      </div>
      <img src="{{ asset('img/about/2.png') }}" class="w-1/2 object-cover">
    </div>
    <!-- third -->
    <div class="flex items-stretch">
      <img src="{{ asset('img/about/3.png') }}" class="w-1/2 object-cover">
      <div class="bg-[#FFE7D0] w-1/2 text-center flex flex-col justify-center">
        <div class="caslo text-[48px]">
          <p>Plastic-Free Cleaning</p>
          <p class="mt-[-20px]">Supplies</p>
        </div>
        <div class="text-center text-[16px] mt-10">
          <p><span class="text-[#72A233] font-bold">Zero-Waste & Reusable Products</span> for your <span class="font-bold">Home & Kitchen</span></p>
          <p><span class="text-[#72A233] font-bold">Shop the Cleaning Kit & Save 10%</span></p>
        </div>
      </div>
    </div>
  </div>

  <!-- accordion -->

  <div class="mb-[160px]">
    <div class="section flex flex-col gap-2">
        <div>
            <button class="accordion-header flex justify-between w-full py-4 px-6 border-4 border-black">
                <p class="text-2xl font-bold pointer-events-none">what makes your store unique?</p>
                <p class="text-3xl font-bold pointer-events-none">+</p>
            </button>
            <div class="accordion-content h-0 overflow-hidden transition-all duration-300 text-lg font-semibold">
                Our store offers eco-friendly products made from natural ingredients, with packaging that is recyclable and sustainable. We prioritize both quality and environmental impact, helping you make a positive difference with every purchase.
            </div>
        </div>
        <div>
            <button class="accordion-header flex justify-between w-full py-4 px-6 border-4 border-black">
                <p class="text-2xl font-bold pointer-events-none">how can I be sure your products are safe for my health?</p>
                <p class="text-3xl font-bold pointer-events-none">+</p>
            </button>
            <div class="accordion-content h-0 overflow-hidden transition-all duration-300 text-lg font-semibold">
                All our products are certified and made from 100% natural ingredients. They’re free from harmful chemicals, making them safe for sensitive skin and ensuring they’re gentle on your health and the environment.
            </div>
        </div>
        <div>
            <button class="accordion-header flex justify-between w-full py-4 px-6 border-4 border-black">
                <p class="text-2xl font-bold pointer-events-none">how should I take care of eco-friendly brushes and soaps?</p>
                <p class="text-3xl font-bold pointer-events-none">+</p>
            </button>
            <div class="accordion-content h-0 overflow-hidden transition-all duration-300 text-lg font-semibold">
                After use, rinse brushes with warm water and let them air dry. For soaps, store them in a dry place to maintain their shape and prevent them from becoming soggy.
            </div>
        </div>
    </div>
  </div>

  @include('partials.footer')
</body>
</html>