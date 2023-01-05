$('#form-login').submit(function(e){ /*La funcion submit envia los datos obtenidos del formulario (usuario y contraseña) para iniciar sesion*/
    e.preventDefault();/*Evita recargar la página del formulario*/
    var usuario = $.trim($('#usuario').val());
    var password = $.trim($('#password').val());

    if(usuario.length == "" || password == ""){/*validacion de los campos del formulario, que no estén vacíos*/
        Swal.fire({/*llamada al plugin SweetAlert para mostrar una ventana emergente con un mensaje*/
            icon: 'warning',/*Tipo de la ventana emergente*/
            title: '¡Campos vacíos!', /*Mensaje de la ventana emergente*/
            text: 'Ingrese sus datos para iniciar sesión.',
            confirmButtonColor: '#008e5a',
        });
        return false;
    }else{
        $.ajax({
            url: "bd/login.php",
            type: "POST",
            datatype: "json",
            data:{  
                usuario:usuario,    
                password:password
            },
            success:function(data){
                if(data == "null"){
                    Swal.fire({
                        icon: 'error',
                        title:'¡Datos incorrectos!',
                        text: 'Nombre de usuario o contraseña incorrectos.',
                        confirmButtonColor: '#008e5a',
                    });
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Inicio de sesión exitoso',
                        confirmButtonColor: '#008e5a',
                        confirmButtonText: 'Ingresar'
                    }).then((result) =>{
                        if(result.value){
                            window.location.href = "home.php";
                        }
                    }
                    )
                }
            }
        })
    }
});