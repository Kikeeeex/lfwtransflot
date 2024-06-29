document.addEventListener('DOMContentLoaded', function() {
    // Manejar el envío del formulario de registro de usuario
    var registroUsuarioForm = document.getElementById('registro-usuario');
    registroUsuarioForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto
        
        // Validar los campos del formulario
        var usuario = document.getElementById('usuario').value;
        var nombres = document.getElementById('nombres').value;
        var apellidos = document.getElementById('apellidos').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm-password').value;
        
        if (usuario.trim() === '' || nombres.trim() === '' || apellidos.trim() === '' || email.trim() === '' || password.trim() === '' || confirmPassword.trim() === '') {
            alert('Por favor, completa todos los campos.');
            return;
        }

        if (password !== confirmPassword) {
            alert('Las contraseñas no coinciden.');
            return;
        }

        // Resto del código para enviar el formulario al servidor...
    });

    // Manejar el envío del formulario de registro de empresa
    var registroEmpresaForm = document.getElementById('registro-empresa-form');
    registroEmpresaForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto
        
        // Validar los campos del formulario
        var nombreEmpresa = document.getElementById('nombre-empresa').value;
        var logoEmpresa = document.getElementById('logo-empresa').value;
        
        if (nombreEmpresa.trim() === '' || logoEmpresa.trim() === '') {
            alert('Por favor, completa todos los campos.');
            return;
        }

        // Resto del código para enviar el formulario al servidor...
    });
});
