<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'sidebar_left.php'; ?>
<div class="">
  <section class="vistaSlider | w-full flex flex-col justify-center items-center">
    <section class="">
      <img class="content-[url('../assets/images/ahorros/chiqui/barraChiquiMin.png')] md:content-[url('../assets/images/ahorros/chiqui/barraChiqui.png')]" alt="ahorro chiquiahorro">
    </section>
  </section>
  <section class="vistaContent | flex flex-col items-center bg-cover bg-no-repeat" style="background-image: url('../assets/images/ahorros/fondo.png');">
    <div class="topbar | bg-cover text-slate-200 px-3 py-1 text-center rounded-[0_0_20px_20px] w-[min(75%,800px)]" style="background-image: url('../assets/images/ahorros/topbar.png');">
      <!-- <img src="../assets/images/ahorros/topbar.png" alt="top bar"> -->
      <p class="text-xl sm:text-2xl font-medium">
        “Pensando en los mas pequeños del hogar para crear cultura de ahorro y asi puedan cumplo sus metas y sueños”
      </p>
    </div>
    <div class="flex flex-col md:flex-row gap-10 md:gap-0 items-center w-full text-xl sm:text-2xl my-5">
      <section class="flex flex-col items-center justify-center text-[#052b9a]  w-4/5 2xl:w-1/2">
        <div class="bg-slate-100 border-2 border-[#052b9a] rounded-md px-2 sm:px-5 py-1.5 w-[min(550px,90%)] hover:scale-105 ease-in-out transition duration-300">
          <p>
            Con nuestro chiquiahorro queremos que todos los pequeños puedan acceder a nuestro servicio, empieza de a poco y llega lejos con nustro plan de inversión a largo plazo.
          </p>
        </div>
        <h1 class="font-semibold mt-3 mb-2">
          Características
        </h1>
        <div class="bg-slate-100 border-2 border-[#052b9a] rounded-md pr-1 pl-7 py-1.5 w-[min(550px,90%)] hover:scale-105 ease-in-out transition duration-300">
          <ul class=" pl-2 flex flex-col list-outside list-disc">
            <li>Empieza sin nada con un mínimo de requisitos.</li>
            <li>Hasta un 4% de intereses.</li>
            <li>Como socio tienes accesos a todos nuestros servicios.</li>
          </ul>
        </div>
      </section>
      <section class="flex flex-col items-center hover:scale-105 ease-in-out transition duration-300 2xl:w-1/2">
        <div class="flex flex-col items-center w-[min(480px,90%)]">
          <img src="../assets/images/ahorros/card2.png" alt="">
        </div>
      </section>
    </div>
  </section>
  <section class="flex flex-col md:flex-row gap-2 md:gap-10 bg-cover items-center justify-center text-slate-200 px-3 py-4 text-center  w-full" style="background-image: url('../assets/images/ahorros/topbar.png');">
    <div class="flex flex-row gap-4 items-center">
      <p class="text-3xl font-semibold">
        ¿QUIERES ABRIR UNA CUENTA?
      </p>
      <img class=" hidden sm:block w-[min(40px,90%)]" src="../assets/images/ahorros/arrow.png" alt="button solicitar ahorro">
    </div>
    <button onclick="location.href = '../views/solicitudAhorros'" class="hover:scale-105 ease-in-out transition duration-300 text-2xl border-[1px] px-5 py-1.5 border-slate-200 rounded-full bg-gradient-to-r from-[#0a3d6c] via-[#157cbc] to-[#0a3d6c]">Solicitar</button>
  </section>
  <section class="flex justify-center">
    <?php require 'enlacesInteres.php'; ?>
  </section>
</div>

<?php require 'footer.php'; ?>