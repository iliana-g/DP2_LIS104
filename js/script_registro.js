document.getElementById("form-registro").addEventListener("submit", function(event){
    if(!agregarform()){
        event.preventDefault();
    }
});

function agregarform(){
    //Guardando valores
    const nombre = document.getElementById("nombre").value.trim();
    const fechaNacimiento = document.getElementById("fechanacimiento").value;
    const contrasena = document.getElementById("contrasena").value;
    validarEmail(); //Para validar el email

      // Validaciones
    if (nombre === "") {
        alert("Debes ingresar tu nombre completo para registrarte");
        return false;
    }

    if (!fechaNacimiento) {
        alert("Debes ingresar tu fecha de nacimiento para registrarte");
        return false;
    }

    
    if (contrasena.length < 8) {
        alert("La contraseña debe tener como mínimo 8 caracteres para ser válida.");
        return false;
    }
    return true; //Se ejecuta si se ha hecho con
}

function validarEmail()
{
    const correo = document.getElementById("correo").value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(correo)) {
        alert("El correo debe seguir el formato email@dominio.com");
        return false;
    }
}

function validarFecha(){
    const fechaNacimiento = document.getElementById("fechanacimiento").value.trim();
    const fechaRegex = /^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/;

    if (!fechaRegex.test(fechaNacimiento)) {
        alert("Error en la fecha. Debes seguir el formato dd-mm-aaaa");
        return false;
}
}

//PARA HACER AJAX
$(document).ready(function () {
    $('#form-registro').on('submit', function (e) {
        e.preventDefault();

        const datos = {
            nombre: $('#nombre').val(),
            correo: $('#correo').val(),
            fechanacimiento: $('#fechanacimiento').val(),
            contrasena: $('#contrasena').val()
        };

        $.ajax({
            url: '../form.php',  // o solo 'registro.php' si está en la misma carpeta
            type: 'POST',
            data: JSON.stringify(datos),
            contentType: 'application/json',
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.exito) {
                    alert('Registro exitoso');
                    $('#form-registro')[0].reset();
                } else {
                    alert('Error: ' + respuesta.mensaje);
                }
            },
            error: function (xhr, status, error) {
                alert('Error en el servidor: ' + error);
            }
        });
    });
});