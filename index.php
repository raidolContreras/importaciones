<?php

    require_once "controller/template.controller.php";
    require_once "controller/form.controller.php";
    require_once "controller/companies.controller.php";
    require_once "model/companies.model.php";
    require_once "model/form.model.php";

    session_start();
    if (isset($_SESSION["validarSesion"]) && $_SESSION["validarSesion"] == "ok") {
        $template = new ControllerTemplate();
        $template -> ctrBringTemplate();
    } else {
        $template = new ControllerTemplate();
        $template -> ctrBringLogin();
    }
