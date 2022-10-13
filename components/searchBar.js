const $input = document.getElementById('navbar-input-search');
const $log = document.getElementById('search_container')

$input.addEventListener('input', updateValue);

function updateValue(e) {
  const textToSearch = e.srcElement.value
  const matcher = new RegExp(`${textToSearch.toLowerCase()}`);
  if (textToSearch !== '') {
    $log.classList.add("p-1");
    $log.innerHTML = dataToSearch.filter(item => {//['DISPLAY','PATRON','LINK']
      if (Array.isArray(item[1])) {//si el patron no es un array
        for (let index = 0; index < item[1].length; index++) {
          const element = item[1][index];
          if (matcher.test(element.toLowerCase())) {
            return item;
          }
        }
        return null;
      } else {
        if (matcher.test(item[1].toLowerCase())) {
          return item;
        }

      }
      return null;
    }).map((item) =>//['DISPLAY','PATRON','LINK']
      `<div class='px-1 bg-[#093d68e2] cursor-pointer hover:bg-[#72a1b297]'>
              <div onclick="location.href = '../views/${item[2]}'" >${item[0]}</div>
        </div>`
    ).join("");
  } else {
    $log.classList.remove("p-1");
    $log.innerHTML = ''
  }
}

//['DISPLAY','[PATRON] || PATRON','LINK']
const dataToSearch = [
  //PRODUCTOS
  //ahorros
  // ['Ahorros', 'ahorros', 'ahorros'],
  ['Ahorro Programado', ['programado', 'ahorros', 'ahorro programado'], 'ahorrosProgramado'],
  ['Ahorro a la Vista', ['vista', 'ahorros', 'ahorro a la vista'], 'ahorrosVista'],
  ['Ahorro Coorporativo', ['coorporativo', 'ahorros', 'Ahorro coorporativo'], 'ahorrosCorporativo'],
  ['Ahorro Chiquiahorro', ['chiquiahorro', 'ahorros', 'Ahorro chiquiahorro'], 'ahorrosChiquiahorro'],
  //creditos
  ['Créditos', 'creditos', 'creditos'],//terminar de linkear los resultados
  ['Microcrédito', 'microcredito', 'microCredito'],
  ['Crédito de Consumo', ['consumo', 'deconsumo', 'de consumo', 'Credito de consumo'], 'creditoDeConsumo'],
  ['Crédito Emergente', ['Credito emergente', 'emergente', 'credito'], 'creditoEmergente'],
  //inversiones
  ['Inversiones', ['inversiones', 'plazo fijo', 'plazo'], 'inversiones'],
  //SERVICIOS
  ['Servicios', ['servicios'], 'servicios'],
  ['Pago de Servicios', ['pago', 'servicios', 'de consumo'], 'servicios?#pagoServicios'],
  ['Recaudaciones', ['recaudacion', 'servicios'], 'servicios?#recaudaciones'],
  ['Transferencias', ['Transferencias', 'servicios'], 'servicios?#transferencias'],
  ['RISE', ['RISE', 'servicios'], 'servicios?#impuestos'],
  ['Recargas', ['Recargas', 'servicios'], 'servicios?#recargas'],
  ['Impuestos', ['Impuestos', 'servicios'], 'servicios?#impuestos'],
  ['Otros', ['Otros', 'servicios'], 'servicios?#otros'],
  //SIMULADOR
  ['Simulador', 'simulador', 'simuladorCreditos'],
  //CONTACTO
  ['Contáctanos', 'contactanos', 'contactanos'],
  //NOSOTROS
  ['Nosotros', ['Nosotros'], 'nosotros'],
  ['Crecimiento e Historia', ['crecimiento', 'historia'], 'nosotros?'],
  ['Misión y Visión', ['mision', 'vision', 'Mision y vision'], 'nosotros?#misionVision'],
  ['Equipo de Trabajo', ['equipo', 'trabajo', 'Equipo de trabajo'], 'nosotros?#equipoTrabajo'],
  //BLOG
  ['Blog', 'blog', 'blogNoticias'],
  //EDUCACION FINANCIERA
  ['Educacion Financiera', ['educacion', 'financiera', 'educacion financiera'], 'educacionFinanciera']
]