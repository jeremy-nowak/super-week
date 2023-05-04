<?php

namespace App\Model;

use PDO;

class BookModel{

    private $pdo;

    public function findAll()
    {

        $request = "SELECT * FROM book";
        $select = $this->pdo->prepare($request);
        $select->execute();
        $result = $select->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function registerBook($title, $content, $id_user){
        $request="INSERT INTO book(title, content, id_user) VALUES ('title = :title','content = :content','id_user = :id_user')";
        $insert = $this->pdo->prepare($request);
        $insert->execute([
            ":title"=>$title,
            ":content"=>$content,
            ":id_user"=>$id_user,
        ]);
    }



}


?>