<?php

require_once("../DAL/userDAO.php");

class UserController{
    private $userDAO;

    public function __construct () {
        $this->userDAO = new userDAO();
    }

    public function Signup($connection, User $user) {
        $this->userDAO->Signup($connection, $user);
    }

    public function Login($connection, $login, $password) {
        $this->userDAO->Login($connection, $login, $password);
    }

    public function EditUser($connection, User $user, $userId) {
        $this->userDAO->EditUser($connection, $user, $userId);
    }

    public function DeleteUser($connection, int $userId) {
        $this->userDAO->DeleteUser($connection, $userId);
    }

    public function getAllUsers($connection) {
        $users = $this->userDAO->getAllUsers($connection);
        return $users;
    }

    public function GetUserById($connection, string $userId) {
        $users = $this->userDAO->GetUserById($connection, $userId);
        return $users;
    }
}
?>
