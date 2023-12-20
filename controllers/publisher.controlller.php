<?php

require_once '../models/publisher.php';


if(isset($_GET['operacion'])){

    $publicher = new Publisher();
    if($_GET['operacion']=='listar'){
        $resultado = $publicher->getAll();
        echo json_encode($resultado);
    }
}

if(isset($_POST['operacion'])){

    $publisher = new Publisher();

    if($_POST['operacion'] == 'BuscarPublicher') {
        $resultado = $publisher->ObtenerHeroePuclisher(["publisher_id" => $_POST['publisher_id']]);
        echo json_encode($resultado);
    }
    if($_POST['operacion'] == 'AlinearPuclisher') {
        $resultado = $publisher->heroPublicher(["publisher_id" => $_POST['publisher_id']]);
    }
}
?>