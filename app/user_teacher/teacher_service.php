<?php 
    class TeacherService{
        private $conexion;
        private $teacher_id;
        private $first_name;
        private $last_name;
        private $city;
        private $mentor;
        private $email;
        private $password;
        private $image_path;
        private $date_registration;

        public function __construct(Conexion $conexion, Teacher $email){
            $this->conexion = $conexion->connect();
            $this->first_name = $first_name;
            $this->email = $email;
            $this->password = $password;
        }

        public function insert(){
            $query_insert = 'insert into tb_user_teacher(teacher)values(:teacher)';
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':teacher', $this->user->__get('teacher'));
            $stmt->execute();
        }

        public function login(){ 
            $query_consultar = '
                select 
                   teacher_id,
                   first_name,
                   last_name,
                   email,
                   mentor,
                   city,
                   password,
                   image_path,
                   date_registration
                from
                   tb_user_teacher
            ';
            $stmt = $this->conexion->prepare($query_consultar);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }     
    }
?>