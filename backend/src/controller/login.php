<?php
session_start();

include('../connection/connection.php');
require_once('./userController.php');

//get Login and Password from POST to verify the user
$userController = new userController();
$login = mysqli_real_escape_string($connection, $_POST['login']);
$password = mysqli_real_escape_string($connection, $_POST['password']);


//to avoid access without all fields filled correctly
if(strlen($login) >= 4 || strlen($password) >= 6) {
    $userController->Login($connection, $login, $password);
} else {
    $_SESSION['not_auth'] = true;
    header('Location: ../index.php');
    exit();
}
?>
