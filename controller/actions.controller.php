<?php

    require_once __DIR__."/form.controller.php";
    require_once "../model/form.model.php";

    switch ($_POST["action"]) {
        case 'login':
            UserController::ctrLogin();
            break;
        case 'createUser':
            UserController::ctrCreateUser();
            break;
    }
