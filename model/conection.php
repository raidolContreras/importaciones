<?php

require_once 'vendor/autoload.php';

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

        try {
            $link = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                $user,
                $password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );

            return $link;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
