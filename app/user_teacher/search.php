<?php

    session_start();

    require "teacher_model.php";
    require "teacher_service.php";
    require "../../app/database_conexion/conexion.php";

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
    

    $mentors = array();
    
    if($_GET['search'] != " "){
        $email = new Teacher();
        $conexion = new Conexion();
        
        $teacherService = new TeacherService($conexion, $email);
        $researches = $teacherService->searchByCity($_GET['search']);
        
        #Arrays to receive values from the database after search
        

        foreach($researches as $mentor){
            
            $mentors[] = array('id' => $mentor->teacher_id,  'first_name' => $mentor->first_name, 'last_name' => $mentor->last_name, 'mentor' => $mentor->mentor);
        }
    }
    echo json_encode($mentors);