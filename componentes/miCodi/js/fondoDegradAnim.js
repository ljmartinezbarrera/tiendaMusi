



var caja = document.querySelector(".fondoDegradAnim");

var t = setInterval(moveGrade, 50);


var a = 63;
var b = 0;
var contador = 1;

function moveGrade()
{


 if (a < 0) 
 {
     contador++;
 }

 if (a > 63) 
 {
    contador++;
 }


 if (contador % 2 == 0) 
 {
    a++;
    b--;

    caja.style.background = `-moz-linear-gradient(bottom left, rgb(${a}, ${a}, ${a}), rgb(${b}, ${b}, ${b}))`;
    caja.style.background = `-webkit-linear-gradient(bottom left, rgb(${a}, ${a}, ${a}), rgb(${b}, ${b}, ${b}))`;

 }
 else
 {
    a--;
    b++;

    caja.style.background = `-moz-linear-gradient(bottom left, rgb(${a}, ${a}, ${a}), rgb(${b}, ${b}, ${b}))`; 
    caja.style.background = `-webkit-linear-gradient(bottom left, rgb(${a}, ${a}, ${a}), rgb(${b}, ${b}, ${b}))`;
 }


  
}