<?php

namespace App\Model;

use PDO;

class BookModel{

    private $pdo;

    public function __construct()
    {
        $host = "localhost";
        $dbName = "super-week";
        $dbUser = "root";
        $dbPassword = "";
        $db = "book";
        try {
            $this->pdo = new \PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("set names utf8");
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

    public function findAll(): array|false 
    {

        $request = "SELECT * FROM book";
        $select = $this->pdo->prepare($request);
        $select->execute();
        $result = $select->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function registerBook(array $values){
        $request="INSERT INTO book (title, content, id_user) VALUES (:title, :content, :id_user)";
        $insert = $this->pdo->prepare($request);
        $result = $insert->execute($values);
        return $result;

    }

    public function findOne($id)
    {
       
        $request = "SELECT * FROM book WHERE id = :id";
        $select = $this->pdo->prepare($request);
        $select->execute([
            ":id" => $id
        ]);
        $result = $select->fetch(PDO::FETCH_ASSOC);

        return json_encode($result);
    }



}


?>