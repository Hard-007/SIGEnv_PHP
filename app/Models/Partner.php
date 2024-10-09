<?php
    namespace app\Models;

    use app\config\Database;
    
    Class Partner{
        private $id;
        private $partnerImg;
        private $partnerImgType;
        private $partnerName;
        private $partnerField;
        private $partnerDescription;

        public $conn;
        public function __construct(){
            $this->conn= (new Database())->connect();
        }

        //getters
        public function get_id(){
            return $this->id;
        }
        public function get_partnerImg(){
            return $this->partnerImg;
        }
        public function get_partnerImgType(){
            return $this->partnerImgType;
        }
        public function get_partnerName(){
            return $this->partnerName;
        }
        public function get_partnerField(){
            return $this->partnerField;
        }
        public function get_partnerDescription(){
            return $this->partnerDescription;
        }

        //setters
        public function set_id($id){
            $this->id = $id;
        }
        public function set_partnerImg($partnerI){
            $this->partnerImg = $partnerI;
        }
        public function set_partnerImgType($partnerIType){
            $this->partnerImgType = $partnerIType;
        }
        public function set_partnerName($partnerN){
            $this->partnerName = $partnerN;
        }
        public function set_partnerField($partnerF){
            $this->partnerField = $partnerF;
        }
        public function set_partnerDescription($partnerD){
            $this->partnerDescription = $partnerD;
        }

        //methods
        public function count(){
            $stmt = $this->conn->prepare("SELECT id FROM parceiro ");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->num_rows;
        }

        public function findAll(){
            //
            $stmt = $this->conn->prepare("SELECT * FROM parceiro");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
            
        }
        public function create(){
            //
            $stmt = $this->conn->prepare(
                "INSERT INTO parceiro(imgType, imgData, nome, area, descricao) VALUES(?, ?, ?, ?, ?) "
            );
            $stmt->bind_param(
                "sssss",
                $this->partnerImgType,
                $this->partnerImg,
                $this->partnerName,
                $this->partnerField,
                $this->partnerDescription
            );
            
            return $stmt->execute();
        }
    }

?>