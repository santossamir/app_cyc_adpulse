<?php
    class User {
        private $id_user;
        private $name_user;
        private $email_user;
        private $password_user;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>