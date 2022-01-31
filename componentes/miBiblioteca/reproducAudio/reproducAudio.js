function reproducAudio(key, canti)
{ 




//console.log("len",response.data.length);



var recargar = setInterval(function(){

let reproducAudio = document.querySelectorAll(".reproducAudio-"+key);
//console.log(reproducAudio.length);

if (reproducAudio.length == canti) 
{
    

for (let i = 0; i < reproducAudio.length; i++) 
    {
        
    let dir = reproducAudio[i].getAttribute("direcc");
     // console.log(dir);
    reproducAudio[i].innerHTML = `
    <div class="conteReprod-${key} conteReprod" hidden> 

    <div class="reprod-${key} reprod">
        <audio class="audio-${key} audio" src="${dir}"></audio>
        
        <span id="icono-${key}" class="icon-play3 icono"></span>
   
        <span class="tiempo-${key} tiempo">
            <span class="concurrido-${key} concurrido">00:00</span>
            /
            <span class="duracion-${key} duracion">00:00</span>
        </span>
        
    </div>

    <div class="conteRange-${key} conteRange">
        <input type="range" class="barTiemp-${key} barTiemp" min="0" value="0">
        <span class="barraTranscur-${key} barraTranscur"></span>
        <span class="barraSombra-${key} barraSombra"></span>
    </div>

</div>
<div class="cargando-${key}">
<div class="conteLoadeMusi">

    <span id="iconCargaMusi" class="icon-spinner2"></span>
        
    <span id="iconMusi" class="icon-music"></span>

</div>
</div>`;
        




let conteReprod = document.querySelectorAll(".conteReprod-"+key)[i];
let cargando = document.querySelectorAll(".cargando-"+key)[i];
let reprod = document.querySelectorAll(".reprod-"+key)[i];
let audio = document.querySelectorAll(".audio-"+key)[i];
let ico = document.querySelectorAll("#icono-"+key)[i];
let concurrido = document.querySelectorAll(".concurrido-"+key)[i];
let duracion = document.querySelectorAll(".duracion-"+key)[i];
let barTiemp = document.querySelectorAll(".barTiemp-"+key)[i];
let barraTranscur = document.querySelectorAll(".barraTranscur-"+key)[i];


// console.log(audio);
//* alternar pause play con el evento click ********************
let con = 0;
reprod.addEventListener("click", function () { 

        con++;
        
        if (con%2 == 0 ) 
        {
            audio.pause();
            ico.className = "icon-play3 icono";
        }
        else
        {
            audio.play();
            ico.className = "icon-pause2 icono";
        }   


});





//* función para convertir el tiempo total de segundos a minutos y segundos
//? 260 => 4:20
function secondsToString(seconds) {
    // var hour = Math.floor(seconds / 3600);
    // hour = (hour < 10)? '0' + hour : hour;
    let minute = Math.floor((seconds / 60) % 60);
    minute = (minute < 10)? '0' + minute : minute;
    let second = seconds % 60;
    second = (second < 10)? '0' + second : second;
    //return hour + ':' + minute + ':' + second;
    return minute + ':' + second;
  }





//* acción que ocurre mientras se modifica el tiempo del audio ******************
//? o sea cuando se da play y empieza a correr el tiempo asta que de pause
audio.addEventListener("timeupdate", function () { 

    let tiempoConcurrido = parseInt(audio.currentTime);
    let tiempoTotal = parseInt(audio.duration);

//* mueve el indicador de la barra de progreso
    barTiemp.value = tiempoConcurrido;

//* muestra el tiempo transcurrido en minutos y segundos
    concurrido.innerHTML = secondsToString(tiempoConcurrido);

//* mueve la barra se bajo del indicador, según el porcentaje de tiempo
//* transcurrido
    let porciento = (tiempoConcurrido * 100) / tiempoTotal;
    barraTranscur.style.width = porciento+"%";

 });






//* inicializa la duración total **********************
let t = setInterval(colocarDuracion,50);

function colocarDuracion() 
{ 
  if (audio.duration) 
  {   
      duracion.innerHTML = secondsToString(parseInt(audio.duration));
      barTiemp.max = parseInt(audio.duration);

      conteReprod.removeAttribute("hidden")
      cargando.setAttribute("hidden",true);
      
      clearInterval(t);
  }
}





//* otorga el valor de la barra de progreso al tiempo transcurrido del audio *********************
barTiemp.addEventListener("input", function (e) { 

  audio.currentTime = this.value;

 });


}

clearInterval(recargar);

}

},50);



}


let url_base = "http://localhost/tienda-musi/";

fetch(url_base+"Principal_controller/mostrarCancion")
.then(res => res.json()) //text()
.catch(error => console.error('Error:', error))
.then(function(response){


reproducAudio("musica", response.data.length);


}); 

