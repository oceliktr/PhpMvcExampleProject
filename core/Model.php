<?php

class Model {
    protected $db;

    public function __construct() {
        // Veritabanı bağlantısı oluştur
        $this->db = new PDO('mysql:host=localhost;dbname=php_mvc', 'root', '00100');
    }
}