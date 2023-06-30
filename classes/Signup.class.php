<?php
require_once "../classes/Mysql.class.php";

class Signup extends Mysql
{

    //private $id;
    private $name;
    private $email;
    private $password;
    private $password2;

    public function __construct($name, $email, $password, $password2)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->password2 = $password2;
    }


    //Checking for empty fields
    private function emptyInput()
    {
        $result = (isset($this->name) || isset($this->email) || isset($this->password) || isset($this->password2)) ? true : false;
        return $result;
    }

    //Checking for valid name
    private function validateName()
    {
        $result = preg_match("/^([a-zA-Z' ]+)$/", $this->name) ? true : false;
        return $result;
    }

    //Checking the email validity
    private function invalidEmail()
    {
        $result = filter_var($this->email, FILTER_VALIDATE_EMAIL) ? true : false;
        return $result;
    }

    //Checking if the password and the password confirmation match
    private function validatePassword()
    {
        $result = $this->password == $this->password2 ? true : false;
        return $result;
    }


    public function signupUser()
    {
        //No Input
        if ($this->emptyInput() == false) {
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        //Invalid Name
        if ($this->validateName() == false) {
            header("Location: ../index.php?error=invalidname");
            exit();
        }

        //Invalid Email
        if ($this->invalidEmail() == false) {
            header("Location: ../index.php?error=invalidemail");
            exit();
        }

        if ($this->isUniqueEmail($this->email) == true) {
            header("Location: ../index.php?error=notuniqueemail");
            exit();
        }

        //Invalid Password
        if ($this->validatePassword() == false) {
            header("Location: ../index.php?error=invalidpassword");
            exit();
        }

        $this->createUser($this->name, $this->email, $this->password);
    }
}
