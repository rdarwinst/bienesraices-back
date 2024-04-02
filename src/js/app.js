document.addEventListener('DOMContentLoaded', function () {

    eventListeners();

    darkmode();

    validarVendedores();
});

function darkmode() {

    const preferenciaUsuario = window.matchMedia('(prefers-color-scheme: dark)');

    function establecerTema(preferencia) {
        if (preferencia === 'dark') {
            document.body.classList.add('dark-mode');
            localStorage.setItem('tema', 'dark');
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('tema', 'light');
        }
    }

    const preferencia = localStorage.getItem('tema');

    if (preferencia === null) {
        establecerTema(preferenciaUsuario.matches ? 'dark' : 'light');
    } else {
        establecerTema(preferencia);
    }

    preferenciaUsuario.addEventListener('change', function () {
        if (preferenciaUsuario.matches) {
            document.body.classList.add('dark-mode');
            localStorage.setItem('tema', 'dark');
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('tema', 'light');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');

        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('tema', 'dark');
        } else {
            localStorage.setItem('tema', 'light');
        }
    });
}

function eventListeners() {
    const menuResponsive = document.querySelector('.menu-responsive');

    menuResponsive.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

function validarVendedores() {
    const formVendedor = document.querySelector('#form-vendedor');
    const telefono = document.querySelector('#telefono');
    const email = document.querySelector('#email');
    const btnSubmit = document.querySelector('input[type="submit"]');

    let objForm = {
        telefono: '',
        email: '',
    };

    if (formVendedor) {
        telefono.addEventListener('input', leerDatos);
        email.addEventListener('input', leerDatos);

        objForm = {
            telefono: telefono.value,
            email: email.value,
        };
    }

    function leerDatos(e) {
        if (e.target.value.trim() === '') {
            mostrarAlerta(`El campo ${e.target.id} no puede estar vacio`, e.target.parentElement);
            objForm[e.target.id] = '';
            validarDatos();
            return;
        }
        if (e.target.id === 'telefono' && !validarTelefono(e.target.value)) {
            mostrarAlerta(`El telefono ${e.target.value}, no es válido.`, e.target.parentElement);
            objForm[e.target.id] = '';
            validarDatos();
            return;
        }
        if (e.target.id === 'email' && !validarEmail(e.target.value)) {
            mostrarAlerta(`El email ${e.target.value}, no es válido.`, e.target.parentElement);
            objForm[e.target.id] = '';
            validarDatos();
            return;
        }

        limpiarAlerta(e.target.parentElement);

        objForm[e.target.id] = e.target.value.trim().toLowerCase();

        validarDatos();
    }

    function mostrarAlerta(msj, ref) {
        limpiarAlerta(ref);
        const info = document.createElement('p');
        info.textContent = msj;
        info.classList.add('error');
        ref.appendChild(info);
    }

    function limpiarAlerta(ref) {
        const alerta = ref.querySelector('.error');
        if (alerta) {
            alerta.remove();
        }
    }

    function validarTelefono(telefono) {
        const regex = /^(\+57)?[2-9]{1}\d{9}$/;
        return regex.test(telefono);
    }
    function validarEmail(email) {
        const regex = /^[\p{L}\p{N}._%+-]+@[\p{L}\p{N}.-]+\.[\p{L}]{2,}$/u;
        return regex.test(email);
    }

    function validarDatos() {
        if (Object.values(objForm).includes('')) {
            btnSubmit.classList.add('opacidad-50');
            btnSubmit.disabled = true;
            return;
        }
        btnSubmit.classList.remove('opacidad-50');
        btnSubmit.disabled = false;
    }
}

