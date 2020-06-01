<?php
    session_start();
?>
<div class="users-body">
    <div class="box">
        <div class="nav-bar">
            <?php
                echo "<span class='welcome-message'>Hello, ".$_SESSION['loggedUser']. "!</span>";
            ?>
            <a href="/logout.php">Log out</a>
        </div>
        <div class="user-list">
            <h3>User List</h3>

            <form action="/controller/user-list.php" method="POST">
                <button type="submit" class="">Show users</button>
            </form>

            <?php
            ?>
        </div>
    </div>
</div>

