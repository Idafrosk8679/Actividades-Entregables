//Arrays iniciales
const filaorigen = [
  [
    [3, 3, 3],
    [2, 4, 5],
    [5, 6, 4]
  ],
  [
    [6, 5, 1],
    [1, 5, 6],
    [1, 5, 1]
  ],
  [
    [2, 1, 1],
    [2, 2, 2],
    [4, 6, 4]
  ],
  [
    [6, 6, 2],
    [3, 4, 3],
    [3, 4, 5]
  ]
];

const colorigen = [
  [
    ["purple", "yellow", "green"],
    ["purple", "red", "green"],
    ["purple", "red", "blue"]
  ],
  [
    ["purple", "yellow", "purple"],
    ["red", "blue", "yellow"],
    ["green", "red", "yellow"]
  ],
  [
    ["yellow", "white", "blue"],
    ["white", "green", "red"],
    ["purple", "green", "white"]
  ],
  [
    ["white", "blue", "blue"],
    ["red", "yellow", "white"],
    ["blue", "green", "white"]
  ]
];

var fila = [];
var color = [];
var dadoinitC;
var dadoinitCol = [];
var dadofinC;
var dadofinCol = [];
var cont = 0;
var tablero = [];
var tableroi = [];
var tablerof = [];
var movAnt = [];
document.getElementById("movimientos").innerHTML = "Has hecho " + cont + " movimientos";


//Crea tablero
function creaTablero() {

  document.write("<table id=Patatablademierda>");
  document.write("<tr>");
  for (var i = 0; i < 2; i++) {
    document.write("<td>");
    document.write("<table>");
    for (var j = 0; j < 3; j++) {
      document.write("<tr>");
      for (var k = 0; k < 3; k++) {
        document.write("<td id='" + i + j + k + "' onclick='marca(this)' data-cuadros=" + i + " data-fila=" + j + " data-columna=" + k + "></td>");
      }
      document.write("</tr>");
    }
    document.write("</table>");
    document.write("</td>");
  }
  document.write("</tr>");
  document.write("<tr>");
  for (var i = 2; i < 4; i++) {
    document.write("<td>");
    document.write("<table>");
    for (var j = 0; j < 3; j++) {
      document.write("<tr>");
      for (var k = 0; k < 3; k++) {
        document.write("<td id='" + i + j + k + "' onclick='marca(this)' data-cuadros=" + i + " data-fila=" + j + " data-columna=" + k + "></td>");
      }
      document.write("</tr>");
    }
    document.write("</table>");
    document.write("</td>");
  }
  document.write("</tr>");
  document.write("</table>");
}
//Fin crea tablero

//Rellenar tabla
function pintarTablero() {

  for (var i = 0; i < 4; i++) {
    for (var j = 0; j < 3; j++) {
      for (var k = 0; k < 3; k++) {

        document.getElementById('' + i + j + k + '').innerHTML = fila[i][j][k];
        document.getElementById('' + i + j + k + '').style.backgroundColor = color[i][j][k];
        document.getElementById('' + i + j + k + '').style.border = "solid ROSYBROWN";
      }
    }
  }
}
//Fin rellenar tablas

//Funcion aleatorio
function aleatorio() {
  fila=[];
  color=[];
  var filacopy = filaorigen.slice(0,filaorigen.length);
  var colorcopy = colorigen.slice(0,colorigen.length);
  //Assignamos su lugar
  for (var cont = filacopy.length; cont > 0; cont--) {
    //Elegimos que cuadrante coje (numero y color iguales)
    var x = Math.floor(Math.random() * (cont));
    //Almacena en variable auxiliar
    var filaux = filacopy[x];
    var colaux = colorcopy[x];
    //Introduce datos en variable a utilizar ( ya ordenados)
    fila.push(filaux);
    color.push(colaux);
    //Elimina los cuadrantes ya usados
    filacopy.splice(x, 1);
    colorcopy.splice(x, 1);
  }
  tablero.push(fila, color);
  return tablero;
}
// Fin función aleatorio

// Asignar posicion inicial
function inicio() {
  tableroi = [];
  //Saca numero de 1 al 6
  var u = Math.floor(Math.random() * (4));
  var n = Math.floor(Math.random() * (3));
  var m = Math.floor(Math.random() * (3));
  tableroi.push(tablero[0][u][n][m], tablero[1][u][n][m], u, n, m);
  document.getElementById("inum").innerHTML = tableroi[0];
  document.getElementById("inum").style.backgroundColor = tableroi[1];
  document.getElementById('' + u + n + m + '').style.border = "dotted #000010";
  return tableroi;
}
// Fin signar posicion inicial

