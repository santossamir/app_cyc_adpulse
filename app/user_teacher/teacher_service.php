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
        private $about_me;
        private $teach_you;

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

            $query_insert = "INSERT INTO tb_user_teacher(first_name, last_name, mentor, city, password, image_path, email)
                            VALUES(:first_name, :last_name, :mentor, :city, :password, :image_path, :email)";
                                
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
            $query_consult = "SELECT teacher_id, first_name, last_name, mentor, city, email, image_path, password,
                                     about_me, teach_you,
                               DATE_FORMAT(date_registration, '%M de %Y') AS date_registration 
                               FROM tb_user_teacher";
            $stmt = $this->conexion->prepare($query_consult);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function search(){
            if(isset($_POST['search'])){
                $find = $_POST['search'];
                $query_search = "SELECT first_name, last_name, mentor, city, email, image_path, date_registration, about_me, teach_you
                                FROM  tb_user_teacher
                                WHERE city LIKE '%$find%' OR mentor LIKE '%$find%'";
                $stmt = $this->conexion->prepare($query_search);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } 
        }

        public function searchByCity($city){
            if(isset($city)){
                $query_search = "SELECT teacher_id, first_name, last_name, mentor, city, email, image_path, date_registration, about_me, teach_you
                                FROM  tb_user_teacher
                                WHERE city LIKE '%$city%'";
                $stmt = $this->conexion->prepare($query_search);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } 
        }

        public function search_category(){
            if(isset($_POST['search'])){
                $find = $_POST['search'];
                $query_search = "SELECT first_name, last_name, mentor, city, email, image_path, date_registration, about_me, teach_you
                                FROM  tb_user_teacher
                                WHERE city LIKE '%$find%' OR mentor LIKE '%$find%'";
                $stmt = $this->conexion->prepare($query_search);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } 
        }

        public function show_modal(){
            $query_consult = "SELECT teacher_id, first_name, last_name, mentor, city, email, image_path, password, about_me, teach_you,
                               DATE_FORMAT(date_registration, '%M de %Y') AS date_registration 
                               FROM tb_user_teacher";
            $stmt = $this->conexion->prepare($query_consult);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function edit_profile(){
            
            $teacher_id = "";
            if(isset($_SESSION['teacher_id'])){
                $teacher_id = $_SESSION['teacher_id'];
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
            $mentor = $_POST['mentor'];
            $about_me = $_POST['about_me'];
            $teach_you = $_POST['teach_you'];

            $query_insert ="UPDATE tb_user_teacher SET first_name =:first_name, last_name =:last_name, city =:city,
                                password =:password, image_path =:image_path, email =:email, mentor =:mentor, 
                                about_me =:about_me, teach_you =:teach_you
                            WHERE teacher_id=$teacher_id";
                                
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':first_name', $first_name);
            $stmt->bindValue(':last_name', $last_name);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':image_path', $image_path);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':mentor', $mentor);
            $stmt->bindValue(':about_me', $about_me);
            $stmt->bindValue(':teach_you', $teach_you);
            $stmt->execute();
        }

        public function show_data_profile(){ 
            $query_consult = "SELECT teacher_id, first_name, last_name, mentor, city, email, image_path, password,
                                     about_me, teach_you,
                               DATE_FORMAT(date_registration, '%M de %Y') AS date_registration 
                               FROM tb_user_teacher";
            $stmt = $this->conexion->prepare($query_consult);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>