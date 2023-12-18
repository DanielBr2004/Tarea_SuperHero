<?php

require_once '../models/publisher.php';


if(isset($_GET['operacion'])){

    $publicher = new Publisher();
    if($_GET['operacion']=='listar'){
        $resultado = $publicher->getAll();
        echo json_encode($resultado);
    }
}
?>