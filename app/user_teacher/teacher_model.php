<?php
    class Teacher {
        private $teacher_id;
        private $first_name;
        private $last_name;
        private $city;
        private $mentor;
        private $email;
        private $password;
        private $image_path;
        private $date_registration;
        private $about_me;
        private $teach_you;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>