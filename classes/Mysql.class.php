<?php
require_once '../classes/DBconfig.class.php';

class Mysql extends Dbconfig
{

    public function isUniqueEmail($email)
    {
        $statement = $this->connect()->prepare('SELECT email FROM users WHERE email = ?;');

        if (!$statement->execute(array($email))) {
            $statement = null;
            header("Location: ../index.php?error=bademailstatement");
        }

        $resultCheck = $statement->rowCount() ? true : false;

        return $resultCheck;
    }

    public function createuser($name, $email, $password)
    {
        $statement = $this->connect()->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?);');

        $password = password_hash($password, PASSWORD_DEFAULT);


        if (!$statement->execute(array($name, $email, $password))) {
            $statement = null;
            header("Location: ../index.php?error=createfail");
            exit();
        }

        $resultCheck = $statement->rowCount() ? true : false;

        return $resultCheck;
    }
}
