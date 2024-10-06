<?php
    namespace app\config;
    
    Class Database{
        private $hostname;
        private $username;
        private $database;
        private $password;
        private $conn;

        public function __construct(){
            $this->hostname = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->database = "sigenv";
            $this->conn = null;
        }

        public function connect(){
            try{
                $this->conn = new \mysqli($this->hostname, $this->username, $this->password, $this->database);
    
                if ($this->conn->connect_error) {
                    throw new \Exception('Erro de conexão: ' . $this->conn->connect_error);
                }
            }
            catch (\Exception $e) {
                echo 'Conexão falhou: ' . $e->getMessage();
            }
    
            return $this->conn;

            // try{
            //     $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //     echo "Connected successfully";
            // }
            // catch(PDOException $e) {
            //     echo "Connection failed: " . $e->getMessage(); 
            // }
        }
    }
?>