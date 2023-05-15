$(document).ready(function () {

    $('#cambiarPswd').validate({
    
        rules: {
            oldPassword: {
                required: true,
            },
            newPassword: {
                required: true,
            },
            confirmPassword: {
                required: true,
                equalTo: '#newPassword'
            }
        },
    
    
        messages: {
            oldPassword: {
                required: "Debes rellenar este campo",
            },
            newPassword: {
                required: "Debes rellenar este campo",
            },
            confirmPassword: {
                required: "Debes rellenar este campo",
                equalTo: "Las contraseñas deben coincidir"
            }
        }
    });
    
    
    
    });