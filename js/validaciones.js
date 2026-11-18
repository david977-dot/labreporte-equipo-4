
// VALIDACIONES DEL SISTEMA DE PRESTAMO

document.addEventListener("DOMContentLoaded", () => {

    // Validar formularios
    const formularios = document.querySelectorAll("form");

    formularios.forEach(formulario => {

        formulario.addEventListener("submit", (event) => {

            let errores = [];

            const campos = formulario.querySelectorAll(
                "input, select, textarea"
            );

            campos.forEach(campo => {

                // Campos obligatorios
                if (campo.required && campo.value.trim() === "") {
                    errores.push("Todos los campos obligatorios deben llenarse.");
                }

                // Validar correo
                if (campo.type === "email" && campo.value !== "") {
                    const correo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (!correo.test(campo.value)) {
                        errores.push("El correo electrónico no es válido.");
                    }
                }

                // Validar contraseña
                if (campo.type === "password" && campo.value !== "") {
                    if (campo.value.length < 8) {
                        errores.push("La contraseña debe tener mínimo 8 caracteres.");
                    }
                }

            });

            // Mostrar errores
            if (errores.length > 0) {
                event.preventDefault();
                alert(errores.join("\n"));
            }

        });

    });

});
