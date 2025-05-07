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
        } else {
            // Password is incorrect
            echo json_encode(array("status" => "error", "message" => "Invalid username or password."));
        }
    }

    static public function ctrCreateUser()
    {
        $Role_ID = isset($_POST["Role_ID"]) ? $_POST["Role_ID"] : 1; // Default to 1 if not set
        $table = "user_catalog";
        $data = array(
            "Username" => $_POST["username"],
            "Password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
            "Role_ID" => $Role_ID
        );
        $response = UserModel::mdlCreateUser($table, $data);

        if ($response == "ok") {
            echo json_encode(array("status" => "success", "message" => "User created successfully!"));
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
        } else {
            echo json_encode(array("status" => "error", "message" => "Error deleting role."));
        }
    }

    static public function ctrGetDataUser() {
        $id_Users = $_SESSION["id_Users"];
        $company_id = $_SESSION["company_id"];

        $response = UserModel::mdlGetDataUser($id_Users, $company_id);
        return $response;
    }

    static public function ctrChangeCompany() {
        session_start();
        $company_id = $_POST["company_id"];
        $_SESSION["company_id"] = $company_id;
        echo json_encode(array("status" => "success", "message" => "Company changed successfully!"));
    }
}
