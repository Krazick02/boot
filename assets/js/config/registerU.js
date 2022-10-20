var form = document.getElementById('form')
var inputs = document.querySelectorAll('#form input')

const expresiones = {
    //usuario: /^[a-zA-Z0-9\_\-]{8,16}$/, // MIN 8 MAX 16 Letras, numeros, guion y guion_bajo
    texto: /^[a-zA-ZÀ-ÿ\s]{2,20}$/, // MIN 2 MAX 120 Letras y espacios, pueden llevar acentos.
    password: /^.{8,18}$/, // 8 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{10,14}$/ // 10 a 14 numeros.
}
const campos = {
    name: false,
    lastname: false,
    email: false,
    phone_number: false,
    password: false,
    photo: false
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

const validarPass = () => {
    const input1 = document.getElementById('password-input')
    const input2 = document.getElementById('password2-input')

    if (input1.value !== input2.value) {
        document.querySelector('#grupo_password2').classList.add('formulario__input-error-activo')
        campos['password'] = false
    } else {
        document.querySelector('#grupo_password2').classList.remove('formulario__input-error-activo')
        campos['password'] = true
    }
}
const validarFoto = () => {
    const input1 = document.getElementById('profile_photo_file')
    const ruta = input1.value.toLowerCase()
    
    const exts = /(.jpg|.png|.jpeg|.svg)$/i

    if (!exts.exec(ruta)) {
        document.querySelector('#grupo_photo').classList.add('formulario__input-error-activo')
        campos['photo'] = false
    } else {
        document.querySelector('#grupo_photo').classList.remove('formulario__input-error-activo')
        campos['photo'] = true
    }
}

var validarForm = (e) => {
    switch (e.target.name) {
        case "name":
            validarCampo(expresiones.texto, e.target, 'name')
            break;
        case "lastname":
            validarCampo(expresiones.texto, e.target, 'lastname')
            break;
        case "email":
            validarCampo(expresiones.correo, e.target, 'email')
            break;
        case "phone_number":
            validarCampo(expresiones.telefono, e.target, 'phone_number')
            break;
        case "password":
            validarCampo(expresiones.password, e.target, 'password')
            break;
        case "password2":
            validarPass()
            break;
        case "profile_photo_file":
            validarFoto()
            break;
    }

}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarForm)
    input.addEventListener('blur', validarForm)
})


document.addEventListener('mousemove', e => {
    if (campos.photo && campos.name && campos.email && campos.password && campos.phone_number && campos.lastname) {
        document.getElementById('send').disabled = false
    } else {
        document.getElementById('send').disabled = true
    }
})