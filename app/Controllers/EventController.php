<?php
    namespace app\Controllers;

    use app\Models\Event;

    Class EventController{
        public $event;

        public function __construct(){
            $this->event = new Event();
        }

        public function dash(){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $event = new Event();

                $events = $event->dash();

                require "app/Views/index.php";
            }
        }
        public function createEvent(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['tema'], $_POST['tipo'], $_POST['local'], $_POST['inicio']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
                    $imageType = $_FILES['banner']['type'];
                    $imageData = file_get_contents($_FILES['banner']['tmp_name']);
                    
                    $this->event->set_eventBanner($imageData);
                    $this->event->set_eventBannerType($imageType);
                    $this->event->set_eventTitle($_POST['tema']);
                    $this->event->set_eventType($_POST['tipoEvento']);
                    $this->event->set_eventShort($_POST['resumo']);
                    $this->event->set_eventDescription($_POST['descricao']);
                    
                    $this->event->set_eventLimit($_POST['lotacao']);
                    $this->event->set_eventTargetAudience($_POST['publicoAlvo']);
                    $this->event->set_eventLocation($_POST['local']);
                    $this->event->set_eventRoom($_POST['sala']);
                    $this->event->set_eventStart(str_replace('T', ' ', $_POST['inicio']));
                    $this->event->set_eventEnd(str_replace('T', ' ', $_POST['fim']));      
                    
                    if($this->event->create()){
                        header("Location: /sigenv/evento");
                    }
                    else{
                        echo "Something gone wrong";
                    }
                }
            }
        }
        public function showEvent($id){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){

                $events = $this->event->findById($id);

                require "app/Views/Event/show.php";
            }

        }
        public function listEvent(){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){

                $events = $this->event->findAll();

                require "app/Views/Event/list.php";
            }

        }
        public function editEvent($id){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){

                $events = $this->event->findById($id);

                require "app/Views/Event/edit.php";
            }
        }
        public function updateEvent($id){
            //
            if($_SERVER['REQUEST_METHOD'] == "POST"){

                $this->event->set_eventTitle($_POST['tema']);
                $this->event->set_eventType($_POST['tipoEvento']);
                $this->event->set_eventLocation($_POST['faculdade']);
                $this->event->set_eventTargetAudience($_POST['publicoAlvo']);
                $this->event->set_eventDescription($_POST['descricao']);
                $this->event->set_eventStart($_POST['inicio']);
                $this->event->set_eventEnd($_POST['fim']);      

                if ($this->event->update($id, $this->event)) {
                    header("Location: /sigenv/evento");
                }
            }
        }
        public function deleteEvent($id){
            //

            if ($this->event->delete($id)) {
                header("Location: /sigenv/evento");
            }
        }
    }
?>