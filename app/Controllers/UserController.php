<?php
    namespace app\Controllers;
    use app\Models\User;

    Class UserController{

        public function login(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $user = new User();

                $user->set_uEmail($_POST['email']);
                $user->set_uPasswd($_POST['passwd']);

                $authedUser = $user->auth($user);
                
                $_SESSION['id'] = $authedUser['id'];
                $_SESSION['nome'] = substr($authedUser['name'], 0, 1);
                $_SESSION['apelido'] = substr($authedUser['surname'], 0, 8);
                $_SESSION['category'] = $authedUser['category'];
                
                if($_SESSION['category'] == "Admin"){
                    header("Location: /sigenv/evento");
                }
                else{
                    header("Location: /sigenv/evento");
                }
            }
            else{
                echo "Request Error";
            }
            
        }
        public function signin(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $user = new User();

                $user->set_uName($_POST['name']);
                $user->set_uSurname($_POST['surname']);
                $user->set_uEmail($_POST['email']);
                $user->set_uPasswd($_POST['passwd']);
                
                if($user->exists($user)){
                    echo "Ja existe";
                }
                else{
                    if($user->create($user)){
                        header("Location: /sigenv/entrar");
                    }
                    else{
                        echo "something went wrong";
                    }
                }
            }
        }
    }
?>