$(document).ready(function () {

var url_base = "http://localhost/tienda-musi/";  


//* Mostrar Vista de administrador ******************************
function verVistaAdmin() 
{ 
    let vistaAdmin = document.querySelectorAll(".vistaAdmin");
   // vistaAdmin.forEach(va => va.style.display = "inline");
   vistaAdmin.forEach(va => va.removeAttribute("hidden"));
}

//* Ocultar Vista de administrador ******************************

function ocultVistaAdmin()
{
    let vistaAdmin = document.querySelectorAll(".vistaAdmin");
   // vistaAdmin.forEach(va => va.style.display = "none");
   vistaAdmin.forEach(va => va.setAttribute("hidden",true));
}


//* muestra las vista de autenticacion del cliente y el administrador ************
function vistaAutentiComun(nombre)
{
    let nombreUsuBarraNave = document.querySelector("#nombreUsuBarraNave");

   //* mostrar el nombre de usuario en la barra de navegación ************
   if (nombre.length > 8) 
   {
    $("#nombreUsuBarraNave").html(nombre[0].toUpperCase());
    
    nombreUsuBarraNave.parentNode.style.fontSize = "20px";
    nombreUsuBarraNave.parentNode.style.padding = "0px 10px";

   nombreUsuBarraNave.parentNode.style.borderRadius = "50%";

   }
   else
   {
      nombreUsuBarraNave.parentNode.removeAttribute("style");
      $("#nombreUsuBarraNave").html(nombre); 
   }

    //* cambiar el color del boton de usuario en la barra de navegación **********
    nombreUsuBarraNave.parentNode.className = "btn btn-primary"; 

    //* quitar el icono usuario en la barra de navegación *********************
    nombreUsuBarraNave.nextSibling.nextSibling.className = "";






}






// ver contraseña de inicio de sesion y registrarse    
var checkVerContarIniSeci = document.getElementById('checkVerContarIniSeci');
var contrasenaIniSeci = document.getElementById('contrasenaIniSeci');

checkVerContarIniSeci.addEventListener("click", function (e) { 

    if (contrasenaIniSeci.type == "password")
    {
        contrasenaIniSeci.type = "text";
    }
    else
    {
        contrasenaIniSeci.type = "password";
    } 

})


var checkVerContarRegi = document.getElementById('checkVerContarRegi');
var contrasenaRegi = document.getElementById('contrasenaRegi');
var repeContrasenaRegi = document.getElementById('repeContrasenaRegi');

checkVerContarRegi.addEventListener("click", function (e) { 

    if (contrasenaRegi.type == "password")
    {
        contrasenaRegi.type = "text";
        repeContrasenaRegi.type = "text";
    }
    else
    {
        contrasenaRegi.type = "password";
        repeContrasenaRegi.type = "password";
        
    } 

})




//subir datos del registro******************************************************************************
$("#formRegistar").submit(function (e) { 
    e.preventDefault();
    

$.ajax({
    type: "post",
    url: url_base+"Autenticacion_controller/guardarRegis",
    data: {"correoRegi": $("#correoRegi").val(),
           "nombreRegi": $("#nombreRegi").val(),
           "contrasenaRegi": $("#contrasenaRegi").val()},
  //  dataType: "dataType",
    success: function (response) {
    }
});


});


//abrir modal registro con retraso****************************************************************
$("#btnAbrirModRegis").click(function (e) { 
    e.preventDefault();
    setTimeout(()=>{ $('#modalRegistr').modal('show'); }, 1000);
});




//iniciar sesión*****************************************************************************

$("#subirIniSeci").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "post",
        url: url_base+"Autenticacion_controller/iniciarSesion",
        data: {"nombre": $("#nombreIniSeci").val(),
               "contrasena": $("#contrasenaIniSeci").val()},
     //   dataType: "dataType",
        success: function (response) {
          
 
           let datoUsu = JSON.parse(response);

            //   alert(response);
           if (datoUsu.existe == "false")
           {
              alert("usuario no existe");    
           }
           else if(datoUsu.rol == "Administrador")
           {
            //    alert("Es admin");
             
               verVistaAdmin();

               vistaAutentiComun(datoUsu.nombre);

                $('#modalIniSecio').modal('hide');

           }
           else
           {
            //    alert("cliente");
                      
               $("#tabCancio tr").removeAttr("style");

               ocultVistaAdmin();

               vistaAutentiComun(datoUsu.nombre);

               $('#modalIniSecio').modal('hide');

           }

        }
    });

});








fetch(url_base+"Autenticacion_controller/datosSesion")
.then(res => res.json()) //text()
.catch(error => console.error('Error:', error))
.then(function(response){
 

if (response.nombre)
{
    vistaAutentiComun(response.nombre)
}


});







});