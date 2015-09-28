var sup_izq = [250, 24];
var sup_der = [355, 24];
var inf_izq = [250, 465];
var inf_der = [355, 465];

var reservas = new Array();

var ancho = sup_der[0] - sup_izq[0];
var alto = inf_der[1] - sup_izq[1];
var tamX = ancho / avion[0].length;
var tamY = alto / avion.length;

document.addEventListener("DOMContentLoaded", init, false);

function NtoA(n) {
    return String.fromCharCode(n + 65);
}
function init()
{

    var canvas = document.getElementById("canvas");
    var c = canvas.getContext('2d');
    canvas.addEventListener("mousedown", getPosition, false);

    for (var i = 0; i < avion.length; i++) {
        for (var j = 0; j < avion[i].length; j++) {
            if (avion[i][j] == 0) {
                c.beginPath();
                c.fillStyle = '#19B5FE';
            } else if (avion[i][j] == 1) {
                c.beginPath();
                c.fillStyle = '#F22613';
            } else if (avion[i][j] == 3) {
                c.beginPath();
                c.fillStyle = '#F7CA18';
            }
            c.rect(sup_izq[0] + tamX * j, sup_izq[1] + tamY * i, tamX, tamY);
            c.fill();
            c.strokeStyle = '#FFF'
            if (avion[i][j] !== 2) {
                c.beginPath();
                c.font = '6pt verdana';
                c.fillStyle = '#fff';
                c.fillText(NtoA(j) + i, (sup_izq[0] + tamX * j) + 1, (sup_izq[1] + tamY + tamY * i) - 2);
            }

        }
    }
}


function getPosition(event)
{
    var x = new Number();
    var y = new Number();
    var canvas = document.getElementById("canvas");

    if (event.x != undefined && event.y != undefined)
    {
        x = event.x;
        y = event.y;
    }
    else // Firefox method to get the position
    {
        x = event.clientX + document.body.scrollLeft +
                document.documentElement.scrollLeft;
        y = event.clientY + document.body.scrollTop +
                document.documentElement.scrollTop;
    }

    x -= canvas.offsetLeft;
    y -= canvas.offsetTop;

    if ((x > sup_izq[0]) && (x < sup_der[0]) && (y < inf_der[1]) && (y > sup_der[1])) {
        x = Math.floor((x - sup_izq[0]) / tamX);
        y = Math.floor((y - sup_izq[1]) / tamY);

        if (avion[y][x] == 0) {
            avion[y][x] = 3;
            init();
        } else if (avion[y][x] == 1) {
            alert(x + " " + y + " La silla ya ha sido reservada :(");
        }
    }
}

function reservar() {
    var x = "", y = "", cad = "";
    for (var i = 0; i < avion.length; i++) {
        for (var j = 0; j < avion[i].length; j++) {
            if (avion[i][j] == 3) {
               x += j+",";
               y += i+",";
            }
        }
    }
   var cad = "?x="+x.substring(0, x.length-1)+";y="+y.substring(0, y.length-1)+";n="+(x.length)/2;
   location.href = "avion.php"+cad;
}