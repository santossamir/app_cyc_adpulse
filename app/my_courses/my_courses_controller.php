<?php
    session_start();

    require "my_courses_model.php";
    require "my_courses_service.php";
    require "../../app/database_conexion/conexion.php";

    #Variable for parameter studen_id
    $id_student = $_GET['student_id'];
    
    #Variable for languages
    $language = "";
   
    if((isset($_GET['language']) && $_GET['language'] == "pt") || !isset($_GET['language'])){
        $language = 'pt';
    }else if((isset($_GET['language']) && $_GET['language'] == "en") || !isset($_GET['language'])){
        $language = 'en';
    }else if((isset($_GET['language']) && $_GET['language'] == "it") || !isset($_GET['language'])){
        $language = "it";
    }else if((isset($_GET['language']) && $_GET['language'] == "ro") || !isset($_GET['language'])){
        $language = "ro";
    }

    $action = isset($_GET['action']) ? $_GET['action'] : $action;

    if($action == 'insert_course'){
        
        $student_id = new MyCourses();
        $teacher_id = new MyCourses();
        
        $student_id->__set('student_id', $_GET['student_id']);
        $teacher_id->__set('teacher_id', $_GET['teacher_id']);
    
        $conexion = new Conexion();

        $coursesService = new MyCoursesService($conexion, $student_id, $teacher_id);
        $coursesService->insert_course();

        header('Location: ../../views/student/my_courses_student.php?action=show_my_courses&id='.$id_student.'&language='.$language);
        
    }else if($action == 'show_my_courses'){
        
        $course_id = new MyCourses(); 
        $conexion = new Conexion();

        $coursesService = new MyCoursesService($conexion, $course_id);
        $courses = $coursesService->show_my_courses();
    }
?>