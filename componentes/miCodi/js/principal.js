let espanol={
  "sProcessing": "Procesando...",
  "sLengthMenu": `Mostrar _MENU_ registros 
<span class="vistaAdmin" hidden=true id="botonesAdminMusi">
  &nbsp;&nbsp;&nbsp;
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Msubi"><span class="icon-plus"></span></button>
  &nbsp;&nbsp;&nbsp;
  <button type="button" class="btn btn-dark btn-sm" data-target="#modEdiMicic" id="botAbreModalEdi"><span class="icon-pencil"></span></button>
  &nbsp;&nbsp;&nbsp;
  <button type="button" class="btn btn-dark btn-sm" data-target="#modBorraMucic" id="botAbreModalBorra"><span class="icon-bin"></span></button>
</span>
  `,
  "sZeroRecords": "No se encontraron resultados",
  "sEmptyTable": "Ningún dato disponible en esta tabla",
  "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
  "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
  "sSearch": "<span class='icon-search'></span>",
  "sInfoThousands": ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
      "sFirst": "Primero",
      "sLast": "Último",
      "sNext": "<span class='icon-arrow-right'></span>",
      "sPrevious": "<span class='icon-arrow-left'></span>"
  },
  "oAria": {
      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  },
  "buttons": {
      "copy": "Copiar",
      "colvis": "Visibilidad",
  }

 };









 let espanolCarr={
  "sProcessing": "Procesando...",
  "sLengthMenu": "Mostrar _MENU_ registros",
  "sZeroRecords": "No se encontraron resultados",
  "sEmptyTable": "Ningún dato disponible en esta tabla",
  "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
  "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
  "sSearch": "<span class='icon-search'></span>",
  "sInfoThousands": ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
      "sFirst": "Primero",
      "sLast": "Último",
      "sNext": "<span class='icon-arrow-right'></span>",
      "sPrevious": "<span class='icon-arrow-left'></span>"
  },
  "oAria": {
      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  },
  "buttons": {
      "copy": "Copiar",
      "colvis": "Visibilidad",
  }

 };








