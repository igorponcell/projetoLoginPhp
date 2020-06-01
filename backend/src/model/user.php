<?php

class User{
    private $name;

    private $age;

    private $mail;

    private $login;

    private $password;

    public function __construct ($name, $age, $mail, $login, $password) {
        $this->name = $name;
        $this->age = $age;
        $this->mail = $mail;
        $this->login = $login;
        $this->password = $password;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

    public function getLogin() {
        return $this->login;
    }

    // fazer validação se o novo Login é valido
    public function setLogin($login){
        $this->login = $login;
    }

    public function getPassword() {
        return $this->password;
    }

    //fazer validação de senha atual e senha nova
    public function setPassword($password){
        $this->password = $password;
    }
}