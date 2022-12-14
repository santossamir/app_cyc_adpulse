<?php
    session_start();

    require "./app/user_teacher/teacher_model.php";
    require "./app/user_teacher/teacher_service.php";
    require "./app/conexion.php";

    $action = isset($_GET['action']) ? $_GET['action'] : $action;
    
    if($action == 'insert'){
    
    //Start validation of form
        
        #Validation input profile_img
        $profile_img = $_FILES['profile_img'];
        $folder_profile_photos = "./public/img/profile_photos/";
        $file_name = $profile_img['name'];
        $new_file_name = uniqid();
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        if($profile_img['size'] > 2097152){
            $error = "Imagem maior que 2MB.";
        }

        if($file_extension != 'jpg' && $file_extension != 'jpeg' && $file_extension != 'png'){
            $error = "Apenas arquivos '.jpg', '.jpeg' ou '.png'. ";
        }

        #Validation input name
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $error = '';

        if(empty($first_name) || empty($last_name)){
            $error = "Nome/Apelido não pode ser vazio.";
        }

        if(strlen($first_name) < 3 || strlen($last_name) < 3 ){
            $error = "Nome/Apelido deve conter min de 3 caracteres.";
        }
        
        #Validation input mentor
        $mentor = $_POST['mentor'];

        if(empty($mentor)){
            $error = "Mentor não pode ser vazio.";
        }

        if(strlen($mentor) < 3 ){
            $error = "Mentor deve conter min de 3 caracteres.";
        }

        #Validation input city
        $city = $_POST['city'];

        if(empty($city)){
            $error = "Concelho não pode ser vazio.";
        }

        if(strlen($city) < 3 ){
            $error = "Concelho deve conter min de 3 caracteres.";
        }

        #Validation input email
        $email = $_POST['email'];

        if(empty($email)){
            $error = "Email não pode ser vazio.";
        }

        if(strlen($email) < 8 || strstr($email, '@') == false){
            $error = "Email incorreto.";
        }

        #Validation input password
        $password = $_POST['password'];

        if(empty($password) || strlen($password) < 4){
            $error = "Palavra-chave não pode ser vazio ou min 4 caracteres.";
        }

        $_SESSION["erro"] = $error;
        if(!empty($error)){
            header('Location: teacher_registration.php?insert=Error');
            exit;
        }

        #Variables of profile photos
        $right_file = move_uploaded_file($profile_img['tmp_name'], $folder_profile_photos . $new_file_name . "." . $file_extension);
        $path_photo = "$folder_profile_photos$new_file_name.$file_extension";
        $_SESSION["path_photo"] = $path_photo;

    //End validation of form 
               
        $image_path = new Teacher();
        $first_name = new Teacher();
        $last_name = new Teacher();
        $mentor = new Teacher();
        $city = new Teacher();
        $email = new Teacher();
        $password = new Teacher();
        
        $image_path->__set('image_path', $path_photo);
        $first_name->__set('first_name', $_POST['first_name']);
        $last_name->__set('last_name', $_POST['last_name']);
        $mentor->__set('mentor', $_POST['mentor']);
        $city->__set('city', $_POST['city']);
        $email->__set('email', $_POST['email']);
        $password->__set('password', $_POST['password']);

        $conexion = new Conexion();

        $teacherService = new TeacherService($conexion, $image_path, $first_name, $last_name, $mentor, $city, $email, $password);
        $teacherService->insert();

        header('Location: teacher_login.php');

    }else if($action == 'login'){

        $email = new Teacher();
        $conexion = new Conexion();

        $teacherService = new TeacherService($conexion, $email);
        $teachers = $teacherService->login();

        //Start validation of input value with data registered in the database

        #Variables for authentication
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $authenticated_user = false;
        $teacher_id = null;
        
        #Variables to receive values from the database
        $image_path = null;
        $first_name = null;
        $last_name = null;
        $mentor = null;
        $city = null;
        $date_registration = null;

        foreach($teachers as $teacher){
            
            if( $teacher->email == $email && $teacher->password == $password){    
                $authenticated_user = true;
                $teacher_id = $teacher->teacher_id;
                $image_path = $teacher->image_path;
                $first_name = $teacher->first_name;
                $last_name = $teacher->last_name;
                $mentor = $teacher->mentor;
                $city = $teacher->city;
                $date_registration = $teacher->date_registration;

            } else {
                header('Location: teacher_login.php?login=Error');
            }
        };

        if($authenticated_user){

            $_SESSION['authenticated'] = 'Yes';
            $_SESSION['teacher_id'] = $teacher_id;
            $_SESSION['image_path'] = $image_path;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['mentor'] = $mentor;
            $_SESSION['city'] = $city;
            $_SESSION['date_registration'] = $date_registration;

            header('Location: user_teacher.php');

        } else {
            $_SESSION['authenticated'] = 'No';
            header('Location: index.php?login=Error');
        }
        //End validation of input value with data registered in the database

    } else if($action == 'search'){
        
        if($_POST['search'] != " "){
            $email = new Teacher();
            $conexion = new Conexion();

            $teacherService = new TeacherService($conexion, $email);
            $researches = $teacherService->search();

            #Arrays to receive values from the database after search
            $mentor = array();
            $city = array();

            foreach($researches as $search){
                
                array_push($mentor, $search->mentor);
                array_push($city, $search->city);
            } 
        
            if(count($mentor) <= 0 && count($city) <= 0){
                header('Location: search_teacher.php?search=Error');
            }else{
                $_SESSION['mentor'] = $mentor;
                $_SESSION['city'] = $city;
                header('Location: search_teacher.php?search=Return');
            }
        } else {
            header('Location: search_teacher.php?search=Error');
        } 
           
    } else if($action == 'search_category'){
        
        if($_POST['search'] != " "){
            $email = new Teacher();
            $conexion = new Conexion();

            $teacherService = new TeacherService($conexion, $email);
            $researches = $teacherService->search();

            #Arrays to receive values from the database after search
            $mentor = array();
            $city = array();

            foreach($researches as $search){
                
                array_push($mentor, $search->mentor);
                array_push($city, $search->city);
            } 
        
            if(count($mentor) <= 0 && count($city) <= 0){
                header('Location: search_teacher.php?search=Error');
            }else{
                $_SESSION['mentor'] = $mentor;
                $_SESSION['city'] = $city;
                header('Location: search_teacher.php?search_category=Return_category');
            }
        } else {
            header('Location: search_teacher.php?search=Error');
        } 

    } else if($action == 'show_modal'){
        $email = new Teacher();
        $conexion = new Conexion();

        $teacherService = new TeacherService($conexion, $email);
        $researches = $teacherService->show_modal();
    }
?>

