<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <div class="login-body">
        <div class="box">
            <form action="/controller/login.php" method="POST">
                    <?php
                        if(isset($_SESSION['not_auth'])):
                    ?>
                    <div class="invalid-login-notification">
                      <p>Invalid Login or Password. Try again!</p>
                    </div>
                    <?php
                    endif;
                        unset($_SESSION['not_auth']);
                        if(isset($_SESSION['status_signup'])):
                    ?>
                    <div class="signup-notification">
                      <p>User successfully registered!</p>
                    </div>
                    <?php
                    endif;
                        unset($_SESSION['status_signup']);
                    ?>
                <span class="span-login">Login</span>

                <div class="field">
                    <div class="control">
                        <input name="login" type="text" placeholder="Login" autofocus="">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input name="password" type="password" placeholder="Password">
                    </div>
                </div>

                <button type="submit" class="">Log In</button>
            </form>
            <span class="signup-hook">Not a member? <a href="/signup-page.php">Sing up</a></span>
        </div>
    </div>
</body>

</html>
