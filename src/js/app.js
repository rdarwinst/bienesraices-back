document.addEventListener('DOMContentLoaded', function () {

    eventListeners();

    darkmode();
});

function darkmode() {

    const preferenciaUsuario = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(preferenciaUsuario.matches);

    if (preferenciaUsuario.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    preferenciaUsuario.addEventListener('change', function () {
        if (preferenciaUsuario.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(e) {
    const menuResponsive = document.querySelector('.menu-responsive');

    menuResponsive.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}