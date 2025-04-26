<?php

require_once "conection.php";

class UserModel {
    static public function mdlShowUsers($table, $item, $value) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $stmt->bindParam(":$item", $value, PDO::PARAM_STR);
            $stmt->execute();
            $response = $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
            $stmt->execute();
            $response = $stmt->fetchAll();
        }
        // Close the connection
		$stmt->closeCursor();
        $stmt = null;
        return $response;
    }
}