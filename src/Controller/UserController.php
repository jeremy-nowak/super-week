<?php
namespace App\Controller;

use Faker;
use App\Model\UserModel;

class UserController{

    public function fill(){
        
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $lastname = $faker->lastName();
            $firstname = $faker->firstName();
            $email = strtolower("$firstname.$lastname@$faker->freeEmailDomain");
            $userModel = new UserModel();
            $userModel->fillBdd([
                "firstname"=>$firstname,
                "lastname"=>$lastname,
                "email"=>$email,
                "password"=>password_hash("azerty", PASSWORD_DEFAULT),
            ]);
            

        }
            
        
    }

    public function list(){

        $userModel = new UserModel();
        $select = $userModel->findAll();
        return json_encode($select);
    }


}
