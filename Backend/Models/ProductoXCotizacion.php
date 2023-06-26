<?php
require_once("../Config/Conectar.php");

class ProductoXCotizacion extends Conectar{
    public function  __construct(){
        parent::__construct();
    }

    public function Get_ProductosXCotizaciones(){
        try {
            $sql = "SELECT * FROM productos_x_cotizaciones";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Get_ProductoXCotizacion($id){
        try {
            $sql = "SELECT * FROM productos_x_cotizaciones WHERE id_registro = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Post_ProductoXCotizacion($id_producto,$id_detalle){
        try {
            $sql = "INSERT INTO productos_x_cotizaciones (fk_id_producto, fk_id_detalle) VALUES (:id_pro, :id_det)";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id_pro', $id_producto);
            $stm->bindParam(':id_det', $id_detalle);
            $stm -> execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Put_ProductoXCotizacion($id,$id_producto,$id_detalle){
        try {
            $sql = "UPDATE productos_x_cotizaciones SET fk_id_producto = :id_pro , fk_id_detalle = :id_det WHERE id_registro = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->bindParam(':id_pro', $id_producto);
            $stm->bindParam(':id_det', $id_detalle);
            $stm -> execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete_ProductoXCotizacion($id){
        try {
            $sql = "DELETE FROM productos_x_cotizaciones WHERE id_registro = :id";
            $stm = $this->dbCnx->prepare($sql);
            $stm->bindParam('id', $id);
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>