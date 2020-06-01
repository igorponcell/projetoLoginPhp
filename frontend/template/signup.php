<?php
session_start();

?>

<div class="signup-body">
    <div class="box">
        <form action="/controller/signup.php" method="POST">
        <span class="span-signup">Sign Up</span>
            <div class="signup-container">
                <?php
                    include('../../frontend/template/signup-notification.php');
                ?>
                <div class="field">
                    <div class="control">
                        <input name="name" type="text" placeholder="Name" autofocus="">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input name="age" type="number" placeholder="Age">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input name="mail" type="mail" placeholder="Mail">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input name="login" name="text" placeholder="Login">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input name="password" type="password" placeholder="Password">
                    </div>
                </div>

                <div class="signup-actions">
                    <?php
                        if(isset($_SESSION['loggedUser'])){
                    ?>
                        <span class="back-hook"><a href="../controller/user-list.php">Back</a></span>
                    <?php } else {
                    ?>
                    <span class="back-hook"><a href="/index.php">Back</a></span>
                    <?php } ?>
                    <button type="submit" class="">Sign Up</button>
                </div>
            </di>
        </form>
    </div>
</div>