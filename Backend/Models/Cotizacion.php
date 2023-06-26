<?php
require_once("../Config/Conectar.php");

class Cotizacion extends Conectar{
    public function  __construct(){
        parent::__construct();
    }

    public function Get_Cotizaciones(){
        try {
            $sql = "SELECT * FROM cotizaciones";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Get_Cotizacion($id){
        try {
            $sql = "SELECT * FROM cotizaciones WHERE id_cotizacion = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Post_Cotizacion($empleado,$constructora,$fecha_cotizacion,$hora_cotizacion,$dia_alquiler,$duracion_alquiler){
        try {
            $sql = "INSERT INTO cotizaciones (fk_id_empleado, fk_id_constructora,fecha_cotizacion,hora_cotizacion,dia_alquiler,duracion_alquiler) VALUES (:empleado, :constructora, :fe_Co, :ho_Co, :di_Al, :du_Al)";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':empleado', $empleado);
            $stm->bindParam(':constructora', $constructora);
            $stm->bindParam(':fe_Co', $fecha_cotizacion);
            $stm->bindParam(':ho_Co', $hora_cotizacion);
            $stm->bindParam(':di_Al', $dia_alquiler);
            $stm->bindParam(':du_Al', $duracion_alquiler);
            $stm -> execute();
            return "Cotizacion Agregado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Put_Cotizacion($id,$empleado,$constructora,$fecha_cotizacion,$hora_cotizacion,$dia_alquiler,$duracion_alquiler){
        try {
            $sql = "UPDATE cotizaciones SET fk_id_empleado = :empleado , fk_id_constructora = :constructora , fecha_cotizacion = :fe_Co , hora_cotizacion = :ho_Co ,dia_alquiler = :di_Al , duracion_alquiler = :du_Al WHERE id_cotizacion = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->bindParam(':empleado', $empleado);
            $stm->bindParam(':constructora', $constructora);
            $stm->bindParam(':fe_Co', $fecha_cotizacion);
            $stm->bindParam(':ho_Co', $hora_cotizacion);
            $stm->bindParam(':di_Al', $dia_alquiler);
            $stm->bindParam(':du_Al', $duracion_alquiler);
            $stm -> execute();
            return "Cotizacion Actualizado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete_Constructora($id){
        try {
            $sql = "DELETE FROM cotizaciones WHERE id_cotizacion = :id";
            $stm = $this->dbCnx->prepare($sql);
            $stm->bindParam('id', $id);
            $stm->execute();
            return "Cotizacion Eliminado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>