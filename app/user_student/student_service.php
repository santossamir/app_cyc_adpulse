<?php 
    session_start();

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
        private $age;

        public function __construct(Conexion $conexion, Student $email){
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
            $city = $_POST['city'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $age = $_POST['age'];

            $query_insert = "insert into tb_user_student(first_name, last_name,
                                city, password, image_path, email, age)
                            values(:first_name, :last_name, :city, :password, :image_path, :email, :age)";
                                
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':first_name', $first_name);
            $stmt->bindValue(':last_name', $last_name);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':image_path', $path_photo);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':age', $age);
            $stmt->execute();
        }

        public function login(){ 
            $query_consultar = "SELECT 
                                    student_id,
                                    first_name,
                                    last_name,
                                    city,
                                    email,
                                    image_path,
                                    password,
                                    age,
                                    DATE_FORMAT(date_registration, '%M de %Y') AS date_registration
                                FROM
                                    tb_user_student";
            $stmt = $this->conexion->prepare($query_consultar);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }     
    }
?>