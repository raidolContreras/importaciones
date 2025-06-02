<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "controller/template.controller.php";
require_once "controller/form.controller.php";
require_once "controller/companies.controller.php";
require_once "model/companies.model.php";
require_once "model/form.model.php";

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
    $template = new ControllerTemplate();
    $template->ctrBringTemplate();
} else {
    $template = new ControllerTemplate();
    $template->ctrBringLogin();
}
