<?php

session_start();
include('../connection/connection.php');
require_once('./userController.php');
include('../../../frontend/style/user-list.html');

$userController = new userController();

if(isset($_GET['id'])){
    $userId = $_GET['id'];
    $user = $userController->GetUserByID($connection, $userId);
} else {
    include('../connection/auth_login.php');

    header('Location: ../user-list-page.php');
    exit();
}

?>

<div class="users-body">
    <div class="box">
        <form class="edit-form" action="edit-user.php" method="POST">

        <span class="span-edit">Edit User</span>

            <div class="edit-container">
                <input name="user_id" type="hidden"value="<?php echo $userId ?>" autofocus="">

                <div class="field">
                    <div class="control">
                        <input name="name" type="text" placeholder="Name" value="<?php echo $user->getName(); ?>" autofocus="">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input name="age" type="number" value="<?php echo $user->getAge(); ?>" placeholder="Age">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input name="mail" type="mail" value="<?php echo $user->getMail(); ?>" placeholder="Mail">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input name="login" name="text" value="<?php echo $user->getLogin() ?>" placeholder="Login">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input name="password" type="password" placeholder="Password">
                    </div>
                </div>

                <div class="edit-actions">
                    <span class="back-hook"><a href="/controller/user-list.php">Back</a></span>
                    <button type="submit" class="">Edit User</button>
                </div>
            </di>
        </form>
    </div>
</di>