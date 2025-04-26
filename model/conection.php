<?php
require_once "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class Conexion
{

    static public function conectar()
    {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        $link = new PDO(
            "sqlsrv:Server=$host;Database=$dbname",
            $user,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        return $link;
    }
}
