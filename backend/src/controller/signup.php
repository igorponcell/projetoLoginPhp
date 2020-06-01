<?php
session_start();

include('../connection/connection.php');
require_once('./userController.php');

if(empty($_POST['name']) || empty($_POST['age']) || empty($_POST['mail']) || empty($_POST['login']) ||empty($_POST['password'])) {
    $_SESSION['not_filled'] = true;
    header('Location: ../signup-page.php');
    exit();
}

// // validate name size
if(strlen($_POST['name']) < 3) {
    $_SESSION['not_valid_name'] = true;
    header('Location: ../signup-page.php');
    exit();
}

//validate mail
if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['not_valid_mail'] = true;
    echo $mail;
    echo $_SESSION['not_valid_mail'];
    header('Location: ../signup-page.php');
    exit();
}

//validate login size
if(strlen($_POST['login']) < 3) {
    $_SESSION['not_valid_login'] = true;
    header('Location: ../signup-page.php');
    exit();
}

//validate password size
if(strlen($_POST['password']) < 6) {
    $_SESSION['not_valid_password'] = true;
    header('Location: ../signup-page.php');
    exit();
}

//get all the parameters from POST to verify the user
$userController = new userController();
$name = mysqli_real_escape_string($connection, $_POST['name']);
$age = mysqli_real_escape_string($connection, $_POST['age']);
$mail = mysqli_real_escape_string($connection, $_POST['mail']);
$login = mysqli_real_escape_string($connection, $_POST['login']);
$password = mysqli_real_escape_string($connection, md5($_POST['password']));

$user = new user($name, $age, $mail, $login, $password);
$userController->Signup($connection, $user);
if(isset($_SESSION['loggedUser'])){
    header('Location: ../index.php');
} else {
    header('Location: ../index.php');
}
exit();

?>