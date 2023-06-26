<?php
require_once("../Config/Conectar.php");

class Empleado extends Conectar{
    public function  __construct(){
        parent::__construct();
    }

    public function Get_Empleados(){
        try {
            $sql = "SELECT * FROM empleados";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Get_Empleado($id){
        try {
            $sql = "SELECT * FROM empleados WHERE id_empleado = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Post_Empleado($name,$email,$cel,$pass){
        try {
            $sql = "INSERT INTO empleados (nombre_empleado, email_empleado,celular_empleado,password_empleado) VALUES (:name, :eml, :cel, :pass)";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':name', $name);
            $stm->bindParam(':eml', $email);
            $stm->bindParam(':cel', $cel);
            $stm->bindParam(':pass', $pass);
            $stm -> execute();
            return "Empleado Agregado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Put_Empleado($id,$empleado,$constructora,$fecha_cotizacion,$hora_cotizacion,$dia_alquiler,$duracion_alquiler){
        try {
            $sql = "UPDATE empleados SET nombre_empleado = :name , email_empleado = :eml , celular_empleado = :cel , password_empleado = :pass WHERE id_empleado = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->bindParam(':name', $name);
            $stm->bindParam(':eml', $email);
            $stm->bindParam(':cel', $cel);
            $stm->bindParam(':pass', $pass);
            $stm -> execute();
            return "Empleado Actualizado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete_Empleado($id){
        try {
            $sql = "DELETE FROM empleados WHERE id_cotizacion = :id";
            $stm = $this->dbCnx->prepare($sql);
            $stm->bindParam('id', $id);
            $stm->execute();
            return "Empleado Eliminado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>