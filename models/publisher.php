<?php
require 'conexion.php';

class Publisher extends Conexion{

    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo=parent::getConexion();
    }

    public function getAll()
    {
        try
        {
            $consulta=$this->pdo->prepare("CALL spu_publisher_listar()");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerHeroePuclisher($data = [])
    {
        try{
            $consulta = $this->pdo->prepare("CALL spu_supehero_Busqueda(?)");
            $consulta->execute(
                array($data['publisher_id'])
            );
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function heroPublicher($data = [])
    {
        try {
            $consulta = $this->pdo->prepare("CALL spu_buscar_Hero_publisher()");
            $consulta->execute(
                array($data['publisher_id'])
            );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}


?>