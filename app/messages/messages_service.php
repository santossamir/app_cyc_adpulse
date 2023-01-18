<?php 
    class MessagesService{
        private $conexion;
        private $message_id;
        private $issuer_id;
        private $receiver_id;
        private $message;

        public function __construct(Conexion $conexion, Messages $message_id){
            $this->conexion = $conexion->connect();
            $this->message_id = $message_id;
        }

        public function insert_message_student(){

            $student_id = $_GET['id'];
            $teacher_id = $_GET['teacher_id'];
            $message =  $_POST['message'];

            $query_insert ="INSERT INTO tb_messages (issuer_id, receiver_id, message)
                            VALUES (:student_id, :teacher_id, :message)";
                                
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':student_id', $student_id);
            $stmt->bindValue(':teacher_id', $teacher_id);
            $stmt->bindValue(':message', $message);
            $stmt->execute();
        }

        public function insert_message_teacher(){

            $student_id = $_GET['id'];
            $teacher_id = $_GET['teacher_id'];
            $message =  $_POST['message'];

            $query_insert ="INSERT INTO tb_messages (issuer_id, receiver_id, message)
                            VALUES (:student_id, :teacher_id, :message)";
                                
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':student_id', $student_id);
            $stmt->bindValue(':teacher_id', $teacher_id);
            $stmt->bindValue(':message', $message);
            $stmt->execute();
        }
                
        public function show_message_student(){ 
            $query_consultar = "select 
                                    c.message_id, c.issuer_id, c.receiver_id, c.message, c.date_registration, s.student_id, t.first_name, t.last_name, t.mentor 
                                from tb_messages as c
                                    left join tb_user_student as s on (c.issuer_id = s.student_id)
                                    left join tb_user_teacher as t on (c.receiver_id = t.teacher_id)";
            $stmt = $this->conexion->prepare($query_consultar);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } 

        public function show_message_teacher(){ 
            $query_consultar = "select 
                                    c.message_id, c.issuer_id, c.receiver_id, c.message, c.date_registration, s.student_id, s.first_name, s.last_name, t.mentor 
                                from tb_messages as c
                                    left join tb_user_student as s on (c.issuer_id = s.student_id)
                                    left join tb_user_teacher as t on (c.receiver_id = t.teacher_id)";
            $stmt = $this->conexion->prepare($query_consultar);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } 
    }   

?>