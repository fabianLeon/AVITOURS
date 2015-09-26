
var avion =           [ [0,0,2,2,0,0],
                        [0,0,2,2,1,0],
                        [0,1,2,2,0,1],
                        [0,0,2,2,1,0],
                        [0,1,2,2,0,0],
                        [0,0,2,2,1,0],
                        [0,1,2,2,0,0],
                        [0,0,2,2,1,0],
                        [0,1,2,2,0,1],
                        [0,0,2,2,0,0],
                        [0,1,2,2,1,0],
                        [0,0,2,2,0,0],
                        [0,1,2,2,0,1],
                        [0,0,2,2,0,0],
                        [0,1,2,2,1,0],
                        [0,0,2,2,0,0],
                        [0,1,2,2,0,1]];


var sup_izq   = [263,84];
var sup_der   = [358,84];

var inf_izq   = [263,462];
var inf_der   = [358,462];
var ancho     = sup_der[0] - sup_izq[0];
var alto      = inf_der[1] - sup_izq[1];
var tamX      = ancho / avion[0].length;
var tamY      = alto / avion.length;
  
document.addEventListener("DOMContentLoaded", init, false);

function init()
{

  var canvas    = document.getElementById("canvas");
  var c       = canvas.getContext('2d');
  canvas.addEventListener("mousedown", getPosition, false);

  for (var i = 0;i < avion.length; i++) {
    for (var j = 0;j < avion[i].length; j++){
      if(avion[i][j] == 0){
        c.beginPath();
        c.fillStyle = '#F5D76E';
        c.rect(sup_izq[0]+tamX*j, sup_izq[1]+tamY*i, tamX, tamY);
        c.fill();
        c.strokeStyle = '#FFF'
      }else if(avion[i][j] == 1){
        c.beginPath();
        c.fillStyle = '#F39C12';
        c.rect(sup_izq[0]+tamX*j, sup_izq[1]+tamY*i, tamX, tamY);
        c.fill();
        c.strokeStyle = '#FFF'
      }else{
        c.beginPath();
        c.fillStyle = '#FFF';
        c.rect(sup_izq[0]+tamX*j, sup_izq[1]+tamY*i, tamX, tamY);
        c.fill();
        c.strokeStyle = '#2ecc71'
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

  if((x >sup_izq[0]) && (x < sup_der[0]) && (y<inf_der[1]) && (y>sup_der[1])) {
      x = Math.floor((x-sup_izq[0])/tamX);
      y = Math.floor((y-sup_izq[1])/tamY);

      if(avion[y][x] == 0){
          alert(x+" "+y+" La silla esta libre y puede reservarse :)");
      }else if(avion[y][x] == 1){
          alert(x+" "+y+" La silla ya ha sido reservada :(");
      }else if(avion[y][x] == 2){
           alert(x+" "+y+" no es posible reservar un pasillo :(");
      }
      
  }
  
}