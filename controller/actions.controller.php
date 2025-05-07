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
        case 'fetchUsers':
            UserController::ctrFetchUsers();
            break;
        case 'deleteUser':
            UserController::ctrDeleteUser();
            break;
        case 'createRole':
            UserController::ctrCreateRole();
            break;
        case 'fetchRoles':
            UserController::ctrFetchRoles();
            break;
        case 'deleteRole':
            UserController::ctrDeleteRole();
            break;
        case 'changeCompany':
            UserController::ctrChangeCompany();
            break;
    }
