<?php
    session_start();

    require "my_favorites_model.php";
    require "my_favorites_service.php";
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

    if($action == 'insert_favorite'){
        
        $student_id = new MyFavorites();
        $teacher_id = new MyFavorites();
        
        $student_id->__set('student_id', $_GET['student_id']);
        $teacher_id->__set('teacher_id', $_GET['teacher_id']);
    
        $conexion = new Conexion();

        $favoritesService = new MyFavoritesService($conexion, $student_id, $teacher_id);
        $favoritesService->insert_favorite();

        header('Location: ../../views/student/my_favorites_student.php?action=show_my_favorites&id='.$id_student.'&language='.$language);
        
    }else if($action == 'show_my_favorites'){
        
        $favorite_id = new MyFavorites(); 
        $conexion = new Conexion();

        $favoritesService = new MyFavoritesService($conexion, $favorite_id);
        $favorites = $favoritesService->show_my_favorites();
    }
?>