<?php 
    class StudentService{
        private $conexion;
        private $teacher_id;
        private $first_name;
        private $last_name;
        private $city;
        private $email;
        private $password;
        private $image_path;
        private $date_registration;

        public function __construct(Conexion $conexion, Student $email){
            $this->conexion = $conexion->connect();
            $this->first_name = $first_name;
            $this->email = $email;
            $this->password = $password;
        }

        public function insert(){
            $query_insert = 'insert into tb_user_student(student)values(:student)';
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':student', $this->user->__get('student'));
            $stmt->execute();
        }

        public function login(){ 
            $query_consultar = '
                select 
                   teacher_id,
                   first_name,
                   last_name,
                   email,
                   city,
                   password,
                   image_path,
                   date_registration
                from
                   tb_user_student
            ';
            $stmt = $this->conexion->prepare($query_consultar);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }     
    }
?>