<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'sidebar_left.php'; ?>
<div class="flex flex-col justify-center items-center">
  <section class="vistaSlider | flex flex-col justify-center items-center">
    <section class="">
      <img class="content-[url('../assets/images/credito/micro/barraSm.png')] md:content-[url('../assets/images/credito/micro/barra.png')]" alt="ahorro chiquiahorro">
    </section>
  </section>
  <div class="w-[min(1400px,80%)]">
    <section class="vistaContent | flex flex-col items-center bg-cover bg-no-repeat" style="background-image: url('../assets/images/ahorros/fondo.png');">
      <div class="topbar | bg-cover text-slate-200 px-3 py-1 text-center rounded-[0_0_20px_20px] w-[min(75%,800px)]" style="background-image: url('../assets/images/ahorros/topbar.png');">
        <p class="text-xl sm:text-2xl font-medium">
          “Establecer metas es el primer paso para transformar lo invisible en visible”
        </p>
      </div>
      <div class="flex flex-col lg:flex-row gap-10 items-center w-full my-5">
        <section class="flex flex-col items-center justify-center text-[#052b9a] w-4/5">
          <div class="bg-slate-100 border-2 border-[#052b9a] rounded-md px-8 py-1.5 w-11/12 hover:scale-105 ease-in-out transition duration-300">
            <p class=" leading-6 sm:leading-8 md:leading-10 text-xl lg:text-2xl">
              Una nueva alternativa de crédito que permite cubrir tus necesidades relacionadas con actividades productivas y gastos de consumo generando además un ahorro a largo plazo
            </p>
          </div>
          <div class="flex md:flex-row flex-col gap-16">
            <div class="flex flex-col gap-3">
              <h1 class="font-semibold mt-3 mb-2 text-center text-3xl">
                Características
              </h1>
              <img class="w-[400px] hover:scale-105 ease-in-out transition duration-300" src="../assets/images/credito/micro/caracteristicas.png" alt="">
            </div>
            <div class="flex flex-col justify-center items-center">
              <img class="w-[150px] hover:scale-105 ease-in-out transition duration-300" src="../assets/images/credito/calculadora.png" alt="">
              <button onclick="location.href = '../views/simuladorCreditos'" class="text-slate-200 hover:scale-105 ease-in-out transition duration-300 text-2xl border-[1px] px-5 py-1.5 border-slate-200 rounded-full bg-gradient-to-r from-[#0a3d6c] via-[#157cbc] to-[#0a3d6c]">Calcular</button>
            </div>
            <!-- <div class="sm:hidden flex flex-row justify-center items-center">
            <img class="w-[50px]" src="../assets/images/credito/arrow.png" alt="arrow">
            <button onclick="location.href = '../views/simuladorCreditos'" class="text-slate-200 hover:scale-105 ease-in-out transition duration-300 text-2xl border-[1px] px-5 py-1.5 border-slate-200 rounded-full bg-gradient-to-r from-[#0a3d6c] via-[#157cbc] to-[#0a3d6c]">Calcular</button>
          </div> -->
          </div>
        </section>
        <section class="flex flex-col items-center gap-20">
          <div class="flex flex-col items-center w-[min(480px,90%)]">
            <img src="../assets/images/credito/requisitos.png" alt="requisitos">
          </div>
        </section>
      </div>
    </section>
  </div>
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