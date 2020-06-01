<?php
session_start();
include('../connection/connection.php');
require_once('./userController.php');
include('../../../frontend/style/user-list.html');

$userController = new userController();
$users = $userController->GetAllUsers($connection);

if(isset($_POST['delete'])){
    $user = $userController->DeleteUser($connection, $_POST['user_id']);
} else {
?>
<div class="table">
    <?php
        foreach ($users as $user) {
    ?>
    <div class='row'>
        <div class='column-cell'><span> <?php echo $user['name']?></span></div>
        <div class='column-cell'><span><?php echo $user['age']?></span></div>
        <div class='column-cell mail-cell'><span><?php echo $user['mail']?></span></div>
        <div class='column-cell'><span><?php echo $user['login']?></span></div>
        <div class='column-cell'><a href="./details.php?id=<?php echo $user['user_id']?>">Edit user</a></div>
        <div class='column-cell'>
            <form action='user-list.php' method='POST'>
                <input name='user_id' type='hidden' value="<?php echo $user['user_id']?>">
                <input name='delete' type='submit' placeholder='Name' value='delete' autofocus=''>
            </form>
        </div>
        <br>
    </div>
    <?php
        }
    ?>
    <div class="user-list-actions">
        <span class="add-hook"><a href="/user-list-page.php">Back</a></span>
        <span class="add-hook"><a href="/signup-page.php">Add a User</a></span>
    </div>
</div>
    <?php
    }
?>
