<?php
require_once("../Config/Conectar.php");

class Categoria extends Conectar{
    public function  __construct(){
        parent::__construct();
    }

    public function Get_Categorias(){
        try {
            $sql = "SELECT * FROM categorias";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Get_Categoria($id){
        try {
            $sql = "SELECT * FROM categorias WHERE id_categoria = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Post_Categoria($nombre,$descripcion,$img){
        try {
            $sql = "INSERT INTO categorias (nombre_categoria, descripcion_categoria,img_categoria) VALUES (:name, :descr, :img)";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':name', $nombre);
            $stm->bindParam(':descr', $descripcion);
            $stm->bindParam(':img', $img);
            $stm -> execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Put_Categoria($id,$nombre,$descripcion,$img){
        try {
            $sql = "UPDATE categorias SET nombre_categoria = :name , descripcion_categoria = :descr , img_categoria = :img WHERE id_categoria = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->bindParam(':name', $nombre);
            $stm->bindParam(':descr', $descripcion);
            $stm->bindParam(':img', $img);
            $stm -> execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete_Categoria($id){
        try {
            $sql = "DELETE FROM categorias WHERE id_categoria = :id";
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