<?php

class UserController {
    static public function ctrLogin() {
        if (isset($_POST["login"])) {
            $table = "users";
            $item = "email";
            $value = $_POST["email"];
            $response = UserModel::mdlShowUsers($table, $item, $value);

            
        }
    }
}