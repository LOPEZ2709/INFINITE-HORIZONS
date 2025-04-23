<?php
class Estado {
    public $conn;
    public $table = 'estado';

    public $id_estado;
    public $desc_estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET desc_estado = :desc_estado";
        $stmt = $this->conn->prepare($query);
        $this->desc_estado = htmlspecialchars(strip_tags($this->desc_estado));
        $stmt->bindParam(':desc_estado', $this->desc_estado);
        return $stmt->execute() ? true : false;
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET desc_estado = :desc_estado WHERE id_estado = :id_estado";
        $stmt = $this->conn->prepare($query);
        $this->desc_estado = htmlspecialchars(strip_tags($this->desc_estado));
        $this->id_estado = htmlspecialchars(strip_tags($this->id_estado));
        $stmt->bindParam(':desc_estado', $this->desc_estado);
        $stmt->bindParam(':id_estado', $this->id_estado);
        return $stmt->execute() ? true : false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id_estado = :id_estado";
        $stmt = $this->conn->prepare($query);
        $this->id_estado = htmlspecialchars(strip_tags($this->id_estado));
        $stmt->bindParam(':id_estado', $this->id_estado);
        return $stmt->execute() ? true : false;
    }
}
?>