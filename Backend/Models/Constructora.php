<?php
require_once("../Config/Conectar.php");

class Constructora extends Conectar{
    public function  __construct(){
        parent::__construct();
    }

    public function Get_Constructoras(){
        try {
            $sql = "SELECT * FROM constructoras";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Get_Constructora($id){
        try {
            $sql = "SELECT * FROM constructoras WHERE id_constructora = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Post_Constructora($nombreCons,$nit,$nombreRepre,$email,$telefono){
        try {
            $sql = "INSERT INTO constructoras (nombre_constructora, nit_constructora,nombre_representante,email_contacto,telefono_contacto) VALUES (:nameC, :nit, :nameR, :eml, :tel)";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':nameC', $nombreCons);
            $stm->bindParam(':nit', $nit);
            $stm->bindParam(':nameR', $nombreRepre);
            $stm->bindParam(':eml', $email);
            $stm->bindParam(':tel', $telefono);
            $stm -> execute();
            return "Constructora Agregado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Put_Constructora($id,$nombreCons,$nit,$nombreRepre,$email,$telefono){
        try {
            $sql = "UPDATE constructoras SET nombre_constructora = :nameC , nit_constructora = :nit , nombre_representante = :nameR , email_contacto = :eml ,telefono_contacto = :tel WHERE id_categoria = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->bindParam(':nameC', $nombreCons);
            $stm->bindParam(':nit', $nit);
            $stm->bindParam(':nameR', $nombreRepre);
            $stm->bindParam(':eml', $email);
            $stm->bindParam(':tel', $telefono);
            $stm -> execute();
            return "Constructora Actualizado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete_Constructora($id){
        try {
            $sql = "DELETE FROM constructoras WHERE id_categoria = :id";
            $stm = $this->dbCnx->prepare($sql);
            $stm->bindParam('id', $id);
            $stm->execute();
            return "Constructora Eliminado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>