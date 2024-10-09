<?php
    namespace app\Models;
    use app\config\Database;

    class Subscription{
        private $id;
        private $id_evento;
        private $id_user;
        private $statusSubscription;


        public $conn;
        public function __construct(){
            $this->conn = (new Database())->connect();
        }

        //getters
        public function getId(){
            return $this->id;
        }
        public function getId_evento(){
            return $this->id_evento;
        }
        public function getId_user(){
            return $this->id_user;
        }
        public function getStatusSubscription(){
            return $this->statusSubscription;
        }

        //setters
        public function setId($id){
            $this->id = $id;
        }
        public function setId_evento($idE){
            $this->id_evento = $idE;
        }
        public function setId_user($idU){
            $this->id_user = $idU;
        }
        public function setStatusSubscription($sttSubscription){
            $this->statusSubscription = $sttSubscription;
        }

        //methods
        public function count(){
            $stmt = $this->conn->prepare("SELECT id FROM evento_inscricao ");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->num_rows;
        }
        public function checkSubscription(){
            //
            $stmt = $this->conn->prepare("UPDATE evento_inscricao SET status = 'Checked' WHERE id = ? && id_evento = ?");
            $stmt->bind_param(
                "ii",
                $this->id,
                $this->id_evento
            );

            return $stmt->execute();
        }
        public function uncheckSubscription(){
            //
            $stmt = $this->conn->prepare("UPDATE evento_inscricao SET status = 'Unchecked' WHERE id = ? && id_evento = ?");
            $stmt->bind_param(
                "ii",
                $this->id,
                $this->id_evento
            );

            return $stmt->execute();
        }
        public function checkSub(){
            //
            $stmt = $this->conn->prepare("SELECT * FROM evento_inscricao WHERE id_evento = ? && id_user = ?");
            $stmt->bind_param("ii", $this->id_evento, $this->id_user);
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->num_rows;
        }
        public function createSubscription(){
            //
            $stmt = $this->conn->prepare(
                "INSERT INTO evento_inscricao(id_evento, id_user) VALUES(?, ?) "
            );
            $stmt->bind_param(
                "ii",
                $this->id_evento,
                $this->id_user
            );
            
            return $stmt->execute();
        }
        public function mySubscription(){
            //
            $stmt = $this->conn->prepare("SELECT * FROM evento WHERE id IN (SELECT id_evento FROM evento_inscricao WHERE id_user = ?)");
            $stmt->bind_param("i", $this->id_user);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }
        public function listSubscription(){
            //
            $stmt = $this->conn->prepare("SELECT subp.id, subp.id_evento, subp.status, subp.created_at, CONCAT(u.name, ' ', u.surname) as nomecom, u.email FROM evento_inscricao AS subp JOIN user AS u ON subp.id_user = u.id WHERE subP.id_evento = ?");
            $stmt->bind_param("i", $this->id_evento);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }
    }

?>