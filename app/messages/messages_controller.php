<?php
    session_start();

    require "messages_model.php";
    require "messages_service.php";
    require "../../app/database_conexion/conexion.php";

    #Variable for parameter studen_id
    $id_student = $_GET['id'];
    $id_teacher = $_GET['teacher_id'];
    
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

    if($action == 'insert_message_student'){
        
        $student_id = new Messages();
        $teacher_id = new Messages();
        $message = new Messages();
        
        $student_id->__set('issuer_id', $_GET['id']);
        $teacher_id->__set('receiver_id', $_GET['teacher_id']);
        $message->__set('message', $_POST['message']);
        
        $conexion = new Conexion();

        $messagesService = new MessagesService($conexion, $student_id, $teacher_id, $message);
        $messagesService->insert_message_student();

        header('Location: ../../views/student/student_messages.php?action=show_message_student&id='.$id_student.'&language='.$language);
        
    } if($action == 'insert_message_teacher'){
        
        $student_id = new Messages();
        $teacher_id = new Messages();
        $message = new Messages();
        
        $teacher_id->__set('receiver_id', $_GET['teacher_id']);
        $student_id->__set('issuer_id', $_GET['id']);
        $message->__set('message', $_POST['message']);
        
        $conexion = new Conexion();

        $messagesService = new MessagesService($conexion, $student_id, $teacher_id, $message);
        $messagesService->insert_message_teacher();

        header('Location: ../../views/teacher/teacher_messages.php?action=show_message_teacher&id='.$id_student.'&teacher_id='.$id_teacher.'&language='.$language);
        
    }else if($action == 'show_message_student'){
        
        $message_id = new Messages(); 
        $conexion = new Conexion();

        $messagesService = new MessagesService($conexion, $message_id);
        $messages = $messagesService->show_message_student();

    }else if($action == 'show_message_teacher'){
        
        $message_id = new Messages(); 
        $conexion = new Conexion();

        $messagesService = new MessagesService($conexion, $message_id);
        $messages = $messagesService->show_message_teacher();
    }
?>