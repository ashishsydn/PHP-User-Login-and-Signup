<?php

class Authenticate
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    private function emptyInput()
    {
        $result = (isset($this->name) || isset($this->email)) ? true : false;
        return $result;
    }

    public function loginUser()
    {
        //No Input
        if ($this->emptyInput() == false) {
            header("Location: ../index.php?error=emptyinput");
            exit();
        }
    }
}
