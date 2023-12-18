<?php

  require_once '../models/resumen-aligment.php';

  if(isset($_GET['operacion'])){
    $superheroe = new Superheroe();
  
    if($_GET['operacion'] == 'getresumenAlignment'){
      echo json_encode($superheroe->getresumenAlignment());
    }
  }
