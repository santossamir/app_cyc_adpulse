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

            $query_insert ="INSERT INTO tb_user_student ( first_name, last_name, city, password, image_path, email, age)
                            VALUES (:first_name, :last_name, :city, :password, :image_path, :email, :age)";
                                
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
            $query_consultar = "SELECT student_id, first_name, last_name, city, email, image_path, password, age,
                                        knowledge, qualities, i_like, improve,
                                DATE_FORMAT(date_registration, '%M de %Y') AS date_registration
                                FROM tb_user_student";
            $stmt = $this->conexion->prepare($query_consultar);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } 
        
        public function edit_profile(){
            
            $student_id = "";
            if(isset($_SESSION['student_id'])){
                $student_id = $_SESSION['student_id'];
            }

            $image_path = "";
            if(isset($_SESSION['path_photo'])){
                $image_path = $_SESSION['path_photo'];
            }else{
                $image_path = $_POST['used_img'];
            }

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $city = $_POST['city'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $age = $_POST['age'];
            $knowledge = $_POST['knowledge'];
            $qualities = $_POST['qualities'];
            $i_like = $_POST['i_like'];
            $improve = $_POST['improve'];

            $query_insert ="UPDATE tb_user_student SET first_name = :first_name, last_name = :last_name, city = :city,
                                password = :password, image_path = :image_path, email = :email, age = :age, 
                                knowledge = :knowledge, qualities = :qualities, i_like = :i_like, improve = :improve
                            WHERE student_id=$student_id";
                                
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':first_name', $first_name);
            $stmt->bindValue(':last_name', $last_name);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':image_path', $image_path);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':age', $age);
            $stmt->bindValue(':knowledge', $knowledge);
            $stmt->bindValue(':qualities', $qualities);
            $stmt->bindValue(':i_like', $i_like);
            $stmt->bindValue(':improve', $improve);
            $stmt->execute();
        }

        public function show_data_profile(){ 
            $query_consultar = "SELECT student_id, first_name, last_name, city, email, image_path, password, age,
                                        knowledge, qualities, i_like, improve,
                                DATE_FORMAT(date_registration, '%M de %Y') AS date_registration
                                FROM tb_user_student";
            $stmt = $this->conexion->prepare($query_consultar);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }   
?>