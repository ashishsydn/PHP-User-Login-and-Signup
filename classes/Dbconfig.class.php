<?php
class Dbconfig
{
    protected $dbServer;
    protected $dbUser;
    protected $dbPassword;
    protected $dbName;

    protected function connect()
    {

        try {
            $this->dbServer = 'localhost';
            $this->dbUser = 'root';
            $this->dbPassword = '';
            $this->dbName = 'dbase';
            $dbh = new PDO('mysql:host=' . $this->dbServer . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPassword);
            return $dbh;
        } catch (Exception $e) {
            //Error if connecting to database fails
            print "Error: " . $e->getMessage() . "<br />";
            die();
        }
    }
}
