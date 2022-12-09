<?php 
    session_start();

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
            $this->email = $email;
            $this->password = $password;
        }
        
        public function insert(){
            $path_photo = "";
            if(isset($_SESSION["path_photo"])){
                $path_photo = $_SESSION["path_photo"];
            }

            $image_path = $path_photo;
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $mentor = $_POST['mentor'];
            $city = $_POST['city'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query_insert = "insert into tb_user_teacher(first_name, last_name, mentor,
                                city, password, image_path, email)
                            values(:first_name, :last_name, :mentor, :city, :password,
                                :image_path, :email)";
                                
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':first_name', $first_name);
            $stmt->bindValue(':last_name', $last_name);
            $stmt->bindValue(':mentor', $mentor);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':image_path', $path_photo);
            $stmt->bindValue(':email', $email);
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