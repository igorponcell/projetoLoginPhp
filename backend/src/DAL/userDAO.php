<?php
session_start;

require_once("../model/user.php");
include('../connection/connection.php');

class UserDAO{
    private $debug = true;

    public function Signup($connection, User $user) {
        try {
            $name = $user->getName();
            $age = $user->getAge();
            $mail = $user->getMail();
            $login = $user->getLogin();
            $password = $user->getPassword();

            if(!$this->ExistsUser($connection, $mail, $login)) {

                $sql = "insert into user (name, age, mail, login, password) VALUES ('{$name}','{$age}', '{$mail}', '{$login}', '{$password}')";

                if($connection->query($sql) === TRUE) {
                    $_SESSION['status_signup'] = true;
                }
                $connection->close();

                if(isset($_SESSION['loggedUser'])){
                    header('Location:../controller/user-list.php');
                } else {
                    header('Location:../index.php');
                }

                exit();
            } else {
                // usuario com dados invalidos fazer notificacão
                header('Location:../controllers/signup-page.php');
                exit();
            }

        } catch(Exception $ex) {
            if($debug) {
                echo $ex->getMessage();
            }
        }
    }

    public function Login($connection, string $login, string $password) {
        $query = "select user_id from user where login = '{$login}' and password = md5('{$password}')";

        $queryResult = mysqli_query($connection, $query);
        $row = mysqli_num_rows($queryResult);

        if($row == 1) {
            $_SESSION['loggedUser'] = $login;
            header('Location:../user-list-page.php');
            exit();
        } else {
            $_SESSION['not_auth'] = true;
            header('Location:../index.php');
            exit();
        }
    }

    private function ExistsUser($connection, string $userMail, string $userLogin) {
        $existLoginOrEmail = "select user_id from user where login = '{$userLogin}' or mail='{$userMail}'";
        $queryResult = mysqli_query($connection, $existLoginOrEmail);
        $row = mysqli_num_rows($queryResult);

        if($row >= 1) {
            return true;
        }
        return false;
    }

    public function EditUser($connection, User $user, $userId){
        $name = $user->getName();
        $age = $user->getAge();
        $mail = $user->getMail();
        $login = $user->getLogin();
        $password = $user->getPassword();

        try {
            $sql = "update user set `name` = '{$name}' , `age` = '{$age}', `mail` = '{$mail}', `login` = '{$login}', `password` = '{$password}' WHERE (`user_id` = '{$userId}')";

            if($connection->query($sql) === TRUE) {
                $_SESSION['status_updated'] = true;
                header('Location:../user-list-page.php');
                exit();
            } else {
                $_SESSION['status_updated'] = false;
                header('Location:../controller/edit-user.php');
                exit();
            }
            $connection->close();

            header('Location:/user-list.php');
            exit();
        } catch(Exception $ex) {
            if($debug) {
                echo $ex->getMessage();
            }
        }
    }

    public function DeleteUser($connection, string $userId){

        try {
            $sql = "delete from user where (user_id={$userId})";

            if(mysqli_query($connection, $sql)){
                echo "<div class='delete-container'>
                        <span>User deleted</span>
                        <a class='back-hook' href='../controller/user-list.php'>Back to user list</a>
                     </div>";
            }else {
                echo "<div class='delete-container'>
                        <span>Cannot delete User</span>
                        <a class='back-hook' href='../controller/user-list.php'>Back to user list</a>
                     </div>";
            }

        } catch(Exception $ex) {
            if($debug) {
                echo $ex->getMessage();
            }
        }
    }

    public function getAllUsers($connection) {
        $query="select * from user order by name";
        $queryResult=mysqli_query($connection, $query);

        //fetch the result row as an array
        $users = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);

        mysqli_free_result($queryResult);
        return $users;
    }

    public function GetUserById($connection, string $userId) {
        $query = "select * from user where user_id = {$userId}";
        $queryResult = mysqli_query($connection, $query);

        //fetch the result row as an array
        $userResult = mysqli_fetch_assoc($queryResult);

        mysqli_free_result($queryResult);

        $user = new user($userResult['name'], $userResult['age'],$userResult['mail'],$userResult['login'], $userResult['password']);
        return $user;
    }

}
