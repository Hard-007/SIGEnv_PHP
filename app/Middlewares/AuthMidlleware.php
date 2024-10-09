<?php
    namespace app\Middlewares;

    Class AuthMidlleware{

        public static function handle(){
            if (!isset($_SESSION['category']) || $_SESSION['category'] != "superadmin") {
                header('Location: /sigenv/401');
                exit();
            }
        }
        public static function login(){
            if (!isset($_SESSION['category'])) {
                header('Location: /sigenv/entrar');
                exit();
            }
        }
    }
?>