<?php
require_once('Connect.php');
class Consulta {
    public function leer() {
        $conx = new Connect();
        $connect = $conx->init();
        $query = $connect->prepare("SELECT * FROM usuario");
        $query->execute();
        while($usuario = $query->fetch(PDO::FETCH_OBJ)){
            
            echo "<tr id='tr-$usuario->ID'>";
            echo "<td id='id' style='display:none;'>" . $usuario->ID. "</td>";
            echo "<td id='tipodoc'>" . $usuario->TIPO_DOCUMENTO. "</td>";
            echo "<td id='doc'>" . $usuario->DOCUMENTO. "</td>";
            echo "<td id='nombre'>" . $usuario->NOMBRE . "</td>";
            echo "<td id='apellido'>" . $usuario->APELLIDO . "</td>";
            echo "<td id='edad'>" . $usuario->EDAD . "</td>";
            echo "<td id='tel'>" . $usuario->TELEFONO . "</td>";
            echo "<td id='cel'>" . $usuario->CELULAR . "</td>";
            echo "<td id='direccion'>" . $usuario->DIRECCION . "</td>";
            echo "<td id='correo' style='display:none;'>" . $usuario->CORREO . "</td>";
            echo "<td id='fnace'>" . $usuario->FECHA_NACIMIENTO. "</td>";
            echo "<td id='estadoc'>" . $usuario->ESTADO_CIVIL. "</td>";
            echo "<td id='rh' style='display:none;'>" . $usuario->RH. "</td>";
            echo "<td id='ciudad'>" . $usuario->CIUDAD. "</td>";
            echo "<td id='eps'>" . $usuario->EPS. "</td>";
            echo "<td id='estrato'>" . $usuario->ESTRATO. "</td>";
            echo "<td id='horario' style='display:none;'>" . $usuario->HORARIO. "</td>";
            echo "<td id='rol' style='display:none;'>" . $usuario->ROL. "</td>";
            echo "<td id='licencia' style='display:none;'>" . $usuario->LICENCIA. "</td>";
            echo "<td id=''><div class='text-center' >
                <div class='btn-group'>
                <button type='button' style='font-size: small;' id='btnEditar' class='btn btn-warning btnEditar' data-target='#modaleditar'><i class='fas fa-user-edit'></i></button>
                <button style='font-size: small; background: red' class='btn btn-danger btnBorrar' onclick='ver_id(".$usuario->ID.")'><i class='fas fa-user-minus'></i></button>
                </div>
                </div>
                </td>";
            
            echo "</tr>";
        }
    
    }
}
