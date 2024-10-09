<?php
    namespace app\Controllers;
    use app\Models\Subscription;

    class SubscriptionController{
        public $submit;

        public function __construct(){
            $this->submit = new Subscription();
        }

        public function createSubscription($id){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                //
                $this->submit->setId_evento($id);
                $this->submit->setId_user($_SESSION['id']);

                if($this->submit->checkSub() < 1){
                    $result = $this->submit->createSubscription();

                    if($result){
                        header("Location: /sigenv/evento/$id");
                    }
                    else{
                        echo "something went wrong";
                    }
                }
                else{
                    echo "Utilizador ja inscrito";
                }
            }
        }
        public function mySubscription(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $this->submit->setId_user($_SESSION['id']);

                $mySub = $this->submit->mySubscription();

                if($mySub){
                    require "app/Views/Submission/subscription.php";
                }
            }
        }

        public function check($id, $idE){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $this->submit->setId($id);
                $this->submit->setId_evento($idE);

                $result = $this->submit->checkSubscription();

                if($result){
                    header("Location: /sigenv/evento/details/$idE#inscritos");
                }

            }
        }
        public function uncheck($id, $idE){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $this->submit->setId($id);
                $this->submit->setId_evento($idE);

                $result = $this->submit->uncheckSubscription();

                if($result){
                    header("Location: /sigenv/evento/details/$idE#inscritos");
                }

            }
        }


    }

?>