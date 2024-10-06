<?php
    namespace app\Models;

    use app\config\Database;
    
    Class Speaker{
        private $id;
        private $speakerImg;
        private $speakerImgType;
        private $speakerName;
        private $speakerTitle;
        private $speakerCompany;
        private $speakerBio;

        public $conn;
        public function __construct(){
            $this->conn= (new Database())->connect();
        }

        //getters
        public function get_id(){
            return $this->id;
        }
        public function get_speakerImg(){
            return $this->speakerImg;
        }
        public function get_speakerImgType(){
            return $this->speakerImgType;
        }
        public function get_speakerName(){
            return $this->speakerName;
        }
        public function get_speakerTitle(){
            return $this->speakerTitle;
        }
        public function get_speakerCompany(){
            return $this->speakerCompany;
        }
        public function get_speakerBio(){
            return $this->speakerBio;
        }

        //setters
        public function set_id($id){
            $this->id = $id;
        }
        public function set_speakerImg($sImg){
            $this->speakerImg = $sImg;
        }
        public function set_speakerImgType($sImgType){
            $this->speakerImgType = $sImgType;
        }
        public function set_speakerName($sName){
            $this->speakerName = $sName;
        }
        public function set_speakerTitle($sTitle){
            $this->speakerTitle = $sTitle;
        }
        public function set_speakerCompany($sCompany){
            $this->speakerCompany = $sCompany;
        }
        public function set_speakerBio($sBio){
            $this->speakerBio = $sBio;
        }

        //methods
        public function findAll(){
            //
            $stmt = $this->conn->prepare("SELECT * FROM orador");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
            
        }
        public function create(){
            //
            $stmt = $this->conn->prepare(
                "INSERT INTO orador(imgType, imgData, nome, cargo, empresa, bio) VALUES(?, ?, ?, ?, ?, ?) "
            );
            $stmt->bind_param(
                "ssssss",
                $this->speakerImgType,
                $this->speakerImg,
                $this->speakerName,
                $this->speakerTitle,
                $this->speakerCompany,
                $this->speakerBio
            );
            
            return $stmt->execute();
        }
    }

?>