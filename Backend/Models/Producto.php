<?php
require_once("../Config/Conectar.php");

class Producto extends Conectar{
    public function  __construct(){
        parent::__construct();
    }

    public function Get_Productos(){
        try {
            $sql = "SELECT * FROM productos";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Get_Producto($id){
        try {
            $sql = "SELECT * FROM productos WHERE id_producto = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Post_Producto($name,$precio,$stock,$categoria){
        try {
            $sql = "INSERT INTO productos (nombre_producto, precio_x_dia, stock_producto, categoria_producto) VALUES (:name, :precio, :stock, :categoria)";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':name', $name);
            $stm->bindParam(':precio', $precio);
            $stm->bindParam(':stock', $stock);
            $stm->bindParam(':categoria', $categoria);
            $stm -> execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Put_Producto($id,$name,$precio,$stock,$categoria){
        try {
            $sql = "UPDATE productos SET nombre_producto = :name , precio_x_dia = :precio, stock_producto = :stock categoria_producto = :categoria WHERE id_producto = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->bindParam(':name', $name);
            $stm->bindParam(':precio', $precio);
            $stm->bindParam(':stock', $stock);
            $stm->bindParam(':categoria', $categoria);
            $stm -> execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete_Producto($id){
        try {
            $sql = "DELETE FROM productos WHERE id_producto = :id";
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