<?php
    class File {
        private $conexion;
        private $file_id;
        private $teacher_id;
        private $file_name;
        private $file_path;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>