<?php
    namespace app\Models;
    use app\config\Database;

    class Submission{
        private $id;
        private $id_evento;
        private $id_user;
        private $tipo;
        private $tema;
        private $docType;
        private $docData;
        private $statusSubmission;

        
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
        public function getTipo(){
            return $this->tipo;
        }
        public function getTema(){
            return $this->tema;
        }
        public function getDocType(){
            return $this->docType;
        }
        public function getDocData(){
            return $this->docData;
        }
        public function getStatusSubmission(){
            return $this->statusSubmission;
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
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
        public function setTema($tema){
            $this->tema = $tema;
        }
        public function setDocType($dType){
            $this->docType = $dType;
        }
        public function setDocData($dData){
            $this->docData = $dData;
        }
        public function setStatusSubmission($sttSubmission){
            $this->statusSubmission = $sttSubmission;
        }

        //methods
        public function count(){
            $stmt = $this->conn->prepare("SELECT id FROM evento_submissao ");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->num_rows;
        }
        public function acceptSubmission(){
            //
            $stmt = $this->conn->prepare("UPDATE evento_submissao SET status = 'Aceite' WHERE id = ? && id_evento = ?");
            $stmt->bind_param(
                "ii",
                $this->id,
                $this->id_evento
            );

            return $stmt->execute();
        }
        public function rejectSubmission(){
            //
            $stmt = $this->conn->prepare("UPDATE evento_submissao SET status = 'Rejeitado' WHERE id = ? && id_evento = ?");
            $stmt->bind_param(
                "ii",
                $this->id,
                $this->id_evento
            );

            return $stmt->execute();
        }
        public function checkSubDocs(){
            //
            $stmt = $this->conn->prepare("SELECT * FROM evento_submissao WHERE id_evento = ? && id_user = ? && tipo = ?");
            $stmt->bind_param("iis", $this->id_evento, $this->id_user, $this->tipo);
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->num_rows;
        }
        public function createSubmission(){
            //
            $stmt = $this->conn->prepare(
                "INSERT INTO evento_submissao(id_evento, id_user, tipo, tema, docType, docData) VALUES(?, ?, ?, ?, ?, ?) "
            );
            $stmt->bind_param(
                "iissss",
                $this->id_evento,
                $this->id_user,
                $this->tipo,
                $this->tema,
                $this->docType,
                $this->docData
            );
            
            return $stmt->execute();
        }
        public function showSubmission(){
            //
            $stmt = $this->conn->prepare("SELECT sub.id, sub.id_evento, sub.tema, sub.tipo, sub.docType, sub.docData, sub.status, sub.created_at, CONCAT(u.name, ' ', u.surname) as nomecom FROM evento_submissao AS sub JOIN user AS u ON sub.id_user = u.id WHERE sub.id_evento = ? && sub.id = ?");
            $stmt->bind_param("ii", $this->id_evento, $this->id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }
        public function listSubmission(){
            //
            $stmt = $this->conn->prepare("SELECT sub.id, sub.id_evento, sub.tipo, sub.tema, sub.docType, sub.docData, sub.status, sub.created_at, CONCAT(u.name, ' ', u.surname) as nomecom FROM evento_submissao AS sub JOIN user AS u ON sub.id_user = u.id WHERE sub.id_evento = ?");
            $stmt->bind_param("i", $this->id_evento);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }

        //to find events by id to details page
        public function findById(){
            $stmt = $this->conn->prepare("SELECT * FROM evento WHERE id = ? ");
            $stmt->bind_param("i", $this->id_evento);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }

    }

?>