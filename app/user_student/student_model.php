<?php
    class Student {
        private $teacher_id;
        private $first_name;
        private $last_name;
        private $city;
        private $email;
        private $password;
        private $image_path;
        private $date_registration;
        private $age;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>