<?php
require_once "conection.php";

class Modelo
{
    static public function obtenerEmpresas()
    {
        try {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM companies";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}