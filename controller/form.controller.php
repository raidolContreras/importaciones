<?php

class UserController
{
    static public function ctrLogin()
    {
        $table = "user_catalog";
        $item = "Username";
        $value = $_POST["Username"];
        $response = UserModel::mdlShowUsers($table, $item, $value);
        //Validacion del password
        if (password_verify($_POST["Password"], $response["Password"])) {
            session_start();
            // Password is correct, proceed with login
            $_SESSION["loggedIn"] = true;
            $_SESSION["id_Users"] = $response["id_Users"];
            $_SESSION["user"] = $response["Username"];
            $_SESSION["role"] = $response["Role_ID"];
            $_SESSION['company_id'] = $_POST["company_id"];
            echo json_encode(array("status" => "success", "message" => "Login successful!"));
            // Log the login action
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Login");
        } else {
            // Password is incorrect
            echo json_encode(array("status" => "error", "message" => "Invalid username or password."));
        }
    }

    static public function ctrCreateUser()
    {
        $Role_ID = isset($_POST["role"]) ? $_POST["role"] : 1; // Default to 1 if not set
        $table = "user_catalog";
        $data = array(
            "Username" => $_POST["username"],
            "Password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
            "Role_ID" => $Role_ID
        );
        $response = UserModel::mdlCreateUser($table, $data);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "User created successfully!"));
            // Log the user creation action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "User created: " . $_POST["username"] . " with role: " . $Role_ID);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error creating user."));
        }
    }

    static public function ctrFetchUsers()
    {
        $table = "user_catalog";
        $response = UserModel::mdlFetchUsers($table);
        if ($response) {
            echo json_encode(array("status" => "success", "data" => $response));
            // Log the user fetch action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Fetched users");
        } else {
            echo json_encode(array("status" => "error", "message" => "No users found."));
        }
    }

    static public function ctrDeleteUser()
    {
        $table = "user_catalog";
        $id_Users = $_POST["id"];
        $response = UserModel::mdlDeleteUser($table, $id_Users);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "User deleted successfully!"));
            // Log the user deletion action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "User deleted: " . $id_Users);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error deleting user."));
        }
    }

    static public function ctrCreateRole()
    {
        $table = "roles";
        $data = array(
            "Role_Name" => $_POST["role_name"]
        );
        $response = UserModel::mdlCreateRole($table, $data);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "Role created successfully!"));
            // Log the role creation action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Role created: " . $_POST["role_name"]);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error creating role."));
        }
    }

    static public function ctrFetchRoles()
    {
        $table = "roles";
        $response = UserModel::mdlFetchRoles($table); // Fetch all roles
        if ($response) {
            echo json_encode(array("status" => "success", "data" => $response));
            // Log the role fetch action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Fetched roles");
        } else {
            echo json_encode(array("status" => "error", "message" => "No roles found."));
        }
    }

    static public function ctrDeleteRole()
    {
        $table = "roles";
        $id_Rol = $_POST["id"];
        $response = UserModel::mdlDeleteRole($table, $id_Rol);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "Role deleted successfully!"));
            // Log the role deletion action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Role deleted: " . $id_Rol);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error deleting role."));
        }
    }

    static public function ctrGetDataUser()
    {
        $id_Users = $_SESSION["id_Users"];
        $company_id = $_SESSION["company_id"];

        $response = UserModel::mdlGetDataUser($id_Users, $company_id);
        // Log the user data fetch action
        LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Fetched user data: " . $id_Users);
        return $response;
    }

    static public function ctrChangeCompany()
    {
        session_start();
        $company_id = $_POST["company_id"];
        $_SESSION["company_id"] = $company_id;
        echo json_encode(array("status" => "success", "message" => "Company changed successfully!"));
        // Log the company change action
        LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Company changed to: " . $company_id);
    }
}

class LogsController
{
    static public function createLog($userId, $companyId, $action)
    {
        $table = "logs";
        // Crear objeto DateTime en zona America/Mexico_City
        $tz = new DateTimeZone('America/Mexico_City');
        $now = new DateTime('now', $tz);

        $data = [
            "id_usuario" => $userId,
            "id_empresa" => $companyId,
            "fecha" => $now->format('Y-m-d'),
            "hora" => $now->format('H:i:s'),
            "accion" => $action
        ];
        $response = LogsModel::mdlCreateLog($table, $data);

        if ($response == "ok") {
            return array("status" => "success", "message" => "Log created successfully!");
        } else {
            return array("status" => "error", "message" => "Error creating log.");
        }
    }

