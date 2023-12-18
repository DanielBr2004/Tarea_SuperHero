<?php

require 'conexion.php';


class Superheroe extends Conexion{

  private $pdo;
  public function __construct()
  {
   $this->pdo=parent::getConexion(); 
  }


  public function getresumenAlignment(){
    try{
      $consulta = $this->pdo->prepare("CALL spu_resumen_alignment()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
      die($e->getMessage());
    }
  }
}
?>