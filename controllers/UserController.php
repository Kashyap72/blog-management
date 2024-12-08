<?php
require_once 'models/UserModel.php';

class UserController {
    public function login() {
        require 'views/admin/login.php';
    }

    public function dashboard() {
        require 'views/admin/dashboard.php';
    }
}
?>
