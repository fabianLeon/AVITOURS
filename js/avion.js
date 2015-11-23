var sup_izq = [250, 24];
var sup_der = [355, 24];
var inf_izq = [250, 465];
var inf_der = [355, 465];

var ancho = sup_der[0] - sup_izq[0];
var alto = inf_der[1] - sup_izq[1];
var tamX = ancho / avion[0].length;
var tamY = alto / avion.length;
var cont = 1;

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

            var arrayTemp = (avion[i][j]).split('*');
            var est = arrayTemp[0];
            var nom = arrayTemp[1];
            if (est !== '') {
                if (est == 0) {
                    c.beginPath();
                    c.fillStyle = '#19B5FE';
                } else if (est == 1) {
                    c.beginPath();
                    c.fillStyle = '#F22613';
                } else if (est == 2) {
                    c.beginPath();
                    c.fillStyle = '#F7CA18';
                }
                c.rect(sup_izq[0] + tamX * j, sup_izq[1] + tamY * i, tamX, tamY);
                c.fill();

                c.beginPath();
                c.font = '6pt verdana';
                c.fillStyle = '#fff';
                c.fillText(nom, (sup_izq[0] + tamX * j) + 1, (sup_izq[1] + tamY + tamY * i) - 2);
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
        if (avion[y][x] !== "") {
            var arrayTemp = (avion[y][x]).split('*');
            est = arrayTemp[0];
            nom = arrayTemp[1];

            if (est == 0) {
                if (cont <= numero) {
                    cont++;
                    avion[y][x] = 2 + "*" + nom;
                    init();
                } else {
                    alert("No puede seleccionar la silla " + nom + ", Numero de pasajeros completos");
                }
            } else if (est == 1) {
                alert("La silla " + nom + " ya ha sido reservada");
            } else if (est == 2) {
                avion[y][x] = 0 + "*" + nom;
                cont--;
                init();
            }

        }
    }
}
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value;
    });
    return vars;
}

function reservar() {
    var sillas = "", est = 0, nom = "", arrayTemp;

    for (var i = 0; i < avion.length; i++) {
        for (var j = 0; j < avion[i].length; j++) {
            if (avion[i][j] != "") {
                arrayTemp = (avion[i][j]).split('*');
                est = arrayTemp[0];
                nom = arrayTemp[1];
                if (est == 2) {
                    sillas += nom + ",";
                }
            }
        }
    }
    if (cont < numero +1){
        alert("Debe seleccionar todas las sillas de los pasajeros");
    } else {
        var cad = "?nombres=" + sillas;
        location.href = "pasajeros.php" + cad +"&vuelos_ida="+ getUrlVars()['vuelos_ida'];
    }
}