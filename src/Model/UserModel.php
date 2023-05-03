<?php

namespace App\Model;

use PDO;

class UserModel{
    private $pdo;

    public function __construct()
    {
        $host = "localhost";
        $dbName = "super-week";
        $dbUser = "root";
        $dbPassword = "";
        $db = "user";
        try{
            $this->pdo = new \PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser,$dbPassword);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("set names utf8");
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

    public function fillBdd(array $values){
        $request = "INSERT INTO user(first_name, last_name, email, password) VALUES(:firstname, :lastname, :email, :password)";
        $insert = $this->pdo->prepare($request);
        $insert->execute($values);
    }

    public function findAll(){

        $request = "SELECT * FROM user";
        $select = $this->pdo->prepare($request);
        $select->execute();
        $result = $select->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
}



