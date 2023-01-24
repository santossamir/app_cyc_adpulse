<?php 
    session_start();

    class FileService{
        private $conexion;
        private $file_id;
        private $teacher_id;
        private $file_name;
        private $file_path;

        public function __construct(Conexion $conexion, File $file_id){
            $this->conexion = $conexion->connect();
            $this->file_id = $file_id;
        }

        public function insert_file(){
            
            $path_file = "";
            if(isset($_SESSION["path_file"])){
                $path_file = $_SESSION["path_file"];
            }

            $file_path = $path_file;
            $teacher_id = $_GET['teacher_id'];
            $file_name = $_POST['file_name'];

            $query_insert = "INSERT INTO tb_files_teacher(teacher_id, file_name, file_path) 
                            VALUES(:teacher_id, :file_name, :file_path)";

            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':teacher_id', $teacher_id);
            $stmt->bindValue(':file_name', $file_name);
            $stmt->bindValue(':file_path', $file_path);
            $stmt->execute();
        }

        public function show_file(){
            $query_consult = "select 
                                f.file_id, f.teacher_id, f.file_name, f.file_path, t.first_name, t.last_name  
                              from tb_files_teacher as f
                                left join tb_user_teacher as t on (f.teacher_id = t.teacher_id)";

            $stmt = $this->conexion->prepare($query_consult);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>