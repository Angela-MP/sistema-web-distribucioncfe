$(document).ready(function(){
    
    tablaObras = $("#tablaObras").DataTable({
        "columnDef":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],

        //traduccion del plugin a español
        "language":{
            "lengthMenu":"Mostrar _MENU_ registros.",
            "zeroRecords":"Sin resultados.",
            "info":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros.",
            "infoEmpty":"Mostrando registros del 0 al 0 de un total de 0 registros.",
            "infoFiltered":"(Filtrado de un total de _MAX_ de registros.",
            "sSearch":"Buscar",
            "oPaginate":{
                "sFirst":"Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious":"Anterior"
            },
            "sProcessing":"Procesando...",
        }
    });

    $("#btnNuevo").click(function(){
        //$("#formObras").trigger("reset");
        $(".modal-header").css("background-color","#00724E");
        $(".modal-header").css("color","#fff");//encabezado
        $(".modal-title").text("Alta de obra"); //titulo de la ventana
        $("#ObrasModalCRUD").modal("show"); 
        id=null; //es autoincremental
    });

    $("#btnCerrar").click(function(){
        $("#ObrasModalCRUD").modal("hide")
        $("#formObras").trigger("reset");

    });

    $("#btnCancelar").click(function(){
        $("#ObrasModalCRUD").modal("hide")
        $("#formObras").trigger("reset");
      });

    $("#formObras").submit(function(e){
        e.preventDefault();
        id = $.trim($("#id").val());
        nombre = $.trim($("#nombre").val());
        solicitante = $.trim($("#solicitante").val());
        fecha_inicio = $.trim($("#fecha_inicio").val());
        fecha_final = $.trim($("#fecha_final").val());
        observacion = $.trim($("#observacion").val());
        $.ajax({
            url:"bd/crud.php",
            type:"POST",
            dataType:"json",
            data: {nombre:nombre, solicitante:solicitante, fecha_inicio:fecha_inicio, fecha_final:fecha_final, observacion:observacion},
            success: function(data){
                var datos = JSON.parse(data);
                //console.log(data);
                id = datos[0].id;
                nombre = datos[0].nombre;
                solicitante = datos[0].solicitante;
                fecha_inicio = datos[0].fecha_inicio;
                fecha_final = datos[0].fecha_final;
                observacion = datos[0].observacion; 
                tablaObras.row.add([id,nombre,solicitante,fecha_inicio,fecha_final,observacion]).draw();
            }
        });    
        $("#ObrasModalCRUD").modal("hide");
    });
});
