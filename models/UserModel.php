<?php
require_once 'database.php';

class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function authenticate($username, $password) {
        // Escape input to prevent SQL injection
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }
}
?>
