<?php
class Database {
    private $host = 'localhost';
    private $db = 'destinix';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}",
                $this->user,
                $this->pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die(json_encode([
                "status" => "error",
                "message" => "Error de conexión: " . $e->getMessage()
            ]));
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>