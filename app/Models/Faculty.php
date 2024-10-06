<?php
    Class Faculty{
        public $facultyID;
        public $facultyName;
        public $facultyLocation;
        public $facultyAmphNum;

        public function get_facultyID(){
            return $this->facultyID;
        }
        public function get_facultyName(){
            return $this->facultyName;
        }
        public function get_facultyLocation(){
            return $this->facultyLocation;
        }
        public function get_facultyAmphNum(){
            return $this->facultyAmphNum;
        }

        public function set_facultyID($f_id){
            $this->facultyID = $f_id;
        }
        public function set_facultyName($f_name){
            $this->facultyName = $f_name;
        }
        public function set_facultyLocation($f_location){
            $this->facultyLocation = $f_location;
        }
        public function set_facultyAmphNum($f_amphNum){
            $this->facultyAmphNum = $f_amphNum;
        }
        
        
    }
?>