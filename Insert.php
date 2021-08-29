<?php

class Insert {
    function insert(){
    $conx = new Connect();
    $connect = $conx->init();
    $stmt = $connect->prepare("INSERT INTO usuario(TIPO_DOCUMENTO, DOCUMENTO, NOMBRE, APELLIDO, EDAD, TELEFONO, CELULAR, CORREO, DIRECCION, FECHA_NACIMIENTO, RH, ESTADO_CIVIL, EPS, ESTRATO, CIUDAD, HORARIO, ROL, LICENCIA) VALUES(:tipodoc, :doc, :nombre, :apellidos, :edad, :tel, :cel, :correo, :direccion, :fecha, :rh, :escivil, :eps, :estrato, :ciudad, :hora, :rol, :licencia)");
    //$stmt->bindparam(":id", $id, PDO::PARAM_STR);
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt->bindparam(":tipodoc", $data["tipodoc"]); 
    $stmt->bindparam(":doc", $data["doc"]);
    $stmt->bindparam(":nombre", $data["nombre"]);
    $stmt->bindparam(":apellidos", $data["apellidos"]);
    $stmt->bindparam(":edad", $data["edad"]);
    $stmt->bindparam(":tel", $data["tel"]);
    $stmt->bindparam(":cel", $data["cel"]);
    $stmt->bindparam(":correo", $data["correo"]);
    $stmt->bindparam(":direccion", $data["direccion"]);
    $stmt->bindparam(":fecha", $data["fecha"]);
    $stmt->bindparam(":rh", $data["rh"]);
    $stmt->bindparam(":escivil", $data["estadoc"]);
    $stmt->bindparam(":eps", $data["eps"]);
    $stmt->bindparam(":estrato", $data["estrato"]);
    $stmt->bindparam(":ciudad", $data["ciudad"]);
    $stmt->bindparam(":hora", $data["horario"]);
    $stmt->bindparam(":rol", $data["rol"]);
    $stmt->bindparam(":licencia", $data["licencia"]);
    if ($stmt->execute()) {
        echo json_encode(['msg' => "Usuario ingresado correctamente"]); 
    } else {
        echo json_encode(['msg' => "Usuario no pudo ser ingresado"]);
        var_dump($connect->init()->errorInfo());
    }
    }
    
}
require_once('Connect.php');
$insert = new Insert();
$insert->insert();
