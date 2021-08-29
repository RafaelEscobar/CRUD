<?php
class Update {
    function update(){
        $connect = new Connect();
        $conx = $connect->init();
        $stmt = $conx->prepare("UPDATE usuario SET TIPO_DOCUMENTO = :tipodoc, DOCUMENTO = :doc, NOMBRE = :nombre, APELLIDO=:apellidos, EDAD = :edad, TELEFONO = :tel, CELULAR = :cel, CORREO = :correo, DIRECCION = :direccion, FECHA_NACIMIENTO = :fecha, RH = :rh, ESTADO_CIVIL = :escivil, EPS = eps, ESTRATO = :estrato, CIUDAD = :ciudad, HORARIO = :hora, ROL = :rol, LICENCIA = :licencia WHERE ID=:id");
        $datados = json_decode(file_get_contents('php://input'), true);
        //var_dump($datados);
        //$edad = intval($datados["edaddos"]);
        //$fila = intval($datados["filados"]);
        //$ciudad = intval($datados["ciudaddos"]);
        //$horario = intval($datados["horariodos"]);
        //$rol = intval($datados["roldos"]);
        //$estrato = intval($datados["estratodos"]);
        //var_dump($fila);var_dump($datados["licenciados"]);var_dump($rol);var_dump($horario);var_dump($ciudad);var_dump($estrato);var_dump($datados["epsdos"]);var_dump($datados["estadocdos"]);var_dump($datados["rhdos"]);var_dump($datados["fechados"]);var_dump($datados["correodos"]);var_dump($datados["direcciondos"]);var_dump($datados["apellidosdos"]);var_dump($edad);var_dump($datados["teldos"]);var_dump($datados["celdos"]);var_dump($datados["tipodocdos"]);var_dump($datados["docdos"]);var_dump($datados["nombredos"]);
        $stmt->bindparam(":id", $datados["filados"], PDO::PARAM_INT);
        $stmt->bindparam(":tipodoc", $datados["tipodocdos"], PDO::PARAM_STR);
        $stmt->bindparam(":doc", $datados["docdos"], PDO::PARAM_STR);
        $stmt->bindparam(":nombre", $datados["nombredos"], PDO::PARAM_STR);
        $stmt->bindparam(":apellidos", $datados["apellidosdos"], PDO::PARAM_STR);
        $stmt->bindparam(":edad", $datados["edaddos"]);
        $stmt->bindparam(":tel", $datados["teldos"], PDO::PARAM_STR);
        $stmt->bindparam(":cel", $datados["celdos"], PDO::PARAM_STR);
        $stmt->bindparam(":correo", $datados["correodos"], PDO::PARAM_STR);
        $stmt->bindparam(":direccion", $datados["direcciondos"], PDO::PARAM_STR);
        $stmt->bindparam(":fecha", $datados["fechadodos"], PDO::PARAM_STR);
        $stmt->bindparam(":rh", $datados["rhdos"], PDO::PARAM_STR);
        $stmt->bindparam(":escivil", $datados["estadocdos"], PDO::PARAM_STR);
        $stmt->bindparam(":eps", $datados["epsdos"], PDO::PARAM_STR);
        $stmt->bindparam(":estrato", $datados["estratodos"] , PDO::PARAM_INT);
        $stmt->bindparam(":ciudad", $datados["ciudaddos"], PDO::PARAM_INT);
        $stmt->bindparam(":hora", $datados["horariodos"], PDO::PARAM_INT);
        $stmt->bindparam(":rol", $datados["roldos"], PDO::PARAM_INT);
        $stmt->bindparam(":licencia", $datados["licenciados"],PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo json_encode(['msg' => "Usuario actualizado correctamente"]); 
        } else {
            //var_dump($conx->init()->errorInfo());
        }
    }
    
}
require_once('Connect.php');
$update = new Update();
$update->update();
