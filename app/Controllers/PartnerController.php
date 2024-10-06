<?php
    namespace app\Controllers;

    use app\Models\Partner;

    Class PartnerController{
        public function create(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $event = new Partner();

                if (isset($_FILES['parceiro-img'])) {
                    // Obtém as informações da imagem
                    //$imageName = $_FILES['image']['name'];
                    $pimageType = $_FILES['parceiro-img']['type'];
                    $pImageData = file_get_contents($_FILES['parceiro-img']['tmp_name']);
                }

                $event->set_partnerImg($pImageData);
                $event->set_partnerImgType($pimageType);
                $event->set_partnerName($_POST['parceiro-nome']);
                $event->set_partnerField($_POST['parceiro-area']);
                $event->set_partnerDescription($_POST['parceiro-descript']); 
                
                if($event->create()){
                    header("Location: /sigenv/parceiros");
                }
                else{
                    echo "Something gone wrong";
                }
                
            }
        }

        public function showAll(){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $event = new Partner();

                $events = $event->findAll();

                require "app/Views/Partner/partner.php";
            }

        }
    }
?>