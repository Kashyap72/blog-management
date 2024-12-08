<?php
namespace Models;

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'blog-management';
    public $conn;

    // Constructor to initialize the database connection
    public function __construct() {
        $this->conn = $this->connect();
    }

    // Connect to the database
    public function connect() {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    // Optionally, you can add a method to close the connection
    public function close() {
        mysqli_close($this->conn);
    }
}
