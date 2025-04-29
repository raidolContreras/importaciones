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
}
