<?php
namespace App\Controller;

use App\Model\BookModel;

class BooksController{

    public function displayBookForm()
    {
        if (isset($_SESSION['user'])) {
            require "src/View/bookForm.php";
        }
    }


    public function addBook(){

        if(!empty($_POST['title']) && !empty($_POST['content'])){

            $title = htmlspecialchars($_POST['title']) ;
            $content = htmlspecialchars($_POST['content']);
            $id_user = $_SESSION["user"]["id"];

            $bookmodel = new BookModel();
            $bookAdd = $bookmodel->registerBook([
                "title" => $title,
                "content" => $content,
                "id_user" => $id_user,
            ]);

            if($bookAdd){
                echo "Ajout de livre effectué";
            }
            else{
                echo "error";
            }
        
        }
        else{
            echo "un des champs est vide";
        }
    }

    public function displayBooks(){
        
        $bookmodel = new BookModel();
        $book = $bookmodel->findAll();

        echo json_encode($book);


    }
}
?>