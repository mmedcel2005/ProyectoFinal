$(document).ready(function () {

    $('#registroUsuario').validate({
    
        rules: {
            nombre: {
                required: true,
                pattern: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s-]{1,50}$/
            },
            email: {
                required: true,
                email: true,
                pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/
            },
            password: {
                required: true,
            },
            confirmPassword: {
                required: true,
                equalTo: '#password'
            }
        },
    
    
        messages: {
            nombre: {
                required: "Debes rellenar este campo",
                pattern: "No puedes usar caracteres especiales"
            },
            email: {
                required: "Debes rellenar este campo",
                email: "Debe cumplir el formato de email",
                pattern: "No puedes usar caracteres especiales"
            },
            password: {
                required: "Debes rellenar este campo",
            },
            confirmPassword: {
                required: "Debes rellenar este campo",
                equalTo: "Las contraseñas deben coincidir"
            }
        }
    });
    
    
    
    });