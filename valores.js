var tipodoc;
var doc;
var nombre;
var apellidos;
var edad;
var tel;
var cel;
var correo;
var direccion;
var rh;
var estadoc;
var fecha;
var estrato;
var eps;
var ciudad;
var licencia;
var rol;
var horario;

function tipoDoc(valor) {
    tipodoc = valor;
    alert(tipodoc);
}
function Doc(valor) {
    doc = valor;
}
function Nombre(valor) {
    nombre = valor;
}
function Apellido(valor) {
    apellidos = valor;
}
function Edad(valor) {
    edad = valor;
}
function Tel(valor) {
    tel = valor;
}
function Cel(valor) {
    cel = valor;
}
function Correo(valor){
    correo = valor;
}
function Direccion(valor){
    direccion = valor;
}
function Rh(valor){
    rh = valor;
}
function estadoC(valor) {
    estadoc = valor;
}
function fNace(valor){
    fecha = valor;
}
function Estrato(valor){
    estrato = valor;
}
function Eps(valor) {
    eps = valor;
}
function Ciudad(valor) {
    ciudad = valor;
}
function Licencia(valor) {
    licencia = valor;
}
function Rol(valor) {
    rol = valor;
}
function Horario(valor) {
    horario = valor;
}
const btnguardar = document.getElementById('btnGuardar') ;
btnguardar.addEventListener('click', function (e)  {

    const url = 'http://localhost/clases_PHP/CRUD/Insert.php';

    var data = {
        tipodoc,
        doc,
        nombre,
        apellidos,
        edad,
        tel,
        cel,
        correo,
        direccion,
        rh,
        estadoc,
        fecha,
        estrato,
        eps,
        ciudad,
        licencia,
        rol,
        horario,
    }

    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => console.log(res.json().then(response => {
        const msg = response.msg;
        //document.getElementById('message').innerHTML = msg;
        alert(msg);
        location.reload();

    })))
        .catch(error => console.log('Error ->'));

})
