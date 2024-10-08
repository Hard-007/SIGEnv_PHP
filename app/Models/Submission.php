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
        public function setStatusSubscription($sttSubscription){
            $this->statusSubscription = $sttSubscription;
        }

        //methods

        //Inscricoes
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

        //Submissoes
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