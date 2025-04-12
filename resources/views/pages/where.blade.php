<!doctype html>
<html>
<head>
  @include('partials.head')
</head>
<body class="bg-[#fcf3eb]">
  <div class="flex flex-col min-h-screen">
    <!-- header -->
    @include('partials.header')

    <!-- map -->
    <div class="montserrat flex flex-1 bg-[#fcf3eb] justify-center items-center">
      <div class="flex flex-col gap-1">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21325.90412081226!2d49.102894579738575!3d55.817378754853564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ead5715f24ccb%3A0xc2f7f3762361e7eb!2z0JvQtdC80LDQvdCwINCf0YDQvg!5e0!3m2!1sru!2sru!4v1744417801513!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
        <div class="flex justify-between">
          <p>ул. Фатыха Амирхана, 3</p>
          <a href="tel:88005553535">8 (800) 555 35-35</a>
          <a href="mailto:mebel-kazan@mail.ru">mebel-kazan@mail.ru</a>
        </div>
      </div>
    </div>

    <!-- footer -->
    @include('partials.footer')
  </div>
</body>
</html>