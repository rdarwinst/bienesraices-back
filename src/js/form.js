const datos = {
    nombre: '',
    email: '',
    telefono: '',
    mensaje: '',
    opciones: '',
    presupuesto: '',
    contacto: '',
    fecha: '',
    hora: '',
};

const nombre = document.querySelector('#nombre');
const email = document.querySelector('#email');
const telefono = document.querySelector('#telefono');
const mensaje = document.querySelector('#mensaje');
const opciones = document.querySelector('#opciones');
const presupuesto = document.querySelector('#presupuesto');
const fecha = document.querySelector('#fecha');
const hora = document.querySelector('#hora');
const formulario = document.querySelector('.formulario');

try {
    nombre.addEventListener('input', leerDatos);
    email.addEventListener('input', leerDatos);
    telefono.addEventListener('input', leerDatos);
    mensaje.addEventListener('input', leerDatos);
    opciones.addEventListener('input', leerDatos);
    presupuesto.addEventListener('input', leerDatos);
    fecha.addEventListener('input', leerDatos);
    hora.addEventListener('input', leerDatos);
    formulario.addEventListener('submit', validarForm);
} catch (error) {    
    console.error(error);
}

// Funciones 

function leerDatos(e) {
    datos[e.target.id] = e.target.value;
}

function validarForm(evt) {
    evt.preventDefault();
    const { nombre, email, telefono, mensaje, opciones, presupuesto, fecha, hora } = datos;

    if (nombre === '' || email === '' || telefono === '' || mensaje === '' || opciones === '' || presupuesto === '' || fecha === '' || hora === '') {
        mostrarAlerta('Debe llenar todos los campos.', true);
        return;
    }
    mostrarAlerta('Formulario enviado correctamente.');
    formulario.reset();
}

function mostrarAlerta(msj, error = null) {
    const alerta = document.createElement('P');
    alerta.textContent = msj;
    if (error) {
        alerta.classList.add('error');
    } else {
        alerta.classList.add('correcto');
    }

    formulario.appendChild(alerta);

    setTimeout(() => {
        alerta.remove();
    }, 3000);
}