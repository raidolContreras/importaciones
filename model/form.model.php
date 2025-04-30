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

    static public function mdlCreateUser($table, $data) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO $table (Username, Password, Role_ID) VALUES (:Username, :Password, :Role_ID)");
        $stmt->bindParam(":Username", $data["Username"], PDO::PARAM_STR);
        $stmt->bindParam(":Password", $data["Password"], PDO::PARAM_STR);
        $stmt->bindParam(":Role_ID", $data["Role_ID"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            // $response = $pdo->lastInsertId(); // Get the last inserted ID
            $response = "ok"; // Return "ok" if the user was created successfully
        } else {
            $response = "error";
        }
        
        // Close the connection
		$stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlGetDataUser($id_Users, $company_id) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT *, (SELECT business_name FROM companies WHERE company_id = :company_id) AS business_name FROM user_catalog u LEFT JOIN roles r ON r.id_Rol = u.Role_ID WHERE u.id_Users = :id_Users;");
        $stmt->bindParam(":id_Users", $id_Users, PDO::PARAM_INT);
        $stmt->bindParam(":company_id", $company_id, PDO::PARAM_INT);
        $stmt->execute();
        $response = $stmt->fetch();
        
        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }
}