// Asignar posicion final
function final() {
  tablerof = [];
  //Saca numero de 1 al 6
  var u = Math.floor(Math.random() * (4));
  var n = Math.floor(Math.random() * (3));
  var m = Math.floor(Math.random() * (3));
  tablerof.push(tablero[0][u][n][m], tablero[1][u][n][m], u, n, m);

  if (tableroi[0] == tablerof[0] && tableroi[1] == tablerof[1]) {
    tablerof = [];
    var u = Math.floor(Math.random() * (4));
    var n = Math.floor(Math.random() * (3));
    var m = Math.floor(Math.random() * (3));
    tablerof.push(tablero[0][u][n][m], tablero[1][u][n][m], u, n, m);
    document.getElementById("fnum").innerHTML = tablerof[0];
    document.getElementById("fnum").style.backgroundColor = tablerof[1];
    document.getElementById('' + u + n + m + '').style.border = "solid lime";
  } else {
    document.getElementById("fnum").innerHTML = tablerof[0];
    document.getElementById("fnum").style.backgroundColor = tablerof[1];
    document.getElementById('' + u + n + m + '').style.border = "solid lime";
  }
  return tablerof;
}
// Fin asignar posicion final

//Funcion de reset
function reset() {
  cont = 0;
  document.getElementById('movimientos').innerHTML = "Has hecho " + cont + " movimientos";
  for (var i = 0; i < 4; i++) {
    for (var j = 0; j < 3; j++) {
      for (var k = 0; k < 3; k++) {
        document.getElementById('' + i + j + k + '').style.border = "solid ROSYBROWN";
      }
    }
  }
  document.getElementById('' + tableroi[2] + tableroi[3] + tableroi[4] + '').style.border = "dotted #000010";
  document.getElementById('' + tablerof[2] + tablerof[3] + tablerof[4] + '').style.border = "solid lime";
}
//Final reset

//Accion de hacer click
function marca(click) {
  i = click.dataset.cuadros;
  j = click.dataset.fila;
  k = click.dataset.columna;
  var movAct = [tablero[0][i][j][k], tablero[1][i][j][k]];
  if (cont == 0) {
    a = tableroi[2]
    b = tableroi[3]
    c = tableroi[4]
    movAnt = [tableroi[0], tableroi[1]];
  }
  if (movAct[0] == movAnt[0] && movAct[1] == movAnt[1]) {
    alert("Ya estas en esta casilla");

  } else if (movAct[0] == movAnt[0] || movAct[1] == movAnt[1]) {
    if (movAct[0] == tablerof[0] && movAct[1] == tablerof[1]) {
      cont++;
      document.getElementById('movimientos').innerHTML = "Ganaste con " + cont + " movimientos";
      document.getElementById('' + a + b + c + '').style.border = "groove #E4FE0F";
      document.getElementById('' + tableroi[2] + tableroi[3] + tableroi[4] + '').style.border = "dotted #000010";
    } else {
      document.getElementById('' + a + b + c + '').style.border = "groove #E4FE0F";
      document.getElementById('' + tableroi[2] + tableroi[3] + tableroi[4] + '').style.border = "dotted #000010";
      a = i;
      b = j;
      c = k;
      cont++;
      movAnt = [movAct[0], movAct[1]];
      document.getElementById('' + i + j + k + '').style.border = "solid lime";
      document.getElementById("movimientos").innerHTML = "Has hecho " + cont + " movimientos";
    }
  } else {
    alert("Movimiento no valido")
  }
}
//Fin accion hacer click

function cliccordenada(cordenada) {

  pos = pos3;

  if ((pos3 != "") && (posinicial != pos1) && (pos2 != pos3)) {

    if (pos3 != pos1) {

      document.getElementById(pos1).style.borderColor = "black";

    } else {

      document.getElementById(pos3).style.borderColor = "black";

    }

  }

  let posicion = cordenada.id;

  pos3 = posicion;

  posicion = posicion.split(".");

  fila = posicion[0];

  columna = posicion[1];
  clase = cordenada.style.backgroundColor;
  valor = document.getElementById(pos3).innerText;
  movimiento(pos1, posicion);
}

function menor() {
  pos = pos3;
  if ((pos3 != "") && (posinicial != pos1) && (pos2 != pos3)) {
    if (pos3 != pos1) {
      document.getElementById(pos1).style.borderColor = "black";
    } else {
      document.getElementById(pos3).style.borderColor = "black";
    }
  }
  let posicion = (document.getElementById("fila1").value + "." + document.getElementById("columna1").value);
  console.log(posicion);
  pos3 = posicion;
  clase = document.getElementById(posicion).style.backgroundColor;
  console.log(clase);
  posicion = posicion.split(".");

  fila = posicion[0];
  columna = posicion[1];
  valor = document.getElementById(pos3).innerText;
  movimiento(pos1, posicion);
}


function nuevo(){
  aleatorio();
  pintarTablero();
  inicio();
  final();
  cliccordenada();
}
//Llamada a funciones
creaTablero();
nuevo();