    static public function ctrFetchLogs()
    {
        $table = "logs";
        $userId = $_POST["user_id"];
        $response = LogsModel::mdlFetchLogs($table, $userId);
        if ($response) {
            echo json_encode(array("status" => "success", "data" => $response));
        } else {
            echo json_encode(array("status" => "error", "message" => "No logs found."));
        }
    }
}


class BrokerController
{
    static public function ctrCreateBroker()
    {
        $table = "brokers";
        $data = array(
            "Broker_Name" => $_POST["broker_name"],
            "Broker_Phone" => $_POST["broker_phone"],
            "Broker_Email" => $_POST["broker_email"]
        );
        $response = BrokerModel::mdlCreateBroker($table, $data);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "Broker created successfully!"));
            // Log the broker creation action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Broker created: " . $_POST["broker_name"]);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error creating broker."));
        }
    }

    static public function ctrGetBrokers()
    {
        $table = "brokers";
        $response = BrokerModel::mdlGetBrokers($table);
        if ($response) {
            echo json_encode(array("status" => "success", "data" => $response));
            // Log the broker fetch action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Fetched brokers");
        } else {
            echo json_encode(array("status" => "error", "message" => "No brokers found."));
        }
    }

    static public function ctrGetBrokerById()
    {
        $table = "brokers";
        $id_Broker = $_POST["broker_id"];
        $response = BrokerModel::mdlGetBrokerById($table, $id_Broker);
        if ($response) {
            echo json_encode(array("status" => "success", "data" => $response));
            // Log the broker fetch by ID action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Fetched broker by ID: " . $id_Broker);
        } else {
            echo json_encode(array("status" => "error", "message" => "No broker found with this ID."));
        }
    }

    static public function ctrEditBroker()
    {
        $table = "brokers";
        $data = array(
            "Broker_ID" => $_POST["broker_id"],
            "Broker_Name" => $_POST["broker_name"],
            "Broker_Phone" => $_POST["broker_phone"],
            "Broker_Email" => $_POST["broker_email"]
        );
        $response = BrokerModel::mdlEditBroker($table, $data);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "Broker updated successfully!"));
            // Log the broker edit action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Broker updated: " . $_POST["broker_name"]);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error updating broker."));
        }
    }

    static public function ctrDisableBroker()
    {
        $table = "brokers";
        $id_Broker = $_POST["broker_id"];
        $response = BrokerModel::mdlDisableBroker($table, $id_Broker);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "Broker disabled successfully!"));
            // Log the broker disable action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Broker disabled: " . $id_Broker);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error disabling broker."));
        }
    }

    static public function ctrEnableBroker()
    {
        $table = "brokers";
        $id_Broker = $_POST["broker_id"];
        $response = BrokerModel::mdlEnableBroker($table, $id_Broker);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "Broker enabled successfully!"));
            // Log the broker enable action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Broker enabled: " . $id_Broker);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error enabling broker."));
        }
    }
}

class ProductOriginController
{
    static public function ctrCreateProductOrigin()
    {
        $table = "producto_origen";
        $data = array(
            "broker_id" => $_POST["broker"],
            "producto" => $_POST["producto"],
            "pais_origen" => $_POST["pais_origen"],
            "nombre_comercial" => $_POST["nombre_comercial"],
            "nombre_cientifico" => $_POST["nombre_cientifico"],
            "fraccion_arancelaria" => $_POST["fraccion_arancelaria"],
            "unidad_inventariable" => $_POST["unidad_inventariable"],
            "kg_por_pieza" => $_POST["kg_por_pieza"],
            "num_producto" => $_POST["num_producto"],
            "requiere_fumigacion" => isset($_POST["requiere_fumigacion"]) ? 1 : 0
        );

        $response = ProductOriginModel::mdlCreateProductOrigin($table, $data);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "Product origin created successfully!"));
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Product origin created: " . $_POST["producto"]);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error creating product origin."));
        }
    }

    static public function ctrGetProductOrigin()
    {
        $table = "producto_origen";
        $response = ProductOriginModel::mdlGetProductOrigins($table);
        if ($response) {
            echo json_encode(array("status" => "success", "data" => $response));
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Fetched product origins");
        } else {
            echo json_encode(array("status" => "error", "message" => "No product origins found."));
        }
    }
}

