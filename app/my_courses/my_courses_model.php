<?php
    class MyCourses{
        private $course_id;
        private $student_id;
        private $teacher_id;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>