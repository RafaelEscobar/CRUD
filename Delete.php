<?php
require_once('Connect.php');
class Delete {
    function delete($id){
        $conx = new Connect();
        $connect = $conx->init();
        $query = $connect->prepare("DELETE FROM usuario WHERE ID=:id");
        $query->bindParam(":id",$id);
        $query->execute();
    }
}