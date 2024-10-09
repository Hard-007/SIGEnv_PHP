<?php
    namespace app\Controllers;
    use app\Models\Submission;

    class SubmissionController{
        public $submit;

        public function __construct(){
            $this->submit = new Submission();
        }

        public function createSubmission($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['tipoPart'], $_POST['tema']) && $_FILES['resumo']['error'] === UPLOAD_ERR_OK) {
                    //
                    $pdfType = $_FILES['resumo']['type']; // Lê a extensão do arquivo
                    $pdfData = file_get_contents($_FILES['resumo']['tmp_name']); // Lê o conteúdo binário do PDF
                    
                    $this->submit->setId_evento($id);
                    $this->submit->setId_user($_SESSION['id']);
                    $this->submit->setTipo($_POST['tipoPart']);
                    $this->submit->setTema($_POST['tema']);
                    $this->submit->setDocType($pdfType);
                    $this->submit->setDocData($pdfData);

                    if($this->submit->checkSubDocs() < 1){
                        $result = $this->submit->createSubmission();

                        if($result){
                            header("Location: /sigenv/evento/$id");
                        }
                        else{
                            echo "something went wrong";
                        }
                    }
                    else{
                        echo "Participacao ja submetida";
                    }
                    
                }
            }
        }
        public function listSubmission($id){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $this->submit->setId_evento($id);

                $listSubm = $this->submit->listSubmission();

                if($listSubm){
                    require "app/Views/Submission/submission.php";
                }
            }
        }
        public function showSubmission($id, $idE){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $this->submit->setId($id);
                $this->submit->setId_evento($idE);

                $evento = $this->submit->findById();
                $showSubm = $this->submit->listSubmission();

                if($showSubm){
                    require "app/Views/Submission/show.php";
                }
            }
        }

        public function accept($id, $idE){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $this->submit->setId($id);
                $this->submit->setId_evento($idE);

                $result = $this->submit->acceptSubmission();

                if($result){
                    header("Location: /sigenv/submissoes/$id/$idE");
                }

            }
        }
        public function reject($id, $idE){
            //
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $this->submit->setId($id);
                $this->submit->setId_evento($idE);

                $result = $this->submit->rejectSubmission();

                if($result){
                    header("Location: /sigenv/submissoes/$id/$idE");
                }

            }
        }
        

    }

?>