<?php
    namespace app\Controllers;

    use app\Models\Speaker;

    Class SpeakerController{
        public function create(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $event = new Speaker();

                if (isset($_FILES['orador-img'])) {
                    // Obtém as informações da imagem
                    //$imageName = $_FILES['image']['name'];
                    $oimageType = $_FILES['orador-img']['type'];
                    $oImageData = file_get_contents($_FILES['orador-img']['tmp_name']);
                }

                $event->set_speakerImg($oImageData);
                $event->set_speakerImgType($oimageType);
                $event->set_speakerName($_POST['orador-nome']);
                $event->set_speakerTitle($_POST['orador-titulo']);
                $event->set_speakerCompany($_POST['orador-empresa']);
                $event->set_speakerBio($_POST['orador-bio']);   
                
                if($event->create()){
                    header("Location: /sigenv/oradores");
                }
                else{
                    echo "Something gone wrong";
                }
                
            }
        }

        public function showAll(){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $event = new Speaker();

                $events = $event->findAll();

                require "app/Views/Speaker/speaker.php";
            }

        }
    }
?>