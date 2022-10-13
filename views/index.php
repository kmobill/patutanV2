<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'sidebar_left.php'; ?>
<?php require 'sidebar_right.php'; ?>
<div class="section-carousel gradient-blue overflow-hidden flex justify-center items-center">
  <div id="carouselExampleSlidesOnly" class="carousel slide relative" data-bs-ride="carousel">
    <div class="carousel-inner relative overflow-hidden w-[calc(1280px)] h-[calc(600px)]">
      <div class="carousel-item active relative float-left w-full">
        <img src="../assets/images/slider/equipo.jpg" class="block w-full" alt="equipo patután" />
      </div>
      <div class="carousel-item relative float-left w-full">
        <img src="../assets/images/slider/patutan.jpg" class="block w-full" alt="logo patután" />
      </div>
      <div class="carousel-item relative float-left w-full">
        <img src="../assets/images/slider/cosede.jpg" class="block w-full" alt="cooperativa patután" />
      </div>
    </div>
  </div>
</div>
<div class="section-services | relative -top-36 h-96 overflow-hidden justify-center hidden md:flex">
  <img class="h-full w-full" src="../assets/images/barra posterior servicios.png" alt="" />
  <div class="h-[70%] w-full flex flex-row justify-center items-center gap-6 absolute top-[calc(15%)]">
    <div id='cardAhorro' class="block rounded-md w-56 md:w-1/4 xl:w-1/5 aspect-[1.2/1]  max-h-[380px] hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
      <h1 class="text-[2vw] xl:text-[1.6vw]  text-cyan-400 bg-white rounded-t-3xl h-[30%] flex justify-center items-center font-bold">
        AHORROS
      </h1>
      <section class="text-[1.5vw] xl:text-[1.1vw] p-3 flex flex-col justify-around items-center body-card text-white h-[70%] rounded-b-xl">
        <p class="text-center">
          Deja que tu dinero crezca mientras ahorras para el futuro
        </p>
        <img class="h-[40%]" src="../assets/logos/icono_ahorros.png" alt="icono ahorros" />
      </section>
    </div>
    <div id='cardAhorro2' class="hidden rounded-md w-56 md:w-1/4 xl:w-1/5 aspect-[1.2/1]  max-h-[380px] hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
      <h1 class="text-[2vw] xl:text-[1.6vw]  text-cyan-400 bg-white rounded-t-3xl h-[30%] flex justify-center items-center font-bold">
        AHORROS
      </h1>
      <section class="text-[1.5vw] xl:text-[1.1vw] flex justify-center items-center p-2.5 body-card text-white h-[70%] rounded-b-xl">
        <ul class="list-disc w-1/2 h-full flex-col flex justify-around items-start">
          <li class="hover:text-cyan-300" onclick="location.href = '../views/ahorrosVista'">A la vista</li>
          <li class="hover:text-cyan-300" onclick="location.href = '../views/ahorrosProgramado'">Programado</li>
          <li class="hover:text-cyan-300" onclick="location.href = '../views/ahorrosCorporativo'">Corporativo</li>
          <li class="hover:text-cyan-300" onclick="location.href = '../views/ahorrosChiquiahorro'">Chiquiahorro</li>
        </ul>
      </section>
    </div>
    <div id='cardInversion' class="block rounded-md w-56 md:w-1/4 xl:w-1/5 aspect-[1.2/1]  max-h-[380px] hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
      <h1 class="text-[2vw] xl:text-[1.6vw]  text-cyan-400 bg-white rounded-t-3xl h-[30%] flex justify-center items-center font-bold">
        INVERSIONES
      </h1>
      <section class="text-[1.5vw] xl:text-[1.1vw]  p-3 flex flex-col justify-around  items-center  body-card text-white h-[70%] rounded-b-xl">
        <p class="text-center">
          Aprovecha tu dinero y obtén una mayor tasa de interés en el
          mercado
        </p>
        <img class="h-[40%]" src="../assets/logos/icono_inversiones.png" alt="icono ahorros" />
      </section>
    </div>
    <div id='cardInversion2' class="hidden rounded-md w-56 md:w-1/4 xl:w-1/5 aspect-[1.2/1]  max-h-[380px] hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
      <h1 class="text-[2vw] xl:text-[1.6vw]  text-cyan-400 bg-white rounded-t-3xl h-[30%] flex justify-center items-center font-bold">
        INVERSIONES
      </h1>
      <section class="text-[1.5vw] xl:text-[1.1vw] flex justify-center items-center p-2.5 body-card text-white h-[70%] rounded-b-xl">
        <ul class="list-disc w-1/2 h-full flex-col flex items-start">
          <li class="hover:text-cyan-300" onclick="location.href = '../views/inversiones'">Inversiones</li>
        </ul>
      </section>
    </div>
    <div id='cardCredito' class="block rounded-md w-56 md:w-1/4 xl:w-1/5 aspect-[1.2/1]  max-h-[380px] hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
      <h1 class="text-[2vw] xl:text-[1.6vw]  text-cyan-400 bg-white rounded-t-3xl h-[30%] flex justify-center items-center font-bold">
        CRÉDITOS
      </h1>
      <section class="text-[1.5vw] xl:text-[1.1vw]  p-3 flex flex-col justify-around  items-center  body-card text-white h-[70%] rounded-b-xl">
        <p class="text-center">
          Te financiamos para juntos lograr tus objetivos
        </p>
        <img class="h-[40%]" src="../assets/logos/icono_creditos.png" alt="icono ahorros" />
      </section>
    </div>
    <div id='cardCredito2' class="hidden rounded-md w-56 md:w-1/4 xl:w-1/5 aspect-[1.2/1]  max-h-[380px] hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
      <h1 class="text-[2vw] xl:text-[1.6vw]  text-cyan-400 bg-white rounded-t-3xl h-[30%] flex justify-center items-center font-bold">
        CRÉDITOS
      </h1>
      <section class="text-[1.5vw] xl:text-[1.1vw] flex justify-center items-center p-2.5 body-card text-white h-[70%] rounded-b-xl">
        <ul class="list-disc w-1/2 h-full flex-col flex justify-around items-start">
          <li onclick="location.href='../views/microCredito'" class="hover:text-cyan-300">Microcrédito</li>
          <li onclick="location.href='../views/creditoDeConsumo'" class="hover:text-cyan-300">De Consumo</li>
          <li onclick="location.href='../views/creditoEmergente'" class="hover:text-cyan-300">Emergente</li>
          <li onclick="location.href='../views/simuladorCreditos'" class="hover:text-cyan-300">Simulador</li>
        </ul>
      </section>
    </div>
  </div>