$(document).ready(function () {
    



var url_base = "http://localhost/tienda-musi/";




//Tabla de canciones Principal*********************************************************************
let tabMusi=$('#tabCancio').DataTable({

    "autoWidth":false,
    "ajax":{
        "method": "post",
        "url": url_base+"Principal_controller/mostrarCancion"

    }, 
   "columns":[

       {"data":"nombre"},
       {"data":"precio"},
       {"data":"nom_encriptado"}


    ],


     "columnDefs":[
       {
        "targets":[0],
        "data":"nombre",
        render:function(data,type,row){
         return `
         <div class="form-row">

          <div class="col">
          <center>
            ${data}
          </center>  
          </div>

          <div class="col reproductor">
           <!-- <audio src="${row.nom_encriptado}" controls></audio> -->

            <span class="reproducAudio-musica" direcc="${row.nom_encriptado}"></span>
           
          </div>

         </div>`
           
         ;
        }
      },
      {
        "targets":[1],
        "data":"precio",
        render:function(data,type,row){
         return `${data} $`;
        }
      },
      {
        "targets":[2],
        "data":"nom_encriptado",
        render:function(data,type,row){

         return '<input type="checkbox" class="perro" name="" id="'+row.id+'" style="width: 20px; height: 20px;">';
        }
      }
     ],

    "language": espanol,
  

    ordering : false,
    info : false,

  
});




//subir las canciones***************************************************************************

$('#formuSubi').submit(function (e) { 
    e.preventDefault();
    
    var datosFormu = new FormData($("#formuSubi")[0]);  

  $.ajax({
      type: "post",
      url: url_base+"Principal_controller/subirMusica",
      data: datosFormu,
      contentType: false,
      processData: false,
      beforesend: function (){ 

       },
      success: function (response) {
      //    alert(response);
      tabMusi.ajax.reload();

          //* recargar reproductor ******
          fetch(url_base+"Principal_controller/mostrarCancion")
          .then(res => res.json()) //text()
          .catch(error => console.error('Error:', error))
          .then(function(response){

             reproducAudio("musica", response.data.length);

          }); 


      reproducAudio();
      $("#fileMusi").val("");
      $("#precio").val("");
      }
  });

 
  

});  


// disabled
//* habilitar y deshabilitar nombre de canción ************************
var nombreFichero = document.getElementById("nombreFichero");
var nombreCancion = document.getElementById("nombreCancion");
nombreFichero.addEventListener("change", function(){
  
  if(!!nombreCancion.getAttribute("disabled"))
  {
    nombreCancion.removeAttribute("disabled");
  }
  else
  {
    nombreCancion.setAttribute("disabled",true);
  }

});







//guarda en un arreglo los que son marcados****************************************************

function marcados(array)
{
    let resp = [];
  for (let index = 0; index < array.length; index++) 
  {
    
    if ($("#"+array[index]).is(':checked')) 
    {
      resp[resp.length] = array[index];
    }

  }
  return resp;
}





//   1- Trae los id de le tabla, los cuales son los mismos id de los checkbox
//      y se verifica con la funcion anterior ( marcados(array) ).
//   2- Muestra las canciones que fueron seleccionadas en un tabla.
function idTabaCancion() 
{ 

$.ajax({
  type: "post",
  url: url_base+"Principal_controller/idTabaCancion",

  success: function (response) {
    


  let arreM = marcados(JSON.parse(response));

  reproducAudio("carro", arreM.length);




if (arreM.length == 0) 
{
  $("#recarCarrito").load(" #recarCarrito", function (e) {});
}
else
{

$("#recarCarrito").load(" #recarCarrito", function (e) { 

$('#tabCarritoDeComp').DataTable({

  "autoWidth":false,
  "ajax":{
      "method": "post",
      "url": url_base+"Principal_controller/DatosCarroCompras",
      "data": {"arregloMar":JSON.stringify(arreM)},
  }, 
 "columns":[
  {"data":"nombre"},
  {"data":"precio"},

  ],


   "columnDefs":[
    {
      "targets":[0],
      "data":"nombre",
      render:function(data,type,row){
       return `
       <div class="form-row">

        <div class="col">
        <center>
        ${data}
        </center>         
        </div>

        <div class="col reproductor">
         <!-- <audio src="${row.nom_encriptado}" controls></audio> -->
          <span class="reproducAudio-carro" direcc="${row.nom_encriptado}"></span>
        </div>

       </div>`
         
       ;
      }
    },
    {
      "targets":[1],
      "data":"precio",
      render:function(data,type,row){
       return `<center>${data} $</center>`;
      }
    }

   ],

  "language": espanolCarr,

  searching : false,
  ordering : false,
  info : false,
  paging :false,
  // "scrollY": "300px",
  // "scrollCollapse": true,

});

});

}





if (arreM.length == 0) 
{
  $('#notifCarriComp').hide();
}
else
{
  $('#notifCarriComp').html(arreM.length);
  $('#notifCarriComp').show();
}







$.ajax({
  type: "post",
  url: url_base+"Principal_controller/DatosCarroCompras",
  data: {"arregloMar":JSON.stringify(arreM)},

  success: function (response) {


    let arr = 0;
   let resJson = JSON.parse(response).data;


    
    for (let index = 0; index < resJson.length; index++) 
    { 
      arr += parseFloat(resJson[index].precio);    
    }

let total = arr.toFixed(2).toString();


let campoTexOculTotalPrec = document.getElementById("campoTexOculTotalPrec");
campoTexOculTotalPrec.value = total;


  }
});











  }
});




}













//colorea la fila de la tabCancio *****************************************************
function colorearFila(param) 
{ 
  $("#tabCancio tr").removeAttr("style");
  //? amarillo 230, 217, 157
  //? azul 179, 229, 245
  $(param).css({"background-color":"rgb(179, 229, 245)"});
}

// habilitar el boton de editar las canciones*********************************
function habilitarEditarYBorrar() 
{ 

$("#botAbreModalEdi").attr("class", "btn btn-warning btn-sm");
$("#botAbreModalEdi").attr("data-toggle", "modal");

$("#botAbreModalBorra").attr("class", "btn btn-danger btn-sm");
$("#botAbreModalBorra").attr("data-toggle", "modal");

}



//Boton carro de compras*****************************************************************************
$("#recarCarrito").hide();
$('#carritoCom').click(function (e) { 


let encabeCarritoTienda = document.getElementById("encabeCarritoTienda");

  if ($("#carritoCom").html() == `<span>Tienda</span>`)
  {
    $("#carritoCom").html(
    `<span class="icon-cart"></span>
    <span class="badge badge-primary badge-pill" id="notifCarriComp"
    style="position: absolute; right: -1px; top: -4px;"></span>`
    );

    $("#recarCarrito").hide();
    $("#divTabTienda").show();

    encabeCarritoTienda.innerHTML = "Tienda";
  }
  else
  {

    $("#carritoCom").html(
    `<span>Tienda</span>`
    );

    $("#recarCarrito").show();
    $("#divTabTienda").hide();

    encabeCarritoTienda.innerHTML = "Carro de compras";

    let campoTexOculTotalPrec = document.getElementById("campoTexOculTotalPrec");
    let preciTotal = document.getElementById("preciTotal");

    preciTotal.innerHTML = campoTexOculTotalPrec.value;

  }


});


//click en el chebox de la tabCancio *****************************************
$("#tabCancio tbody").on("click", "input", function (e) {

idTabaCancion();



});


//click en fila de tabla tabCancio*************************************************
$("#tabCancio tbody").on("click", "tr", function (e) {

let botonesAdminMusi = document.getElementById("botonesAdminMusi");
  if (!botonesAdminMusi.getAttribute("hidden"))
  {
      colorearFila(this);
  }








  habilitarEditarYBorrar();
  
let datos = tabMusi.row(this).data();
$("#recarForm").load(" #recarForm", function () { 

  
  $("#ediPrecio").val(datos.precio);
  $("#EdiNombCancion").val(datos.nombre);
  $("#idOculEdi").val(datos.id);

  $("#oculIdBorrar").val(datos.id);
  $("#mostrarCanciEnParrafoBorrar").html(datos.nombre);

  
 eventosModalEditar();
  
});





});




function reiniciarModalEdi(nomFiche) 
{ 
let ediFileMusi = document.getElementById("ediFileMusi"); 
let chekPermCambiCancion = document.getElementById("chekPermCambiCancion"); 
let EdiNombreFichero = document.getElementById("EdiNombreFichero"); 

ediFileMusi.value = "";

chekPermCambiCancion.checked = false;



$("#ediFileMusi").attr("disabled", true);
$("#EdiNombreFichero").attr("disabled",true);
$("#spanNomNomFich").css({"color":"rgba(0, 0, 0, 0.6)"});

let EdiNombCancion = document.getElementById("EdiNombCancion");
EdiNombCancion.removeAttribute("disabled");


//console.log(nomFiche);

if (nomFiche && EdiNombreFichero.checked)
{
  EdiNombCancion.value = nomFiche;
  EdiNombreFichero.checked = false;
}
else
{
  EdiNombreFichero.checked = false;
}



}





function eventosModalEditar() { 

//click en boton editar en modal ***********************************************
let guardarCancEdi = document.getElementById("guardarCancEdi"); 
guardarCancEdi.addEventListener("click", function (e) {  

let formularioEditar = document.getElementById("formEdiMuci"); 
let datoFormEdi = new FormData(formularioEditar);

if ($("#ediFileMusi").attr("disabled") == "disabled") 
{

  $.ajax({
    type: "post",
    url: url_base+"Principal_controller/editarTodoMenosCancion",
    data: datoFormEdi,
    contentType: false,
    processData: false,
    beforesend: function (){ 
  
     },
    //dataType: "dataType",
    success: function (response) {
      // alert(response);

     tabMusi.ajax.reload();
          //* recargar reproductor ******
              fetch(url_base+"Principal_controller/mostrarCancion")
              .then(res => res.json()) //text()
              .catch(error => console.error('Error:', error))
              .then(function(response){


             reproducAudio("musica", response.data.length);


              }); 

      //* Reiniciar algunor valores de modal editar 
      reiniciarModalEdi(false);

    }
  });

}
else
{

$.ajax({
  type: "post",
  url: url_base+"Principal_controller/editarCancion",
  data: datoFormEdi,
  contentType: false,
  processData: false,
  beforesend: function (){ 

   },
  //dataType: "dataType",
  success: function (response) {
    // alert(response);
    tabMusi.ajax.reload();
          //* recargar reproductor ******
          fetch(url_base+"Principal_controller/mostrarCancion")
          .then(res => res.json()) //text()
          .catch(error => console.error('Error:', error))
          .then(function(response){


         reproducAudio("musica", response.data.length);


          }); 

    //* Reiniciar algunor valores de modal editar 
    reiniciarModalEdi(datoFormEdi.get("ediFileMusi").name); 

  }
});

}






});






//habilitar el cambio de canciones en editar************************************************
$("#chekPermCambiCancion").click(function (e) { 
   
  if ($("#ediFileMusi").attr("disabled") == "disabled") 
  {
    $("#ediFileMusi").removeAttr("disabled");
    $("#EdiNombreFichero").removeAttr("disabled");
    $("#spanNomNomFich").removeAttr("style");
  }
  else
  {
    $("#ediFileMusi").attr("disabled",true);
    $("#EdiNombreFichero").attr("disabled",true);
    $("#spanNomNomFich").css({"color":"rgba(0, 0, 0, 0.6)"})
  }
  
});





//* habilitar y deshabilitar campode texto de cancion *********************************

let EdiNombreFichero = document.getElementById("EdiNombreFichero");
EdiNombreFichero.addEventListener("change", (e) => {
  
 let EdiNombCancion = document.getElementById("EdiNombCancion");

  if (!!EdiNombCancion.getAttribute("disabled")) 
  {
      EdiNombCancion.removeAttribute("disabled");  
  }
  else
  {
      EdiNombCancion.setAttribute("disabled",true);
  }
  
});

 }











//click en boton borrar del modal "borrar cancion"*************************************************

$("#botonBorrarCancion").click(function (e) { 
  e.preventDefault();
  
$.ajax({
  type: "post",
  url: url_base+"Principal_controller/borrarCancion",
  data: {"idBorrar":$("#oculIdBorrar").val()},
  success: function (response) {

    $("#botAbreModalEdi").attr("class", "btn btn-dark btn-sm");
    $("#botAbreModalEdi").removeAttr("data-toggle");

    $("#botAbreModalBorra").attr("class", "btn btn-dark btn-sm");
    $("#botAbreModalBorra").removeAttr("data-toggle");
    tabMusi.ajax.reload();
              //* recargar reproductor ******
              fetch(url_base+"Principal_controller/mostrarCancion")
              .then(res => res.json()) //text()
              .catch(error => console.error('Error:', error))
              .then(function(response){


             reproducAudio("musica", response.data.length);


              }); 
  }
});




});






















var contenedor = document.getElementsByClassName("container");
var anchoConte = contenedor[0].clientWidth;

function truncate(texto) 
{ 
    if(anchoConte > 540 && texto.length > 1900)
    {
        return texto.substring(0,1900)+" ...";
    }
    else if(anchoConte <= 540 && texto.length >= 654)
    {
        return texto.substring(0,654)+" ...";
    }
    else
    {
        return texto;
    }   
 }





//* mostrar la biografiá en principal ******************************************

fetch(url_base+"EditarBiografia_controller/mostrarText")
.then(res => res.text())
.catch(error => console.error('Error:', error))
.then(function(response){
    
let textBiobra = document.getElementById("textBiobra");
textBiobra.innerHTML = truncate(response);


 


let mostraBiogra = document.getElementById("mostraBiogra");
let ocultarBiogra = document.getElementById("oculBiogra");

$("#oculBiogra").hide();

mostraBiogra.addEventListener("click", function (e) 
{ 
   textBiobra.innerHTML = response;

   $("#mostraBiogra").hide();
   $("#oculBiogra").show();
});

ocultarBiogra.addEventListener("click", function () { 

  textBiobra.innerHTML = truncate(response);

  $("#oculBiogra").hide();
  $("#mostraBiogra").show();
})





});















var ediPrecio = document.getElementById("ediPrecio");

ediPrecio.addEventListener("click", function () { 
  let file = document.getElementById("ediFileMusi");
     console.log(file.value);

 });







});