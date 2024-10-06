<?php
    namespace app\Models;
    
    use app\config\Database;

    Class User{
        private $uID;
        private $uName;
        private $uSurname;
        private $uEmail;
        private $uPasswd;
        private $uCategory;
        
        public $conn;

        public function __construct(){
            $this->conn = (new Database())->connect();
        }

        //getters
        public function get_uID(){
            return $this->uID;
        }
        public function get_uName(){
            return $this->uName;
        }
        public function get_uSurname(){
            return $this->uSurname;
        }
        public function get_uEmail(){
            return $this->uEmail;
        }
        public function get_uPasswd(){
            return $this->uPasswd;
        }
        public function get_uCategory(){
            return $this->uCategory;
        }

        //setters
        public function set_uID($u_ID){
            $this->uID = $u_ID;
        }
        public function set_uName($u_name){
            $this->uName = $u_name;
        }
        public function set_uSurname($u_surname){
            $this->uSurname = $u_surname;
        }
        public function set_uEmail($u_email){
            $this->uEmail = $u_email;
        }
        public function set_uPasswd($u_passwd){
            $this->uPasswd = $u_passwd;
        }
        public function set_uCategory($u_category){
            $this->uCategory = $u_category;
        }

        //methods
        public function create($user){
            //
            $user_name = $user->get_uName();
            $user_surname = $user->get_uSurname();
            $user_email = $user->get_uEmail();
            $user_password = $user->get_uPasswd();
            
            //add sanitize()
            //$passwordHash = password_hash($password, PASSWORD_BCRYPT);
            
            $stmt = $this->conn->prepare("INSERT INTO user(name, surname, category, email, password) VALUES(?, ?, 'Estudante', ?, ?)");
            $stmt->bind_param("ssss", $user_name, $user_surname, $user_email, $user_password);
            return $stmt->execute();
            
        }

        public function findAll(){

        }

        public function auth($user){
            //
            $usermail = $user->get_uEmail();
            $userpass = $user->get_uPasswd();

            $stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->bind_param("s", $usermail);
            $stmt->execute();
            $result = $stmt->get_result();

            $usr = $result->fetch_assoc();

            // if($usr && password_verify($userpass, $usr['password'])) {
            //     return $usr;
            // }
            if($usr && $userpass == $usr['password']) {
                return $usr;
            }
            return false;
        }

        public function exists($user){
            //
            $usermail = $user->get_uEmail();

            $stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->bind_param("s", $usermail);
            $stmt->execute();
            $result = $stmt->get_result();
        
            return $result->num_rows > 0;
        }

        public function update(){

        }
        public function delete(){

        }
    }
?>