</div>
<div class="self-center w-full h-96 relative -top-20 md:hidden flex flex-col">
  <img class="h-full w-full" src="../assets/images/barra posterior servicios.png" alt="" />
  <div id="carouselExampleControls" class="carousel slide relative -top-[calc(50%)]" data-bs-ride="carousel">
    <div class="carousel-inner relative w-full overflow-hidden">
      <div class="carousel-item active relative float-left w-full">
        <div id="cardCarouselCredito" class="block rounded-md m-auto w-60 hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
          <h1 class="text-cyan-400 bg-white rounded-t-3xl h-16 flex justify-center items-center font-bold">
            CRÉDITOS
          </h1>
          <section class="p-3 flex flex-col items-center justify-between body-card text-white text-xs h-[calc(140px)] rounded-b-xl">
            <p class="text-center">
              Te financiamos para juntos lograr tus objetivos
            </p>
            <img class="h-16" src="../assets/logos/icono_creditos.png" alt="icono ahorros" />
          </section>
        </div>
        <div id="cardCarouselCredito2" class="hidden rounded-md m-auto w-60 hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
          <h1 class="text-cyan-400 bg-white rounded-t-3xl h-16 flex justify-center items-center font-bold">
            CRÉDITOS
          </h1>
          <section class="p-3 flex flex-col items-center body-card text-white text-xs h-[calc(140px)] rounded-b-xl">
            <ul class="list-disc w-1/2 h-full flex-col flex justify-around items-start">
              <li onclick="location.href='../views/microCredito'" class="hover:text-cyan-300">Microcrédito</li>
              <li onclick="location.href='../views/creditoDeConsumo'" class="hover:text-cyan-300">De Consumo</li>
              <li onclick="location.href='../views/creditoEmergente'" class="hover:text-cyan-300">Emergente</li>
              <li onclick="location.href='../views/simuladorCreditos'" class="hover:text-cyan-300">Simulador</li>
            </ul>
          </section>
        </div>
      </div>
      <div class="carousel-item relative float-left w-full">
        <div id='cardCarouselAhorro' class="block rounded-md w-60 m-auto hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
          <h1 class="text-cyan-400 bg-white rounded-t-3xl h-16 flex justify-center items-center font-bold">
            AHORROS
          </h1>
          <section class="p-3 flex flex-col items-center justify-between body-card text-white text-xs h-[calc(140px)] rounded-b-xl">
            <p class="text-center">
              Deja que tu dinero crezca mientras ahorras para el futuro
            </p>
            <img class="h-16" src="../assets/logos/icono_ahorros.png" alt="icono ahorros" />
          </section>
        </div>
        <div id='cardCarouselAhorro2' class="hidden rounded-md w-60 m-auto hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
          <h1 class="text-cyan-400 bg-white rounded-t-3xl h-16 flex justify-center items-center font-bold">
            AHORROS
          </h1>
          <section class="p-3 flex flex-col items-center body-card text-white text-xs h-[calc(140px)] rounded-b-xl">
            <ul class="list-disc w-1/2 h-full flex-col flex justify-around items-start">
              <li class="hover:text-cyan-300" onclick="location.href = '../views/ahorrosVista'">A la vista</li>
              <li class="hover:text-cyan-300" onclick="location.href = '../views/ahorrosProgramado'">Programado</li>
              <li class="hover:text-cyan-300" onclick="location.href = '../views/ahorrosCorporativo'">Corporativo</li>
              <li class="hover:text-cyan-300" onclick="location.href = '../views/ahorrosChiquiahorro'">Chiquiahorro</li>
            </ul>
          </section>
        </div>
      </div>
      <div class="carousel-item relative float-left w-full">
        <div id="cardCarouselInversion" class="block rounded-md w-60 m-auto hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
          <h1 class="text-cyan-400 bg-white rounded-t-3xl h-16 flex justify-center items-center font-bold">
            INVERSIONES
          </h1>
          <section class="p-3 flex flex-col items-center justify-between body-card text-white text-xs h-[calc(140px)] rounded-b-xl">
            <p class="text-center">
              Aprovecha tu dinero y obtén una mayor tasa de interés en el
              mercado
            </p>
            <img class="h-16" src="../assets/logos/icono_inversiones.png" alt="icono ahorros" />
          </section>
        </div>
        <div id="cardCarouselInversion2" class="hidden rounded-md w-60 m-auto hover:scale-105 ease-in-out transition duration-300 cursor-pointer">
          <h1 class="text-cyan-400 bg-white rounded-t-3xl h-16 flex justify-center items-center font-bold">
            INVERSIONES
          </h1>
          <section class="p-3 flex flex-col items-center justify-between body-card text-white text-xs h-[calc(140px)] rounded-b-xl">
            <ul class="list-disc w-1/2 h-full flex-col flex items-start">
              <li class="hover:text-cyan-300" onclick="location.href = '../views/inversiones'">Inversiones</li>
            </ul>
          </section>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<div class="section-location | relative  -top-36 ">
  <img class="relative" src="../assets/images/Map/mapa fondo.png" alt="fondo direccion" />
  <div class="w-full flex flex-row justify-center items-center gap-[calc(18%)] absolute top-2 text-cyan-900">
    <div class="w-2/12 flex flex-col items-center gap-3">
      <img id="map-matriz-img" class="hover:scale-105 ease-in-out transition duration-300 cursor-pointer" src="../assets/images/Map/ubicacion matriz.png" alt="icono ubicacion matriz" />
      <section id="map-matriz-section" class="hover:scale-105 ease-in-out transition duration-300 cursor-pointer bg-white w-40 sm:w-52 md:w-60 lg:w-72 shadow-[-8px_10px_13px_1px_rgba(22,87,97,0.6)] rounded-full py-1">
        <p class="text-center text-[calc(10px)] sm:text-xs md:text-sm lg:text-base">
          Barrio Patután <br />100 metros al sur de la plaza central <br />
          Patután-Ecuador
        </p>
      </section>
    </div>
    <div class="w-2/12 h-1/2 flex flex-col items-center gap-3">
      <img id="map-sucursal-img" class="w-1/2 hover:scale-105 ease-in-out transition duration-300 cursor-pointer" src="../assets/images/Map/ubicacion sucursal.png" alt="icono ubicacion matriz" />
      <section id="map-sucursal-section" class="hover:scale-105 ease-in-out transition duration-300 cursor-pointer bg-white w-40 sm:w-52 md:w-60 lg:w-72 shadow-[-8px_10px_13px_1px_rgba(22,87,97,0.6)] rounded-full py-1">
        <p class="text-center text-[calc(10px)] sm:text-xs md:text-sm lg:text-base">
          El Quinche <br />Av.Pichincha y Bolivar esquina <br />
          Pichincha-Ecuador
        </p>
      </section>
    </div>
  </div>
