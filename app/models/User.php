<?php
require_once 'core/Model.php';

class User extends Model {
    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users where id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $password,$role) {
        $stmt = $this->db->prepare("INSERT INTO users (username, password,role) VALUES (:username, :password,:role)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
    }
}