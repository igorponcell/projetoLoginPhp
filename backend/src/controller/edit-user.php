<?php
session_start();

include('../connection/connection.php');
require_once('./userController.php');

//get all the parameters from POST to verify the user
$userController = new userController();

$userId = mysqli_real_escape_string($connection, $_POST['user_id']);
$name = mysqli_real_escape_string($connection, $_POST['name']);
$age = mysqli_real_escape_string($connection, $_POST['age']);
$mail = mysqli_real_escape_string($connection, $_POST['mail']);
$login = mysqli_real_escape_string($connection, $_POST['login']);
$password = mysqli_real_escape_string($connection, md5($_POST['password']));

if(empty($_POST['name']) || empty($_POST['age']) || empty($_POST['mail']) || empty($_POST['login']) ||empty($_POST['password'])) {
    $_SESSION['not_filled'] = true;
    header('Location: ./details.php?id="'.$useriId.'"');
    exit();
}

// validate name size
if(strlen($_POST['name']) < 3) {
    $_SESSION['not_valid_name'] = true;
    header('Location: ./details.php?id="'.$useriId.'"');
    exit();
}

//validate mail
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    $_SESSION['not_valid_mail'] = true;
    header('Location: ./details.php?id="'.$useriId.'"');
    exit();
}

//validate login size
if(strlen($_POST['login']) < 3) {
    $_SESSION['not_valid_login'] = true;
    header('Location: ./details.php?id="'.$useriId.'"');
    header('Location: ./details.php');
    exit();
}

//validate password size
if(strlen($_POST['password']) < 6) {
    $_SESSION['not_valid_password'] = true;
    header('Location: ./details.php?id="'.$useriId.'"');
    exit();
}

$user = new user($name, $age, $mail, $login, $password);
$userController->EditUser($connection, $user, $userId);

header('Location: ../user-list-page.php');
exit();

?>