var espanol={
    "sProcessing": "Procesando...",
    "sLengthMenu": `Mostrar _MENU_ registros 
    &nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalInserUsuario"><span class="icon-plus"></span></button>
    &nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-dark btn-sm" data-target="#modalEditarUsuario" id="botAbreModalEdi"><span class="icon-pencil"></span></button>
    &nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-dark btn-sm" data-target="#modalBorraUsuario" id="botAbreModalBorra"><span class="icon-bin"></span></button>`,
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
    



    
//? variables ***************************************************************
    
    var url_base = "http://localhost/tienda-musi/";

//* tabla ********************************************


//* modal borrar *********************************************
var nomUsuBorrar = document.getElementById("nomUsuBorrar");
var idUsuBorrar = document.getElementById("idUsuBorrar");

//* modal editar *********************************************
var editNombre = document.getElementById("editNombre");
var editCorreo = document.getElementById("editCorreo");
var editSelecRol = document.getElementById("editSelecRol");
var editContra = document.getElementById("editContra");
var editId = document.getElementById("editId");



var labelContra = document.getElementById("labelContra");

    
    


    





//? funciones ******************************************************


function cambioContar()
{
  return !(editContra.getAttribute("disabled") == "");
}


function marcarFila(filas)
{

    filas.forEach(fila => {

        if (editId.value == fila.childNodes[0].innerHTML) 
        {
            fila.style.backgroundColor = "rgb(179, 229, 245)";
            fila.style.animation = "apareceColor 1s linear";
        }
        
    });

}



















//*********************************************************************
    let tabUsuario=$('#tablaUsuario').DataTable({
    
        "autoWidth":false,
        "ajax":{
            "method": "post",
            "url": url_base+"Usuario_controller/datosUsuarios"
            //"data":{'idMiem':$('#idMiembro').val()}
        }, 
       "columns":[
           {"data":"id"},
           {"data":"nombre"},
           {"data":"correo"},
           {"data":"rol"}
    
        ],
    
        "language": espanol,
      
        ordering : false,

      
    });



 











//* Dar click en una fila *********************************************************
$("#tablaUsuario tbody").on("click","tr",function (e) { 
    // e.preventDefault();



//* colorear fila ***************
let filas = document.querySelectorAll("#tablaUsuario tbody tr"); 

  filas.forEach(x => {
      x.removeAttribute("style");
  });

  this.style.backgroundColor = "rgb(179, 229, 245)";



//* colorear botones y el data-toggle="modal" **************
let botAbreModalBorra = document.getElementById("botAbreModalBorra");
botAbreModalBorra.className = "btn btn-danger btn-sm";
botAbreModalBorra.setAttribute("data-toggle", "modal");


let botAbreModalEdi = document.getElementById("botAbreModalEdi");
botAbreModalEdi.className = "btn btn-warning btn-sm";
botAbreModalEdi.setAttribute("data-toggle", "modal");





// this.childNodes.forEach(dato => console.log(dato.innerHTML));
let datosCampo = this.childNodes; 
//* guardando en el modal de eliminar, el nombre del usuario **************
  nomUsuBorrar.innerHTML = datosCampo[1].innerHTML;
  idUsuBorrar.innerHTML = datosCampo[0].innerHTML;

//* guardando en el modal de Editar, los datos del usuario **************
editId.value = datosCampo[0].innerHTML;
editNombre.value = datosCampo[1].innerHTML;
editCorreo.value = datosCampo[2].innerHTML;
editSelecRol.value = datosCampo[3].innerHTML;




//* refrescar checkbox de contraseña **********************************
//* refresca valor de contraseña y deshabilita
labelContra.innerHTML = `Cambiar contraseña <input type="checkbox" id="checkContar" style="position: absolute; top: 8px; margin-left: 5px;">`;
editContra.value = "";
editContra.setAttribute("disabled","");

//* habilitar contraseñas para editar ******************************
var checkContar = document.getElementById("checkContar");
checkContar.addEventListener("click", function (e) { 

    if(this.checked)
    {
      editContra.removeAttribute("disabled");
    }
    else
    {
      editContra.setAttribute("disabled","");    
    }
  
  });


});














//* Borrar usuario ***********************************
var botonBorrUsu = document.getElementById("botonBorrUsu");
botonBorrUsu.addEventListener("click", function (e) { 
   
    $.ajax({
        type: "post",
        url: url_base+"Usuario_controller/eliminarUsuario",
        data: {"idUsu": idUsuBorrar.innerHTML},
        // dataType: "dataType",
        success: function (response) {
           
            tabUsuario.ajax.reload();


        }
    });


 });


















//* Insertar usuario ***************************************************
var inserCorreo = document.getElementById("inserCorreo");
var inserNombre = document.getElementById("inserNombre");
var inserContrase = document.getElementById("inserContrase");
var selecRol = document.getElementById("selecRol");


var formuInserUsuario = document.getElementById("formuInserUsuario");
formuInserUsuario.addEventListener("submit", function (e) { 
    e.preventDefault();

    $.ajax({
        type: "post",
        url: url_base+"Usuario_controller/insertarUsuario",
        data: {"inserCorreo": inserCorreo.value,
               "inserNombre": inserNombre.value,
               "inserContrase": inserContrase.value,
               "selecRol": selecRol.value},
        // dataType: "dataType",
        success: function (response) {

            inserCorreo.value = "";
            inserNombre.value = "";
            inserContrase.value = "";
            selecRol.value = "";
             
            tabUsuario.ajax.reload();


        }
    });



    
 })








 


//* Editar usuario ****************************************
var formuEditarUsuario = document.getElementById("formuEditarUsuario");
formuEditarUsuario.addEventListener("submit", function (e) { 
  e.preventDefault();

$.ajax({
    type: "post",
    url: url_base+"Usuario_controller/editarUsuario",
    data: {"editId": editId.value,
            "editNombre":editNombre.value,
            "editCorreo":editCorreo.value,
            "editContra":editContra.value,
            "editSelecRol":editSelecRol.value},
    // dataType: "dataType",
    success: function (response) {

        tabUsuario.ajax.reload();

        setTimeout(function () { 

            let filas = document.querySelectorAll("#tablaUsuario tbody tr");
            
            marcarFila(filas);

         }, 500);

    }
});


 });




































});