</div>
<div class="relative -top-20">
  <img class="" src="../assets/images/Simulador/simulador.png" alt="logo simulador" />
  <button onclick="location.href = '../views/simuladorCreditos'" class="btn_simulador | hover:scale-105 ease-in-out transition duration-300 cursor-pointer absolute top-[calc(62%)] sm:left-[calc(42%)] left-[calc(50%-50px)] text-white text-xl sm:text-2xl w-2/12 min-w-[calc(100px)] rounded-full h-[calc(30px)] sm:h-[calc(50px)]">
    empezar
  </button>
</div>
<div class="relative -top-20 flex items-center justify-center flex-col gap-2 my-[1rem] lg:m-[4rem] md:flex-row md:gap-10">
  <div class="w-10/12 md:w-7/12 flex aspect-video">
    <!-- class="h-56 sm:h-72 lg:h-96  md:mt-20 lg:mt-0" -->
    <iframe class="" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fwatch%2F%3Fv%3D1005602793566963&width=700&show_text=false&height=394&appId" scrolling="no" width="100%" height="100%" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">&#160;</iframe>
  </div>
  <div class="bg-cover rounded-xl py-[0.5rem] px-[1.25rem] lg:px-[2rem] text-white w-9/12 sm:w-7/12 md:w-4/12 justify-self-center flex flex-col" style="background-image: url('../assets/images/fondo\ formulario.png')">
    <div class="flex justify-center items-center text-white py-5">
      <h1>FORMULARIO DE CONTACTO</h1>
    </div>
    <form id="form_solicitud_contacto" name="form_solicitud_contacto" action="" method="POST" class="flex flex-col gap-6">
      <div class="flex flex-row items-center gap-1 w-full bg-cyan-500 rounded-lg h-10 px-2 py-1">
        <img class="h-[30px]" src="../assets/logos/icono_formulario_nombre.png" alt="Nombre" />
        <input id="nombre" name="nombre" class="focus:bg-cyan-500 active:bg-cyan-500 ml-[calc(5%)] bg-cyan-500 w-11/12 focus:outline-none placeholder-gray-300" placeholder="Nombre completo" name="Nombre" type="text" required />
      </div>
      <div class="flex flex-row items-center gap-1 w-full bg-cyan-500 rounded-lg h-10 px-2 py-1">
        <img class="h-[30px]" src="../assets/logos/icono_formulario_correo.png" alt="correo" />
        <input id="email" name="email" class="focus:bg-cyan-500 active:bg-cyan-500 ml-[calc(5%)] bg-cyan-500 w-11/12 focus:outline-none placeholder-gray-300" placeholder="Correo Electrónico" name="Nombre" type="email" required />
      </div>
      <div class="flex flex-row items-center gap-1 w-full bg-cyan-500 rounded-lg h-10 px-2 py-1">
        <img class="h-[30px]" src="../assets/logos/icono_formulario_telefono.png" alt="telefono" />
        <input id="telefono" name="telefono" class="no-arrows focus:bg-cyan-500 active:bg-cyan-500 ml-[calc(5%)] bg-cyan-500 w-11/12 focus:outline-none placeholder-gray-300" placeholder="Número de teléfono" name="Nombre" type="number" required />
      </div>
      <div class="flex flex-row items-center gap-1 w-full bg-cyan-500 rounded-lg h-10 px-2 py-1">
        <img class="h-[30px]" src="../assets/logos/sectorIco.png" alt="telefono" />
        <input id="sector" name="sector" class="focus:bg-cyan-500 active:bg-cyan-500 ml-[calc(5%)] bg-cyan-500 w-11/12 focus:outline-none placeholder-gray-300" placeholder="Sector" name="Nombre" type="text" required />
      </div>
      <div class="">
        <textarea id="message" name="message" rows="4" cols="50" class="h-full p-2 bg-cyan-500 placeholder-gray-300 w-full rounded-lg focus:outline-none" placeholder="Mensaje..." required></textarea>
      </div>
      <button id="btn_form_contacto" type="submit" class="self-center w-44 bg-cyan-500 rounded-lg h-10 hover:scale-105 ease-in-out transition duration-300">
        ENVIAR
      </button>
    </form>
  </div>
