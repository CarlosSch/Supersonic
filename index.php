<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>SuperSonic - All Your Music</title>
    <link rel="icon" type="image/png" href="resources/lgo.png" />
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/jquery-1.12.4.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

  </head>
  <body>
    <header>
      <nav class="menu">
        <a href="index.php">
          <div class="logo"><img src="resources/super_logo.png" height="50"/></div>
        </a>
          <ol>
            <li><a class="link" href="#home">HOME</a></li> 
            <li><a class="link" href="#info">INFORMACIÓN</a></li>
            <li><a class="link" href="#contacto">CONTACTO</a></li>		
		      	<li><a class="link" href="login.php">INICIAR SESIÓN</a></li>
          </ol>
      </nav>  
    <!-- Swiper -->
    <a name="home"></a>
    <div class="swiper-container">
      <h1 class="main_title">Elige el Álbum Que Desees</h2>

      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url(resources/album/NCP.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/EWBAITE.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/MSP.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/TGE.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/HM.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/WL.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/HAF.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/TDSOTM.png)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/WA.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/DTFM.png)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/IAPW.jpg)"></div>
        <div class="swiper-slide" style="background-image:url(resources/album/BA.jpg)"></div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
      <center><img class="arrow" src="resources/arrow-down-sign-to-navigate.png" /></center>     
    </div>
  </header>
   
    
    <section id="contacto" class="contact">
      <a name="contacto"></a>
        <form action="/suscripcion/" class="form-email">
          <h2 class="contac">Contáctanos</h2>
          <p class="font_8">Carlos Alberto López Garcés</p>
          <p class="font_8">stractovariuz@gmail.com</p>
          <p class="font_8">773-125-3795</p>
          <div class="int">
          <center>
          <input type="text" placeholder="Nombre" id="nombre"><br>
          <input type="text" placeholder="Email" id="email"><br>
          <input type="text" placeholder="Ocupación" id="ocupacion">
          </center>
          <button>Enviar</button>
          </div>
        </form>
        <div class="social">
          <a href="https://twitter.com/leonidasesteban" class="social-link twitter"></a>
          <a href="https://facebook.com/leonidas.esteban" class="social-link facebook"></a>
          <a href="https://github.com/leonidasesteban" class="social-link github"></a>
          <a href="https://instagram.com/leonidasesteban" class="social-link instagram"></a>
        </div>
    </section>

    <section class="footerf">
      <p class="foof">2018 SuperSonic - Todos Los Derechos Reservados</p>        
    </section>

    <script>
      $(document).ready(function(){
        var altura = $('.menu').offset().top;
        
        $(window).on('scroll', function(){
          if ( $(window).scrollTop() > altura ){
            $('.menu').addClass('menu-fixed');
          } else {
            $('.menu').removeClass('menu-fixed');
          }
        });
      
      });
    </script> 
    <script src="js/swiper.min.js"></script>
    <script>
      var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows : true,
        }, autoplay: {
          delay: 2300,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
        },
      });
    </script>
  </body>
</html>
