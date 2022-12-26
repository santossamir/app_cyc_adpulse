<?php
    class Conexion {
        
        private $host = 'localhost';
        private $dbname = 'db_cyc';
        private $user = 'root';
        private $pass = 'root';

        public function connect(){
            try{

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