</div>
<div class="relative -top-20 w-10/12 items-center flex flex-col gap-[1rem] sm:flex-row justify-center lg:gap-[5rem] self-center">
  <a class=" hover:scale-105 ease-in-out transition duration-300 cursor-pointer" href="https://www.bce.fin.ec/" target="_blank" rel="noreferrer">
    <img class="max-h-[100px] sm:max-h-[200px]" src="../assets/images/Enlaces_interes/banco-centrar-transparente.png" alt="logo banco_central" />
  </a>
  <a class=" hover:scale-105 ease-in-out transition duration-300 cursor-pointer" href="https://educate.cosede.gob.ec/" target="_blank" rel="noreferrer">
    <img class="max-h-[100px] sm:max-h-[200px]" src="../assets/images/Enlaces_interes/cosede-transparente.png" alt="logo cosede" />
  </a>
  <a class=" hover:scale-105 ease-in-out transition duration-300 cursor-pointer" href="https://www.sri.gob.ec/home" target="_blank" rel="noreferrer">
    <img class="max-h-[100px] sm:max-h-[200px]" src="../assets/images/Enlaces_interes/Sri-transparente.png" alt="logo sri" />
  </a>
  <a class=" hover:scale-105 ease-in-out transition duration-300 cursor-pointer" href="https://www.seps.gob.ec//" target="_blank" rel="noreferrer">
    <img class="max-h-[100px] sm:max-h-[200px]" src="../assets/images/Enlaces_interes/super-de-bancos-transparente.png" alt="logo superintendencia" />
  </a>
  <a class=" hover:scale-105 ease-in-out transition duration-300 cursor-pointer" href="https://www.uafe.gob.ec/" target="_blank" rel="noreferrer">
    <img class="max-h-[100px] sm:max-h-[200px]" src="../assets/images/Enlaces_interes/uafe-transparente.png" alt="logo uafe" />
  </a>
</div>
<div id="myModal" class="modal">
  <span class="close">×</span>
  <img class="modal-content" id="img01" src="../images/popUps/modal_horario.png">
</div>
<script>
  /* let map_sucursal_img = document.getElementById('map-sucursal-img');
  let map_sucursal_section = document.getElementById('map-sucursal-section'); */
  let map_matriz_img = document.getElementById('map-matriz-img');
  let map_matriz_section = document.getElementById('map-matriz-section');

  map_matriz_img.addEventListener("click", goto);
  map_matriz_section.addEventListener("click", goto);

  function goto() {
    window.open('https://goo.gl/maps/VaPSEFaQAFgJWV3B9', '_blank');
  }
</script>
<script src="scripts/modalP.js" type="text/javascript"></script>
<script src="scripts/envioEmail2.js" type="text/javascript"></script>
<script src="scripts/cardAnimation.js" type="text/javascript"></script>
<?php require 'footer.php'; ?>