class ProviderController
{
    static public function ctrGetProviders()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $table = "providers";
        $response = ProviderModel::mdlGetProviders($table);
        if ($response) {
            echo json_encode(array("status" => "success", "data" => $response));
            // Log the provider fetch action
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Fetched providers");
        } else {
            echo json_encode(array("status" => "error", "message" => "No providers found."));
        }
    }

    static public function ctrCreateProvider()
    {
        $table = "providers";
        $data = array(
            "Provider_Name" => $_POST["provider_name"],
            "Provider_Phone" => $_POST["provider_phone"],
            "Provider_Email" => $_POST["provider_email"]
        );
        $response = ProviderModel::mdlCreateProvider($table, $data);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "Provider created successfully!"));
            // Log the provider creation action
            session_start();
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Provider created: " . $_POST["provider_name"]);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error creating provider."));
        }
    }
}

class OrderController
{
    static public function ctrInitOrder()
    {
        $table = "ordenes_compra";

        // Obtener el siguiente ID de la tabla ordenes_compra
        $nextId = OrderModel::mdlGetNextOrderId($table);

        // Obtener brokers
        $brokers = BrokerModel::mdlGetBrokers("brokers");

        // Obtener proveedores
        $providers = ProviderModel::mdlGetProviders("providers");

        // Obtener productos origen
        $productOrigins = ProductOriginModel::mdlGetProductOrigins("producto_origen");

        // obtener unidades de medida
        $units = ProductOriginModel::mdlGetUnits("unidad_inventariable");

        // Obtener usuarios y roles
        $users = UserModel::mdlFetchUsers("user_catalog");
        $roles = UserModel::mdlFetchRoles("roles");

        // Mapear roles por ID para acceso rápido
        $roleMap = [];
        foreach ($roles as $role) {
            // Asumo que en $role tienes keys 'id_Rol' y 'Role_Name'
            $roleMap[$role['id_Rol']] = $role['Role_Name'];
        }

        // Separar supervisores y ejecutivos
        $supervisores = [];
        $ejecutivos = [];
        foreach ($users as $user) {
            // Asumo que en $user el campo de rol es 'Role_ID'
            $rid = $user['Role_ID'];
            // Eliminar el campo Password si existe
            if (isset($user['Password'])) {
                unset($user['Password']);
            }
            if (
                isset($roleMap[$rid]) &&
                mb_strtolower($roleMap[$rid]) === 'supervisor'
            ) {
                $supervisores[] = $user;
            } elseif (
                isset($roleMap[$rid]) &&
                mb_strtolower($roleMap[$rid]) === 'ejecutivo'
            ) {
                $ejecutivos[] = $user;
            }
        }

        echo json_encode([
            "status" => "success",
            "next_order_id" => $nextId,
            "brokers" => $brokers,
            "providers" => $providers,
            "product_origins" => $productOrigins,
            "units" => $units,
            "supervisores" => $supervisores,
            "ejecutivos" => $ejecutivos
        ]);
    }

    static public function ctrSaveOrder()
    {
        $table = "ordenes_compra";
        $data = array(
            "order_id" => $_POST["order_id"],
            "broker_id" => $_POST["broker_id"],
            "provider_id" => $_POST["provider_id"],
            "product_origin_id" => $_POST["product_origin_id"],
            "commercial_name" => $_POST["commercial_name"],
            "quantity" => $_POST["quantity"],
            "unit" => $_POST["unit"],
            "price" => $_POST["price"],
            "currency" => $_POST["currency"],
            "supervisor_id" => $_POST["supervisor_id"],
            "executive_id" => $_POST["executive_id"]
        );

        $response = OrderModel::mdlSaveOrder($table, $data);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "Order saved successfully!"));
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Order created: " . $_POST["order_id"]);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error saving order."));
        }
    }

    static public function ctrLoadPendienting()
    {
        $table = "ordenes_compra";
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userId = $_SESSION["id_Users"];
        $response = OrderModel::mdlLoadPendienting($table, $userId);
        if ($response) {
            echo json_encode(array("status" => "success", "data" => $response));
            LogsController::createLog($_SESSION["id_Users"], $_SESSION['company_id'], "Fetched pending orders");
        } else {
            echo json_encode(array("status" => "error", "message" => "No pending orders found."));
        }
    }

}