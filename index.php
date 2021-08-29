<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#">
    <title>Crud</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="bootstrap-5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/css/dataTables.bootstrap4.min.css">

</head>

<body>
    <header>

    </header>

    <br>
    
    <div style="margin: 0px; width: 100%;">
        <div style="font-size: small;">
            <div>
                <button id="btnNuevo" type="button" class="btn btn-success" align="left"><i
                        class="fas fa-user-plus"></i></button>
                <div><br>
                    <table id="Registro" name="Registro" class="table table-striped table-bordered table-condensed"
                        style="width:100%;">
                        <thead class="text-center">
                            <tr>
                                <th style='display:none;'>Id</th>
                                <th>Tipo de documento</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Edad</th>
                                <th>Teléfono</th>
                                <th>Celular</th>
                                <th>Dirección</th>
                                <th style="display:none;">Correo</th>
                                <th>F_Nacimiento</th>
                                <th>Estado civil</th>
                                <th style="display:none;">RH</th>
                                <th>Ciudad</th>
                                <th>EPS</th>
                                <th>Estrato</th>
                                <th style='display:none;'>Horario</th>
                                <th style='display:none;'>Rol</th>
                                <th style='display:none;'>licencia</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require_once('Consulta.php');  
                                $consulta = new Consulta();
                                $consulta->leer();?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!--Modal para CRUD-->
    <div data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade" id="modalCRUD" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>

                </div>
                <div class="modal-body">
                    <form id="formPersonas" method="POST">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tipodoc" class="col-form-label">Tipo de documento:</label>
                                    <select style="font-size: small;" id="tipodoc" class="form-control" onchange="tipoDoc(this.value);">
                                        <option value="0">SELECCIONE</option>
                                        <option value="CÉDULA DE CIUDADANÍA">CÉDULA DE CIUDADANÍA</option>
                                        <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                                        <option value="CÉDULA DE EXTRANJERÍA">CÉDULA DE EXTRANJERÍA</option>
                                    </select>
                                    
                                </div>
                                <div class="col-md-6">
                                    <label for="doc" class="col-form-label">Documento: </label>
                                    <input type="text" class="form-control" id="doc" onchange="Doc(this.value);" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input style="font-size: small;" type="text" class="form-control" id="nombre" onkeyup="mayus(this);" onchange="Nombre(this.value);">
                                </div>
                                <div class="col-md-6">
                                    <label for="apellido" class="col-form-label">Apellidos:</label>
                                    <input style="font-size: small;" type="text" class="form-control" id="apellido" onkeyup="mayus(this);" onchange="Apellido(this.value);">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="edad" class="col-form-label">Edad:</label>
                                    <input style="font-size: small;" type="number" class="form-control" id="edad" onchange="Edad(this.value);">
                                </div>
                                <div class="col-md-5">
                                    <label for="tel" class="col-form-label">Teléfono:</label>
                                    <input type="text" class="form-control" id="tel" onchange="Tel(this.value);">
                                </div>
                                <div class="col-md-5">
                                    <label for="cel" class="col-form-label">Celular:</label>
                                    <input type="text" class="form-control" id="cel" onchange="Cel(this.value);">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="correo" class="col-form-label">Correo:</label>
                                    <input style="font-size: small;" type="email" class="form-control" id="correo" onkeyup="mayus(this);" onchange="Correo(this.value);">
                                </div>
                                <div class="col-md-6">
                                    <label for="direccion" class="col-form-label">Dirección:</label>
                                    <input style="font-size: small;" type="text" class="form-control" id="direccion" onkeyup="mayus(this);" onchange="Direccion(this.value);">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="rh" class="col-form-label">RH:</label>
                                    <input style="font-size: small;" type="text" class="form-control" id="rh" onkeyup="mayus(this);" onchange="Rh(this.value);">
                                </div>
                                <div class="col-md-5">
                                    
                                    <label for="estadoc" class="col-form-label">Estado civil:</label>
                                    <select style="font-size: small;" name="estadoc" id="estadoc" class="form-control" onchange="estadoC(this.value);">
                                        <option value="0">SELECCIONE</option>
                                        <option value="SOLTERO">SOLTERO</option>
                                        <option value="UNIÓN LIBRE">UNIÓN LIBRE</option>
                                        <option value="CASADO">CASADO</option>
                                        <option value="DIVORCIADO">DIVORCIADO</option>
                                        <option value="VUIDO">VIUDO</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="f_nace" class="col-form-label">Fecha de nacimiento:</label>
                                    <input type="date" class="form-control" id="fnace" onchange="fNace(this.value);">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="estrato" class="col-form-label">Estrato:</label>
                                    <input type="number" class="form-control" id="estrato" onchange="Estrato(this.value);">
                                </div>
                                <div class="col-md-5">
                                    <label for="eps" class="col-form-label">EPS:</label>
                                    <select style="font-size: small;" name="eps" id="eps" class="form-control" onchange="Eps(this.value);" >
                                        <option value="0">SELECCIONE</option>
                                        <option value="MEDIMAS">MEDIMAS</option>
                                        <option value="FAMISANAR">FAMISANAR</option>
                                        <option value="NUEVA EPS">NUEVA EPS</option>
                                        <option value="SALUD TOTAL">SALUD TOTAL</option>
                                        <option value="SURA">SURA</option>
                                        <option value="ALIANSALUD">ALIANSALUD</option>
                                        <option value="SANITAS">SANITAS</option>
                                        <option value="COMPENSAR">COMPENSAR</option>
                                        <option value="COOMEVA">COOMEVA</option>
                                        <option value="SALUDVIDA">SALUDVIDA</option>
                                        <option value="CAFESALUD">CAFESALUD</option>
                                        <option value="COMFANDI">COMFANDI</option>
                                        <option value="CAPITAL SALUD">CAPITAL SALUD</option>
                                        <option value="COOSALUD">COOSALUD</option>
                                        <option value="CRUZ BLANCA">CRUZ BLANCA</option>
                                        <option value="MUTUAL SER">MUTUAL SER</option>
                                        <option value="CONFENALCO VALLE">CONFENALCO VALLE</option>
                                        <option value="SERVICIO OCCIDENTAL DE SALUD">SERVICIO OCCIDENTAL DE SALUD</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="ciudad" class="col-form-label">Ciudad:</label>
                                    <select style="font-size: small;" name="ciudad" id="ciudad" class="form-control" onchange="Ciudad(this.value);">
                                        <option value="0">SELECCIONE</option>
                                        <option value="1001">MEDELLIN</option>
                                        <option value="1002">ENVIGADO</option>
                                        <option value="1003">ITAGUI</option>
                                        <option value="1004">SABANETA</option>
                                        <option value="1005">BELLO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="licencia" class="col-form-label">Licencia:</label>
                                    <select style="font-size: small;" name="licencia" id="licencia" class="form-control" onchange="Licencia(this.value);">
                                        <option value="0">SELECCIONE</option>
                                        <option value="A2">MOTO</option>
                                        <option value="B1">CARRO</option>
                                        <option value="C1">CARRO PÚBLICO</option>
                                    </select>
                                    
                                </div>
                                <div class="col-md-4">
                                    <label for="rol" class="col-form-label">Rol:</label>
                                    <select style="font-size: small;" class="form-control" name="rol" id="rol" onchange="Rol(this.value);">
                                        <option value="0">SELECCIONE</option>
                                        <option value="1001">ADMINISTRADOR</option>
                                        <option value="1002">AUXILIAR</option>
                                        <option value="1003">INSTRUCTOR</option>
                                        <option value="1004">ALUMNO</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="horario" class="col-form-label">Horario:</label>
                                    <select style="font-size: small;" class="form-control" name="horario" id="horario" onchange="Horario(this.value);">
                                        <option value="0">SELECCIONE</option>
                                        <option value="1001">8AM a 10AM</option>
                                        <option value="1002">10AM a 12M</option>
                                        <option value="1003">2PM a 4PM</option>
                                        <option value="1004">4PM a 6PM</option>
                                        <option value="1005">6PM A 8PM</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <p id="message"></p>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" id="btnGuardar" class="btn btn-success submitBtn">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!---Modal editar--->
    <div data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade" id="modaleditar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #f8d407;">
                    <h5 style="color: white" class="modal-title" id="exampleModalLabel"><b>Modal de Editar</b></h5>

                </div>
                <div class="modal-body">
                     <!---formuario--->
                    <form id="formEdit">
                        <input type="hidden" name="id" id="update_id">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tipodoc2" class="col-form-label">Tipo de documento:</label>
                                    <select style="font-size: small;" name="tipodoc2" id="tipodocdos" class="form-control">
                                        <option value="CÉDULA DE CIUDADANÍA">CÉDULA DE CIUDADANÍA</option>
                                        <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                                        <option value="CÉDULA DE EXTRANJERÍA">CÉDULA DE EXTRANJERÍA</option>
                                    </select>
                                    
                                </div>
                                <div class="col-md-6">
                                    <label for="doc2" class="col-form-label">Documento:</label>
                                    <input type="text" class="form-control" id="docdos" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre2" class="col-form-label">Nombre:</label>
                                    <input style="font-size: small;" type="text" class="form-control" id="nombredos" onkeyup="mayus(this);" >
                                </div>
                                <div class="col-md-6">
                                    <label for="apellido2" class="col-form-label">Apellidos:</label>
                                    <input style="font-size: small;" type="text" class="form-control" id="apellidosdos" onkeyup="mayus(this);" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="edad2" class="col-form-label">Edad:</label>
                                    <input style="font-size: small;" type="number" class="form-control" id="edaddos" >
                                </div>
                                <div class="col-md-5">
                                    <label for="tel2" class="col-form-label">Teléfono:</label>
                                    <input style="font-size: small;" type="text" class="form-control" id="teldos" >
                                </div>
                                <div class="col-md-5">
                                    <label for="cel2" class="col-form-label">Celular:</label>
                                    <input style="font-size: small;" type="text" class="form-control" id="celdos" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="correo2" class="col-form-label">Correo:</label>
                                    <input style="font-size: small;" type="email" class="form-control" id="correodos" onkeyup="mayus(this);" >
                                </div>
                                <div class="col-md-6">
                                    <label for="direccion2" class="col-form-label">Dirección:</label>
                                    <input style="font-size: small;" type="text" class="form-control" id="direcciondos" onkeyup="mayus(this);" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="rh2" class="col-form-label">RH:</label>
                                    <input type="text" class="form-control" id="rhdos" onkeyup="mayus(this);" >
                                </div>
                                <div class="col-md-5">
                                    
                                    <label for="estadoc2" class="col-form-label">Estado civil:</label>
                                    <select style="font-size: small;" name="estadoc2" id="estadocdos" class="form-control" >
                                        <option value="SOLTERO">SOLTERO</option>
                                        <option value="UNIÓN LIBRE">UNIÓN LIBRE</option>
                                        <option value="CASADO">CASADO</option>
                                        <option value="DIVORCIADO">DIVORCIADO</option>
                                        <option value="VUIDO">VIUDO</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="fnacedos" class="col-form-label">Fecha de nacimiento:</label>
                                    <input style="font-size: small;" type="date" class="form-control" id="fnacedos"  >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="estrato2" class="col-form-label">Estrato:</label>
                                    <input type="number" class="form-control" id="estratodos" >
                                </div>
                                <div class="col-md-5">
                                    <label for="eps2" class="col-form-label">EPS:</label>
                                    <select style="font-size: small;" name="epsdos" id="epsdos" class="form-control" >
                                        <option value="MEDIMAS">MEDIMAS</option>
                                        <option value="FAMISANAR">FAMISANAR</option>
                                        <option value="NUEVA EPS">NUEVA EPS</option>
                                        <option value="SALUD TOTAL">SALUD TOTAL</option>
                                        <option value="SURA">SURA</option>
                                        <option value="ALIANSALUD">ALIANSALUD</option>
                                        <option value="SANITAS">SANITAS</option>
                                        <option value="COMPENSAR">COMPENSAR</option>
                                        <option value="COOMEVA">COOMEVA</option>
                                        <option value="SALUDVIDA">SALUDVIDA</option>
                                        <option value="CAFESALUD">CAFESALUD</option>
                                        <option value="COMFANDI">COMFANDI</option>
                                        <option value="CAPITAL SALUD">CAPITAL SALUD</option>
                                        <option value="COOSALUD">COOSALUD</option>
                                        <option value="CRUZ BLANCA">CRUZ BLANCA</option>
                                        <option value="MUTUAL SER">MUTUAL SER</option>
                                        <option value="CONFENALCO VALLE">CONFENALCO VALLE</option>
                                        <option value="SERVICIO OCCIDENTAL DE SALUD">SERVICIO OCCIDENTAL DE SALUD</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="ciudad2" class="col-form-label">Ciudad:</label>
                                    <select style="font-size: small;" name="ciudad2" id="ciudaddos" class="form-control" >
                                        <option value="1001">MEDELLIN</option>
                                        <option value="1002">ENVIGADO</option>
                                        <option value="1003">ITAGUI</option>
                                        <option value="1004">SABANETA</option>
                                        <option value="1005">BELLO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="licencia2" class="col-form-label">Licencia:</label>
                                    <select style="font-size: small;" name="licenciados" id="licenciados" class="form-control" >
                                        <option value="A2">MOTO</option>
                                        <option value="B1">CARRO</option>
                                        <option value="C1">CARRO PÚBLICO</option>
                                    </select>
                                    
                                </div>
                                <div class="col-md-4">
                                    <label for="rol2" class="col-form-label">Rol:</label>
                                    <select style="font-size: small;" class="form-control" name="roldosdos" id="roldos" >
                                        <option value="1001">ADMINISTRADOR</option>
                                        <option value="1002">AUXILIAR</option>
                                        <option value="1003">INSTRUCTOR</option>
                                        <option value="1004">ALUMNO</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="horario2" class="col-form-label">Horario:</label>
                                    <select style="font-size: small;" class="form-control" name="horario" id="horariodos" >
                                        <option value="1001">8AM a 10AM</option>
                                        <option value="1002">10AM a 12M</option>
                                        <option value="1003">2PM a 4PM</option>
                                        <option value="1004">4PM a 6PM</option>
                                        <option value="1005">6PM A 8PM</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <p id="message"></p> 
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button style="color: white;" type="button" id="btnEdit" class="btn btn-warning submitBtn">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    
    <!---Query, popper.js, bootstrap js--->

    <script src="jquery/jquery-3.6.0.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap-5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"
        integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!---Datatables JS--->
    <script type="text/javascript" src="./DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="valores.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript">
        const btnedit = document.getElementById('btnEdit') ;
