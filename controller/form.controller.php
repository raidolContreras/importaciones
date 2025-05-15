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
        $tz   = new DateTimeZone('America/Mexico_City');
        $now  = new DateTime('now', $tz);

        $data = [
            "id_usuario" => $userId,
            "id_empresa" => $companyId,
            "fecha"      => $now->format('Y-m-d'),
            "hora"       => $now->format('H:i:s'),
            "accion"     => $action
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
