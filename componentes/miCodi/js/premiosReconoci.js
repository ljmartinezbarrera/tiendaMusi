$(document).ready(function () {
    
var url_base = "http://localhost/tienda-musi/";





//* desocultar vista de administrador si esta autenticado ******************************

function ocultVistaAdmin()
{
    fetch(url_base+"Autenticacion_controller/esAdmin")
    .then(res => res.json()) //text()
    .catch(error => console.error('Error:', error))
    .then(function(response)
    {
        // console.log(response.esAdmin);
        if(response.esAdmin == "si")
        {
            let vistaAdmin = document.querySelectorAll(".vistaAdmin");
            vistaAdmin.forEach(va => va.removeAttribute("hidden"));
            // vistaAdmin.forEach(va => va.style.display = "none");
        }     
    });
}





 


function mostrarPremiosReconoci() 
{
    $("#contePremioRecono").load(" #contePremioRecono", function (e) { 

// texta.value.replace(/\r?\n/g,'<br>');
$.ajax({
    type: "post",
    url: url_base+"Premios_reconoci_controller/mostrarPremiosReconoci",
    //data: "data",
   // dataType: "dataType",
    success: function (response) {
        $.each(JSON.parse(response), function (indexInArray, value) { 
             $("#contePremioRecono").html(
                 $("#contePremioRecono").html()+
                 `<button class="btn btn-outline-danger btn-sm float-right ml-2 mr-3 vistaAdmin" hidden id="botonAbreModalBorrar" data-toggle="modal" data-target="#elimiModalPremioReco"><span class="icon-bin"></span></button>
                 <button class="btn btn-outline-warning btn-sm float-right vistaAdmin" hidden id="editPremioRecono" data-toggle="modal" data-target="#modalEditarPremiosReco">
                 <span class="icon-pencil"></span>
                 </button><br>
                 <input type="hidden" value="${value.fecha}">
                 <input type="hidden" value="${value.contenido}">                
                 <input type="hidden" value="${value.id}">
                 <p style="border-left: solid 2px rgba(82, 38, 38, 0.664);
                            padding-left: 20px;
                            padding-right: 20px;
                            text-align: justify;    
                            position: relative;
                            margin-bottom: -10px;
                            padding-bottom: 20px;
                            padding-top: 10px;">
                  <span style="position: absolute;
                                width: 40px;
                                height: 40px;
                                background-color: #ffffff;
                                border-radius: 20px;
                                border: solid 2px rgb(82, 38, 38);
                                margin-left: -40px;
                                text-align: center;
                                padding-top: 7px;
                                font-size: 14px;
                                margin-top: -30px">
                 ${value.fecha}</span>          
                 ${value.contenido.replace(/\r?\n/g,'<br>')}</p>`
             );
        });


        ocultVistaAdmin();



    }
});

     });
 }


 mostrarPremiosReconoci();


//document.getElementById().innerHTML

$('#contePremioRecono').on('click','#editPremioRecono',function (e) { 
    e.preventDefault();

let fecha = this.nextSibling.nextSibling.nextElementSibling.value; 
    
let contenido = this.nextSibling.nextSibling.nextSibling.nextElementSibling.value; 

let id = this.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextElementSibling.value;

//let contenido = this.nextSibling.nextElementSibling.innerText;

$("#fechaModalEditar").val(fecha);
$("#conteniModalEditar").val(contenido);
$("#idOculEdiPremiReco").val(id);


});


$('#contePremioRecono').on('click','#botonAbreModalBorrar',function (e) { 
    e.preventDefault();

let id = this.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextElementSibling.value;

$("#idTextOculBorrar").val(id);


});





//insertar ******************************************************************************

var botonGuardarInser = document.getElementById("botonGuardarInser");

botonGuardarInser.addEventListener("click", function (e) { 

$.ajax({
    type: "post",
    url: url_base+"Premios_reconoci_controller/insertarPremiosRecono",
    data: {"fechaInsertada":$("#fechaModalInsertar").val(),
           "contenidoInsertado":$("#conteniModalInser").val()},
    //dataType: "dataType",
    success: function (response) {
        mostrarPremiosReconoci();
    }
});

 });




//editar ******************************************************************************

var botonGuarEdi = document.getElementById("botonGuarEdi");

botonGuarEdi.addEventListener("click", function (e) { 

$.ajax({
    type: "post",
    url: url_base+"Premios_reconoci_controller/editarPremiosRecono",
    data: {"fechaEditada":$("#fechaModalEditar").val(),
           "contenidoEditado":$("#conteniModalEditar").val(),
            "idParaEditar":$("#idOculEdiPremiReco").val()},
    // dataType: "dataType",
    success: function (response) {
        mostrarPremiosReconoci();
    }
});

});


//borrar ************************************************************************
var botonBorrarPremi = document.getElementById("botonBorrarPremi");

botonBorrarPremi.addEventListener("click", function(e){

$.ajax({
    type: "post",
    url: url_base+"Premios_reconoci_controller/borrarPremiosRecono",
    data: {"idParaBorrar":$("#idTextOculBorrar").val()},
   // dataType: "dataType",
    success: function (response) {
        mostrarPremiosReconoci();
    }
});

});



//mostrarr el resto de premis y reconosimientos *****************************************************
var mostrarTodosPremios = document.getElementById("mostrarTodosPremios");
var acortador = document.getElementById("acortador");
var row = document.getElementsByClassName("fila")[0];

mostrarTodosPremios.addEventListener("click",function () {

if (acortador.classList == "recogida extender") 
{
    acortador.classList = "recogida";
    mostrarTodosPremios.innerHTML = "Ver todos";
    row.style.marginBottom = "0px";
}
else
{
   acortador.classList = "recogida extender";
   mostrarTodosPremios.innerHTML = "Ocultar";
   row.style.marginBottom = "60px";
}

});




























});