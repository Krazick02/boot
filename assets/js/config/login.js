var form = document.getElementById('form')
var inputs = document.querySelectorAll('#form input')

const expresiones = {
    //usuario: /^[a-zA-Z0-9\_\-]{8,16}$/, // MIN 8 MAX 16 Letras, numeros, guion y guion_bajo
    texto: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // MIN 2 MAX 40 Letras y espacios, pueden llevar acentos.
    password: /^.{8,18}$/, // 8 a 18 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{10,14}$/ // 10 a 14 numeros.
}
const campos = {
    email: false,
    password: false
}

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.querySelector(`#grupo_${campo}`).classList.remove('formulario__input-error-activo')
        campos[campo] = true
    } else {
        document.querySelector(`#grupo_${campo}`).classList.add('formulario__input-error-activo')
        campos[campo] = false
    }
}

var validarForm = (e) => {

    switch (e.target.name) {
        case "email":
            validarCampo(expresiones.correo, e.target, 'email')
            break;
        case "password":
            validarCampo(expresiones.password, e.target, 'password')
            break;
    }

}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarForm)
    input.addEventListener('blur', validarForm)
})

document.addEventListener('mousemove', e => {
    if (campos.email && campos.password) {
        document.getElementById('send').disabled = false
    } else {
        document.getElementById('send').disabled = true
    }
})