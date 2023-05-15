
        $(document).ready(function () {

$('#login').validate({

    rules: {
        email: {
            required: true,
            email: true,
            pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        },
        password: {
            required: true,
        }
    },


    messages: {
        email: {
            required: "Debes rellenar este campo",
            email: "Debe cumplir el formato de email",
            pattern: "No puedes usar caracteres especiales"
        },
        password: {
            required: "Debes rellenar este campo",
        }
    }
});



});
