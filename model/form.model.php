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

class BrokerModel {
    static public function mdlCreateBroker($table, $data) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO $table (broker_name, broker_phone, broker_email) VALUES (:broker_name, :broker_phone, :broker_email)");
        $stmt->bindParam(":broker_name", $data["Broker_Name"], PDO::PARAM_STR);
        $stmt->bindParam(":broker_phone", $data["Broker_Phone"], PDO::PARAM_STR);
        $stmt->bindParam(":broker_email", $data["Broker_Email"], PDO::PARAM_STR);

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

    static public function mdlGetBrokers($table) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlGetBrokerById($table, $id_Broker) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE broker_id = :broker_id");
        $stmt->bindParam(":broker_id", $id_Broker, PDO::PARAM_INT);
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlEditBroker($table, $data) {
        $stmt = Conexion::conectar()->prepare("UPDATE $table SET broker_name = :broker_name, broker_phone = :broker_phone, broker_email = :broker_email WHERE broker_id = :broker_id");
        $stmt->bindParam(":broker_name", $data["Broker_Name"], PDO::PARAM_STR);
        $stmt->bindParam(":broker_phone", $data["Broker_Phone"], PDO::PARAM_STR);
        $stmt->bindParam(":broker_email", $data["Broker_Email"], PDO::PARAM_STR);
        $stmt->bindParam(":broker_id", $data["Broker_ID"], PDO::PARAM_INT);

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

    static public function mdlDisableBroker($table, $id_Broker) {
        $stmt = Conexion::conectar()->prepare("UPDATE $table SET broker_isActive = 0 WHERE broker_id = :broker_id");
        $stmt->bindParam(":broker_id", $id_Broker, PDO::PARAM_INT);

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

    static public function mdlEnableBroker($table, $id_Broker) {
        $stmt = Conexion::conectar()->prepare("UPDATE $table SET broker_isActive = 1 WHERE broker_id = :broker_id");
        $stmt->bindParam(":broker_id", $id_Broker, PDO::PARAM_INT);

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
}

class ProductOriginModel {
    static public function mdlCreateProductOrigin($table, $data) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO $table (broker_id, producto, pais_origen, nombre_comercial, nombre_cientifico, fraccion_arancelaria, requiere_inspeccion, requiere_fumigacion, unidad_inventariable, kg_por_pieza, num_producto) VALUES (:broker_id, :producto, :pais_origen, :nombre_comercial, :nombre_cientifico, :fraccion_arancelaria, :requiere_inspeccion, :requiere_fumigacion, :unidad_inventariable, :kg_por_pieza, :num_producto)");
        $stmt->bindParam(":broker_id", $data["broker_id"], PDO::PARAM_INT);
        $stmt->bindParam(":producto", $data["producto"], PDO::PARAM_STR);
        $stmt->bindParam(":pais_origen", $data["pais_origen"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_comercial", $data["nombre_comercial"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_cientifico", $data["nombre_cientifico"], PDO::PARAM_STR);
        $stmt->bindParam(":fraccion_arancelaria", $data["fraccion_arancelaria"], PDO::PARAM_STR);
        // Asumiendo que requiere_inspeccion no está en $data, puedes ponerlo en 0 o 1 según tu lógica
        $stmt->bindValue(":requiere_inspeccion", $data["requiere_inspeccion"], PDO::PARAM_INT);
        $stmt->bindParam(":requiere_fumigacion", $data["requiere_fumigacion"], PDO::PARAM_INT);
        $stmt->bindParam(":unidad_inventariable", $data["unidad_inventariable"], PDO::PARAM_STR);
        $stmt->bindParam(":kg_por_pieza", $data["kg_por_pieza"], PDO::PARAM_STR);
        $stmt->bindParam(":num_producto", $data["num_producto"], PDO::PARAM_STR);

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

    static public function mdlGetProductOrigins($table) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table LEFT JOIN brokers ON brokers.broker_id = $table.broker_id");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlGetUnits($table) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }
}

class ProviderModel {
    static public function mdlGetProviders($table) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlCreateProvider($table, $data) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO $table (provider_name, provider_phone, provider_email) VALUES (:provider_name, :provider_phone, :provider_email)");
        $stmt->bindParam(":provider_name", $data["Provider_Name"], PDO::PARAM_STR);
        $stmt->bindParam(":provider_phone", $data["Provider_Phone"], PDO::PARAM_STR);
        $stmt->bindParam(":provider_email", $data["Provider_Email"], PDO::PARAM_STR);

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
}

class OrderModel {
    static public function mdlGetNextOrderId($table) {
        $stmt = Conexion::conectar()->prepare("SELECT MAX(id) as max_id FROM $table");
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response['max_id'] + 1; // Increment the max order ID by 1 for the next order ID
    }

    static public function mdlCreateOrdenCompra($table, $data) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO $table (broker_id, proveedor_id, supervisor_id, ejecutivo_id, creado_en, actualizado_en, isActive) VALUES (:broker_id, :provider_id, :supervisor_id, :ejecutivo_id, NOW(), NOW(), 1)");

        $stmt->bindParam(":broker_id", $data["broker_id"], PDO::PARAM_INT);
        $stmt->bindParam(":provider_id", $data["provider_id"], PDO::PARAM_INT);
        $stmt->bindParam(":supervisor_id", $data["supervisor_id"], PDO::PARAM_INT);
        $stmt->bindParam(":ejecutivo_id", $data["ejecutivo_id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            $response = $pdo->lastInsertId();
        } else {
            $response = "error";
        }

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }

    static public function mdlLoadPendienting($table, $userId) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table LEFT JOIN unidad_inventariable ui ON ui.unidad_medida_id = $table.unidad_medida_id WHERE $table.isActive = 1 AND ( $table.ejecutivo_id = :user_id OR $table.supervisor_id = :user_id) ORDER BY  $table.id DESC");
        $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $stmt->closeCursor();
        $stmt = null;
        return $response;
    }
}