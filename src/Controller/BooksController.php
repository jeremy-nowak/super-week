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

        if(!empty($_POST['title']) && empty($_POST['content'])){
            $title = htmlspecialchars($_POST['title']) ;
            $content = htmlspecialchars($_POST['content']);
            $id_user = $_SESSION["id"];



            $bookmodel = new BookModel();
            $bookmodel->registerBook($title, $content, $id_user);
        
        }
    }




}







?>