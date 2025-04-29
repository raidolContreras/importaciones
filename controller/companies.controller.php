<?php
require_once "model/companies.model.php";

class CompaniesController
{
    static public function obtenerEmpresas()
    {
        return Modelo::obtenerEmpresas();
    }
