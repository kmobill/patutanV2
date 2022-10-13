<body class="flex flex-col">
  <!-- <nav id="navbar" class="bg-cover navbar_fondo1 sticky top-0 flex flex-wrap items-center justify-between lg:h-16 h-72"> -->
  <nav id="navbar" class="bg-cover navbar_fondo1 sticky top-0 flex flex-wrap items-center justify-between h-16 lg:h-16">
    <div class="flex flex-wrap items-center justify-between w-full">
      <div class="ml-3 h-10 w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
        <img class="" onclick="location.href='../views/index'" src="../assets/logos/logo patutan barra menú.png" alt="Logo Patutan" width="240px" height="38.38px" />
        <button id="btn_hamburguer" class="text-white text-4xl cursor-pointer lg:hidden focus:outline-none mr-4" type="button">
          &equiv;
        </button>
      </div>
      <!-- <div id="nav_barra" class="lg:flex flex-grow lg:justify-end items-center" id="example-navbar-danger"> -->
      <div id="nav_barra" class="hidden  lg:flex flex-grow sm:justify-start lg:justify-end justify-center items-center" id="example-navbar-danger">
        <ul class="text-base 2xl:text-[1.2vw] rounded-md border-solid border-2 border-white lg:border-none p-1 pl-2 pr-2 ml-2 btns_container mt-2 gap-1 flex flex-col items-center lg:mt-0 lg:flex-row-reverse list-none mr-2">
          <div id="search_container" class=" min-w-[126px] absolute left-[calc(50%-80px)] right-[calc(50%+80px)] top-[85px] sm:left-[160px] sm:right-[calc(100%-180px)] sm:top-[60px] lg:left-[calc(100%-180px)] lg:top-14 lg:right-6 flex flex-col text-white">
          </div>
          <div class="nav_btn input_search self-center h-[50%] max-h-[30px] w-[126px]">
            <input id="navbar-input-search" class="py-1" type="text" />
            <img src="../assets/logos/loupe.png" alt="loupe log" />
          </div>
          <div class="nav_btn h-8 w-full lg:w-auto lg:bg-transparent">
            <div class="w-full h-full group inline-block">
              <button onclick="location.href='../views/blogNoticias'" class="w-full  mr-1 xl:mr-2 h-full rounded-md outline-none focus:outline-none px-3 py-1rounded-sm flex items-center">
                <span class="flex-1 text-slate-100">Blog</span>
              </button>
            </div>
          </div>
          <div class="nav_btn h-8 w-full lg:w-auto lg:bg-transparent">
            <div class="w-full h-full group inline-block">
              <button onclick="location.href='../views/contactanos'" class="w-full  mr-1 xl:mr-2 h-full rounded-md outline-none focus:outline-none px-3 py-1rounded-sm flex items-center">
                <span class="flex-1 text-slate-100">Contáctanos</span>
              </button>
            </div>
          </div>
          <div class="nav_btn h-8 w-full lg:w-auto lg:bg-transparent">
            <div class="w-full h-full group inline-block relative lg:static">
              <button onclick="location.href='../views/nosotros'" class="w-full  mr-1 xl:mr-2 h-full rounded-md outline-none focus:outline-none px-3 py-1rounded-sm flex items-center">
                <span class="flex-1 text-slate-100">Nosotros</span>
              </button>
              <ul class="mt-1 rounded-sm transform scale-0 group-hover:scale-100 absolute -right-48 top-0 lg:top-auto lg:right-auto transition duration-150 ease-in-out origin-top">
                <li onclick="location.href='../views/nosotros?'" class="rounded-sm px-3 py-1">Crecimiento e Historia</li>
                <li onclick="location.href='../views/nosotros?#misionVision'" class="rounded-sm px-3 py-1">Mision y Visión</li>
                <li onclick="location.href='../views/nosotros?#equipoTrabajo'" class="rounded-sm px-3 py-1">Equipo de Trabajo</li>
              </ul>
            </div>
          </div>
          <div class="nav_btn h-8 w-full lg:w-auto lg:bg-transparent">
            <div class="w-full h-full group inline-block relative lg:static">
              <button onclick="location.href='../views/servicios'" class="w-full  mr-1 xl:mr-2 h-full rounded-md outline-none focus:outline-none px-3 py-1rounded-sm flex items-center">
                <span class="flex-1 text-slate-100">Servicios</span>
              </button>
              <ul class="mt-1 rounded-sm transform scale-0 group-hover:scale-100 absolute -right-40 top-0 lg:top-auto lg:right-auto transition duration-150 ease-in-out origin-top">
                <li onclick="location.href='../views/servicios?#pagoServicios'" class="rounded-sm px-3 py-1">Pago de Servicios</li>
                <li onclick="location.href='../views/servicios?#recaudaciones'" class="rounded-sm px-3 py-1">Recaudaciones</li>
                <li onclick="location.href='../views/servicios?#transferencias'" class="rounded-sm px-3 py-1">Transferencias</li>
                <li onclick="location.href='../views/servicios?#impuestos'" class="rounded-sm px-3 py-1">Rise</li>
                <li onclick="location.href='../views/servicios?#recargas'" class="rounded-sm px-3 py-1">Recargas</li>
                <li onclick="location.href='../views/servicios?#impuestos'" class="rounded-sm px-3 py-1">Impuestos</li>
                <li onclick="location.href='../views/servicios?#otros'" class="rounded-sm px-3 py-1">Otros</li>
              </ul>
            </div>
          </div>
          <div class="nav_btn h-8 w-full lg:w-auto lg:bg-transparent">
            <div class="w-full h-full group inline-block relative lg:static">
              <button class="w-full  mr-1 xl:mr-2 h-full rounded-md outline-none focus:outline-none px-3 py-1rounded-sm flex items-center">
                <span class="flex-1 text-slate-100">Productos</span>
              </button>
              <ul class="mt-1 rounded-sm transform scale-0 group-hover:scale-100 absolute -right-32 top-0 lg:top-auto lg:right-auto transition duration-150 ease-in-out origin-top">
                <li class="rounded-sm relative px-3 py-1">
                  <button class="w-full text-left flex items-center outline-none focus:outline-none">
                    <span class="pr-1 flex-1">Ahorros</span>
                  </button>
                  <ul class="rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left">
                    <li onclick="location.href='ahorrosVista'" class="px-3 py-1">A la Vista</li>
                    <li onclick="location.href='ahorrosProgramado'" class="px-3 py-1">Programado</li>
                    <li onclick="location.href='ahorrosCorporativo'" class="px-3 py-1">Corporativo</li>
                    <li onclick="location.href='ahorrosChiquiahorro'" class="px-3 py-1">Chiquiahorro</li>
                  </ul>
                </li>
                <li class="rounded-sm relative px-3 py-1">
                  <button class="w-full text-left flex items-center outline-none focus:outline-none">
                    <span class="pr-1 flex-1">Crédito</span>
                  </button>
                  <ul class="rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left w-32">
                    <li onclick="location.href='../views/microCredito'" class="px-3 py-1">Microcrédito</li>
                    <li onclick="location.href='../views/creditoDeConsumo'" class="px-3 py-1">De Consumo</li>
                    <li onclick="location.href='../views/creditoEmergente'" class="px-3 py-1">Emergente</li>
                    <li onclick="location.href='../views/simuladorCreditos'" class="px-3 py-1">Simulador</li>
                  </ul>
                </li>
                <li class="rounded-sm relative px-3 py-1">
                  <button onclick="location.href='../views/inversiones'" class="w-full text-left flex items-center outline-none focus:outline-none">
                    <span class="pr-1 flex-1">Inversiones</span>
                  </button>
                  <ul class="rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left">
                    <li onclick="location.href='../views/inversiones'" class="px-3 py-1">Plazo Fijo</li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </ul>
      </div>
    </div>
  </nav>