<?php
    class Conexion {
        
        private $host = '';
        private $dbname = '';
        private $user = '';
        private $pass = '';

        public function connect(){

            try{

                $localserver = array('127.0.0.1', "::1");

                if(in_array($_SERVER['REMOTE_ADDR'], $localserver)){
                    $this->host = 'localhost';
                    $this->dbname = 'db_cyc';
                    $this->user = 'root';
                    $this->pass = 'root';
                } else {
                    $this->host = '185.240.248.75';
                    $this->dbname = 'adpulsec_cyc';
                    $this->user = 'adpulsec_cyc';
                    $this->pass = '8XG-qO88hhqV';
                }

                $conexion = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                return $conexion;

            } catch(PDOException $e){
               echo '<p>' .$e->getMessage(). '</p>'; 
            }
        }
    }
?>