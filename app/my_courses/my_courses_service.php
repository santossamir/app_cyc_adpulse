<?php 
    class MyCoursesService{
        private $conexion;
        private $course_id;
        private $student_id;
        private $teacher_id;

        public function __construct(Conexion $conexion, MyCourses $student_id){
            $this->conexion = $conexion->connect();
            $this->student_id = $student_id;
            $this->course_id = $course_id;
        }

        public function insert_course(){

            $student_id = $_GET['student_id'];
            $teacher_id = $_GET['teacher_id'];

            $query_insert ="INSERT INTO tb_my_courses (student_id, teacher_id)
                            VALUES (:student_id, :teacher_id)";
                                
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':student_id', $student_id);
            $stmt->bindValue(':teacher_id', $teacher_id);
           
            $stmt->execute();
        }
                
        public function show_my_courses(){ 
            $query_consultar = "select 
                                    c.course_id, c.student_id, c.teacher_id, s.student_id, t.first_name, t.last_name, t.mentor, t.city 
                                from tb_my_courses as c
                                    left join tb_user_student as s on (c.student_id = s.student_id)
                                    left join tb_user_teacher as t on (c.teacher_id = t.teacher_id)";
            $stmt = $this->conexion->prepare($query_consultar);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } 
    }   

?>