btnedit.addEventListener('click', function ()  {
    const filados = document.getElementById("update_id").value;
    const tipodocdos = document.getElementById("tipodocdos").value;
    const docdos = document.getElementById("docdos").value;
    //alert(tipodocdos);
    const nombredos = document.getElementById("nombredos").value;
    const apellidosdos = document.getElementById("apellidosdos").value;
    const edaddos = document.getElementById("edaddos").value;
    const teldos = document.getElementById("teldos").value;
    const celdos = document.getElementById("celdos").value;
    const correodos = document.getElementById("correodos").value;
    const direcciondos = document.getElementById("direcciondos").value;
    const rhdos = document.getElementById("rhdos").value;
    const estadocdos = document.getElementById("estadocdos").value;
    const fechados = document.getElementById("fnacedos").value;
    const estratodos = document.getElementById("estratodos").value;
    const epsdos = document.getElementById("epsdos").value;
    const ciudaddos = document.getElementById("ciudaddos").value;
    const licenciados = document.getElementById("licenciados").value;
    const roldos = document.getElementById("roldos").value;
    const horariodos = document.getElementById("horariodos").value;
    //alert(filados);

    const url = 'http://localhost/clases_PHP/CRUD/Update.php';

    const datados = {
        filados,
        tipodocdos,
        docdos,
        nombredos,
        apellidosdos,
        edaddos,
        teldos,
        celdos,
        correodos,
        direcciondos,
        rhdos,
        estadocdos,
        fechados,
        estratodos,
        epsdos,
        ciudaddos,
        licenciados,
        roldos,
        horariodos,
    }

    fetch(url, {
        method: 'POST',
        body: JSON.stringify(datados),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => console.log(res.json().then(response => {
        const msgdos = response.msg;
        //document.getElementById('message').innerHTML = msg;
        alert(msgdos);
        location.reload();

    }))).catch(errordos => console.log('Error ->'));

})
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
        
                $(".btnEditar").click(function(){
                    $("#modaleditar").modal("show");
                    $fila = $(this).closest('tr');
                    var datos = $fila.children('td').map(function(){
                        return $(this).text();
                    });
                    $('#update_id').val(datos[0])
                    $('#tipodocdos').val(datos[1]);
                    $('#docdos').val(datos[2]);
                    $('#nombredos').val(datos[3]);
                    $('#apellidosdos').val(datos[4]);
                    $('#edaddos').val(datos[5]);
                    $('#teldos').val(datos[6]);
                    $('#celdos').val(datos[7]);
                    $('#direcciondos').val(datos[8]);
                    $('#correodos').val(datos[9]);
                    $('#fnacedos').val(datos[10]);
                    $('#estadocdos').val(datos[11]);
                    $('#rhdos').val(datos[12]);
                    $('#ciudaddos').val(datos[13]);
                    $('#epsdos').val(datos[14]);
                    $('#estratodos').val(datos[15]);
                    $('#horariodos').val(datos[16]);
                    $('#roldos').val(datos[17]);
                    $('#licenciados').val(datos[18]);
                    
                    
                    //$.ajax({
                        //url: 'seleccionar.php',
                        //method: 'post',
                        //data: { "id": fila },
                        //success: function (response) { console.log(response); }
                    //});
                    
            });
        
        function ver_id(ID) {
            if (confirm("¿Está seguro de que desea eliminar el registro?")) {
                $.ajax({
                    url: 'instancia.php',
                    method: 'post',
                    data: { "id": ID },
                    success: function (response) { console.log(response); }
                });
                const fila = document.querySelector("#tr-" + ID);
                fila.remove();
                alert("Usuario eliminado!");
            }
        }
    </script>
</body>
</html>