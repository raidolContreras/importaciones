<?php

require_once __DIR__ . "/form.controller.php";
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
    case 'fetchLogs':
        LogsController::ctrFetchLogs();
        break;
    case 'createBroker':
        BrokerController::ctrCreateBroker();
        break;
    case 'getBrokers':
        BrokerController::ctrGetBrokers();
        break;
    case 'getBrokerById':
        BrokerController::ctrGetBrokerById();
        break;
    case 'editBroker':
        BrokerController::ctrEditBroker();
        break;
    case 'disableBroker':
        BrokerController::ctrDisableBroker();
        break;
    case 'enableBroker':
        BrokerController::ctrEnableBroker();
        break;
    case 'createProductOrigin':
        ProductOriginController::ctrCreateProductOrigin();
        break;
    case 'getProductsOrigin':
        ProductOriginController::ctrGetProductOrigin();
        break;
    case 'getProviders':
        ProviderController::ctrGetProviders();
        break;
    case 'createProvider':
        ProviderController::ctrCreateProvider();
        break;
}
