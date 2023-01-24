<?php
    session_start();

    require "teacher_files_model.php";
    require "teacher_files_service.php";
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

    $action = isset($_GET['action']) ? $_GET['action'] : $action;

    if($action == 'upload_files'){
           
        $uploaded_file = $_FILES['uploaded_file'];
        $files_folder = "../../public/teacher_files/";
        $file_name = $uploaded_file['name'];
        $new_file_name = uniqid();
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if($uploaded_file['size'] > 2097152){
            $error = "File greater than 2MB.";
        }

        if($file_extension != 'jpg' && $file_extension != 'jpeg' && $file_extension != 'png' && 
            $file_extension != 'pdf' && $file_extension != 'docx' && $file_extension != 'txt' && 
            $file_extension != 'xls' && $file_extension != 'xlsx'){
            $error = "Only files '.jpg', '.jpeg', '.png', '.pdf', '.docx', '.txt', '.xls' ou '.xlsx'. ";
        }

            #Validation input name
        $file_name = $_POST['file_name'];
        $error = '';

        if(empty($file_name)){
            $error = "File name cannot be empty.";
        }

        if(strlen($file_name) < 3 ){
            $error = "The file name must contain at least 3 characters.";
        }

        $_SESSION["erro"] = $error;
        if(!empty($error)){
            header('Location: ../../views/teacher/teacher_documents.php?upload=Error&language='.$language);
            exit;
        }

        $right_file = move_uploaded_file( $uploaded_file['tmp_name'], $files_folder . $new_file_name . "." . $file_extension);
    
        if($right_file){
            $path_file = "$files_folder$new_file_name.$file_extension";
            $_SESSION["path_file"] = $path_file;
        }else{
            $error = "The file was not loaded correctly.";
        }

        $_SESSION["erro"] = $error;
        if(!empty($error)){
            header('Location: ../../views/teacher/teacher_documents.php?upload=Error&language='.$language);
            exit;
        }

        $file_path = new File();
        $teacher_id = new File();
        $file_name = new File();

        $file_path->__set('file_path', $path_file);
        $teacher_id->__set('teacher_id', $_GET['teacher_id']);
        $file_name->__set('file_name', $_POST['file_name']);

        $conexion = new Conexion();

        $fileService = new FileService($conexion, $file_path, $teacher_id, $file_name);
        $fileService->insert_file();

        header('Location: ../../views/teacher/teacher_documents.php?action=show_file&upload=Success&language='.$language);
        
    }else if($action == 'show_file'){
        
        $file_id = new File(); 
        $conexion = new Conexion();

        $fileService = new FileService($conexion, $file_id);
        $files = $fileService->show_file();
    }
?>