<?php
    if(isset($_SESSION['not_filled'])):
?>
    <div class="invalid-signup-notification">
    <p>Warning: All fields are required</p>
    </div>
<?php
    endif;
    unset($_SESSION['not_filled']);
    if(isset($_SESSION['not_valid_name'])):
?>
    <div class="invalid-signup-notification">
        <p>Warning: Not valid name size: Minimun 3</p>
    </div>
<?php
    endif;
    unset($_SESSION['not_valid_name']);
    if(isset($_SESSION['not_valid_mail'])):
?>
    <div class="invalid-signup-notification">
        <p>Warning: Not valid mail</p>
    </div>
<?php
endif;
    unset($_SESSION['not_valid_mail']);
    if(isset($_SESSION['not_valid_login'])):
?>
    <div class="invalid-signup-notification">
        <p>Warning: Not valid login size: Minimun 3</p>
    </div>
<?php
    endif;
    unset($_SESSION['not_valid_login']);
    if(isset($_SESSION['not_valid_password'])):
        ?>
            <div class="invalid-signup-notification">
                <p>Warning: Not valid password size: Minimun 6</p>
            </div>
<?php
endif;
    unset($_SESSION['not_valid_password']);
?>