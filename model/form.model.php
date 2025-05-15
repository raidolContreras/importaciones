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

    static public function mdlFetchUsers($table) {
        $stmt = Conexion::conectar()->prepare("SELECT u.*, r.Role_Name FROM $table u LEFT JOIN roles r ON u.Role_ID = r.id_Rol");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlDeleteUser($table, $id_Users) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id_Users = :id_Users");
        $stmt->bindParam(":id_Users", $id_Users, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // $response = $pdo->lastInsertId(); // Get the last inserted ID
            $response = "ok"; // Return "ok" if the user was deleted successfully
        } else {
            $response = "error";
        }
        
        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlCreateRole($table, $data) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO $table (Role_Name) VALUES (:Role_Name)");
        $stmt->bindParam(":Role_Name", $data["Role_Name"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            // $response = $pdo->lastInsertId(); // Get the last inserted ID
            $response = "ok"; // Return "ok" if the role was created successfully
        } else {
            $response = "error";
        }
        
        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlFetchRoles($table) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlDeleteRole($table, $id_Rol) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id_Rol = :id_Rol");
        $stmt->bindParam(":id_Rol", $id_Rol, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // $response = $pdo->lastInsertId(); // Get the last inserted ID
            $response = "ok"; // Return "ok" if the role was deleted successfully
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

class LogsModel {
    static public function mdlCreateLog($table, $data) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO $table (id_usuario, id_empresa, fecha, hora, accion) VALUES (:id_usuario, :id_empresa, :fecha, :hora, :accion)");
        $stmt->bindParam(":id_usuario", $data["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":id_empresa", $data["id_empresa"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $data["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $data["hora"], PDO::PARAM_STR);
        $stmt->bindParam(":accion", $data["accion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $response = "ok";
        } else {
            $response = "error";
        }
        
        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlFetchLogs($table, $userId) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE id_usuario = :id_usuario order by log_id desc");
        $stmt->bindParam(":id_usuario", $userId, PDO::PARAM_INT);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }
}