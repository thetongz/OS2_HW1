<?php

class Database
{
    private $serverName = 'localhost';
    private $username = 'OS2';
    private $password = '12345678';
    private $databaseName = 'os2';

    function connect()
    {
        return new PDO('mysql:host=' . $this->serverName . ';dbname=' . $this->databaseName, $this->username, $this->password);
    }
}
?>