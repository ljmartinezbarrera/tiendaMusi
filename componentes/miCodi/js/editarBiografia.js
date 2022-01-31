
var url_base = "http://localhost/tienda-musi/";










$.ajax({
    type: "post",
    url: url_base+"EditarBiografia_controller/mostrarText",
    // data: "data",
    // dataType: "dataType",
    success: function (response) {
        
    //* Rich Text *********************
    $("#editorR").html(response);
    $("#editorR").richText({
     imageUpload:false,
     fileUpload:false,
      });


    //* quitar el margin-top ******** 
    // let richText = document.querySelector(".richText");
    // richText.style.marginTop = "0px";

    //*eliminar video manualmente*****
    let toolbarUl = document.querySelector(".richText-toolbar ul");
    
    toolbarUl.childNodes.forEach(li => {
        if(li.firstChild.title == "Add video")
        {
          li.innerHTML = "";
        }
    });



    //* guardar biografiá *********************** 
    let editor = document.querySelector(".richText-editor");

    let guarBiogra = document.getElementById("guarBiogra");

    guarBiogra.addEventListener("click", function (e) { 

          $.ajax({
            type: "post",
            url: url_base+"EditarBiografia_controller/guardarBiografia",
            data: {"biografia": editor.innerHTML},
            // dataType: "dataType",
            success: function (response) {
              
              guarBiogra.style.color = "rgba(0, 0, 0, 0.274)";

            }
          });

     });

    
    //* colorear disk con do hay algún cambio *************************
    
    let editorR = document.getElementById("editorR");

    editorR,addEventListener("input", function () { 
      
       
      guarBiogra.style.color = "rgb(0, 0, 0)";


     });



    }
});  


