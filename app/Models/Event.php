<?php
    namespace app\Models;

    use app\config\Database;
    
    Class Event{
        private $eventID;
        private $eventBanner;
        private $eventBannerType;
        private $eventTitle;
        private $eventType;
        private $eventShort;
        private $eventDescription;
        private $eventLimit;
        private $eventTargetAudience;
        private $eventLocation;
        private $eventRoom;  
        private $eventStart;
        private $eventEnd;

        public $conn;

        public function __construct(){
            $this->conn = (new Database())->connect(); 
        }

        //getters
        public function get_eventID(){
            return $this->eventID;
        }
        public function get_eventBanner(){
            return $this->eventBanner;
        }
        public function get_eventBannerType(){
            return $this->eventBannerType;
        }
        public function get_eventTitle(){
            return $this->eventTitle;
        }
        public function get_eventLocation(){
            return $this->eventLocation;
        }
        public function get_eventRoom(){
            return $this->eventRoom;
        }
        public function get_eventStart(){
            return $this->eventStart;
        }
        public function get_eventEnd(){
            return $this->eventEnd;
        }
        public function get_eventType(){
            return $this->eventType;
        }
        public function get_eventDescription(){
            return $this->eventDescription;
        }
        public function get_eventTargetAudience(){
            return $this->eventTargetAudience;
        }
        public function get_eventShort(){
            return $this->eventShort;
        }
        public function get_eventLimit(){
            return $this->eventLimit;
        }

        //setters
        public function set_eventID($e_ID){
            $this->eventID = $e_ID;
        }
        public function set_eventBanner($eventB){
            $this->eventBanner = $eventB;
        }
        public function set_eventBannerType($eventBType){
            $this->eventBannerType = $eventBType;
        }
        public function set_eventTitle($e_Title){
            $this->eventTitle = $e_Title;
        }
        public function set_eventLocation($e_Faculty){
            $this->eventLocation = $e_Faculty;
        }
        public function set_eventRoom($e_Room){
            $this->eventRoom = $e_Room;
        }
        public function set_eventStart($e_Start){
            $this->eventStart = $e_Start;
        }
        public function set_eventEnd($eventEnd){
            $this->eventEnd = $eventEnd;
        }
        public function set_eventType($eventType){
            $this->eventType = $eventType;
        }
        public function set_eventDescription($eventDescription){
            $this->eventDescription = $eventDescription;
        }
        public function set_eventTargetAudience($eventTargetAudience){
            $this->eventTargetAudience = $eventTargetAudience;
        }
        public function set_eventShort($evenS){
            $this->eventShort = $evenS;
        }
        public function set_eventLimit($evenL){
            $this->eventLimit = $evenL;
        }

        //methods
        public function dash(){
            $stmt = $this->conn->prepare("SELECT (SELECT COUNT(*) FROM evento) as evento, (SELECT COUNT(*) FROM evento_inscricao WHERE id_user=?) as inscritos ");
            $stmt->bind_param("i", $_SESSION['id']);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }
        public function create(){
            // 
            $stmt = $this->conn->prepare(
                "INSERT INTO evento(bannerType, banner, tema, tipo, resumo, descricao, audiencia, lotacao, sala, local, inicio, fim) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) "
            );
            $stmt->bind_param(
                "ssssssssssss",
                $this->eventBannerType,
                $this->eventBanner,
                $this->eventTitle,
                $this->eventType,
                $this->eventShort,
                $this->eventDescription,
                $this->eventTargetAudience,
                $this->eventLimit,
                $this->eventRoom,
                $this->eventLocation,
                $this->eventStart,
                $this->eventEnd
            );
            //$rtn = $stmt->execute();
            //$id = $stmt->insert_id; //last inserted id

            return $stmt->execute();
        }
        public function findAll(){
            //
            $stmt = $this->conn->prepare("SELECT * FROM evento");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
            
        }
        public function findById($id){
            $stmt = $this->conn->prepare("SELECT * FROM evento WHERE id = ? ");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }
        public function findByOradorId($id){
            $stmt = $this->conn->prepare("SELECT * FROM orador WHERE id = ? ");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }

        public function update($id, $event){
            // 
            $event_title = $event->get_eventTitle();
            $event_type = $event->get_eventType();
            $event_faculty = $event->get_eventFaculty();
            $event_targetAudience = $event->get_eventTargetAudience();
            $event_description = $event->get_eventDescription();
            $event_date = $event->get_eventDate();
            $event_time = $event->get_eventTime();

            $stmt = $this->conn->prepare(
                "UPDATE evento SET tema=?, tipo=?, faculdade=?, audiencia=?, descricao=?, inicio=?, fim=? WHERE id=? "
            );
            $stmt->bind_param(
                "sssssssi",
                $event_title,
                $event_type,
                $event_faculty,
                $event_targetAudience,
                $event_description,
                $event_date,
                $event_time,
                $id
            );
            
            return $stmt->execute();
        }
        public function delete($id){
            // 
            $stmt = $this->conn->prepare("DELETE FROM evento WHERE id=?");
            $stmt->bind_param("i", $id);
            
            return $stmt->execute();
        }
    }
?>