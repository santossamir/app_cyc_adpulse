<?php
    session_start();

    require "student_model.php";
    require "student_service.php";
    
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
    
    if($action == 'insert'){
    
    //Start validation of form
        
        #Validation input profile_img
        $profile_img = $_FILES['profile_img'];
        $folder_profile_photos = "../../public/img/profile_photos/";
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
            header('Location: student_registration.php?insert=Error');
            exit;
        }

        #Variables of profile photos
        $right_file = move_uploaded_file($profile_img['tmp_name'], $folder_profile_photos . $new_file_name . "." . $file_extension);
        
        if($right_file){
            $path_photo = "$folder_profile_photos$new_file_name.$file_extension";
            $_SESSION["path_photo"] = $path_photo;
        }else{
            $error = "A imagem não foi carregada corretamente.";
        }

        $_SESSION["erro"] = $error;
        if(!empty($error)){
            header('Location: student_registration.php?insert=Error&language='.$language);
            exit;
        }
    //End validation of form 
        
        $image_path = new Student();
        $first_name = new Student();
        $last_name = new Student();
        $city = new Student();
        $email = new Student();
        $password = new Student();
    
        $image_path->__set('image_path', $path_photo);
        $first_name->__set('first_name', $_POST['first_name']);
        $last_name->__set('last_name', $_POST['last_name']);
        $city->__set('city', $_POST['city']);
        $email->__set('email', $_POST['email']);
        $password->__set('password', $_POST['password']);
        $age->__set('age', $_POST['age']);

        $conexion = new Conexion();

        $studentService = new StudentService($conexion, $image_path, $first_name, $last_name, $city, $email, $password, $age);
        $studentService->insert();

        header('Location: student_login.php?language='.$language);

    }else if($action == 'login'){

        $email = new Student();
        $conexion = new Conexion();

        $studentService = new StudentService($conexion, $email);
        $students = $studentService->login();

    //Start validation of input value with registered in the database
        
        #Variables for authentication
        $email = $_POST['email'];
        $password = $_POST['password'];
        $authenticated_user = false;
        $student_id = null;
        
        #Variables to receive values from the database
        $image_path = null;
        $first_name = null;
        $last_name = null;
        $city = null;
        $age = null;
        $date_registration = null;       

        foreach($students as $student){
            
            if( $student->email == $email && $student->password == $password){
                $authenticated_user = true;
                $student_id = $student->student_id;
                $image_path = $student->image_path;
                $first_name = $student->first_name;
                $last_name = $student->last_name;
                $city = $student->city;
                $date_registration = $student->date_registration;
                $age = $student->age;
            }else{
                header('Location: ../../views/student/student_login.php?login=Error&language='.$language);
            }
        };

        if($authenticated_user){

            $_SESSION['authenticated'] = 'Yes';
            $_SESSION['student_id'] = $student_id;
            $_SESSION['image_path'] = $image_path;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['city'] = $city;
            $_SESSION['date_registration'] = $date_registration;
            $_SESSION['age'] = $age;

            header('Location: user_student.php?language='.$language);
        } else{
            $_SESSION['authenticated'] = 'No';
            header('Location: ../../index.php?login=Error&language='.$language);
        }
    //End validation of input value with registered in the database
    } else if($action == 'edit_profile'){

        $student_id = $_GET['id'];
        $_SESSION['student_id'] = $student_id;
        
        $img_profile = $_FILES['profile_img'];
       
        if($img_profile['size'] != 0){
            $profile_img = $_FILES['profile_img'];
            $folder_profile_photos = "../../public/img/profile_photos/";
            $file_name = $profile_img['name'];
            $new_file_name = uniqid();
            $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            if($profile_img['size'] > 2097152){
                $error = "Imagem maior que 2MB.";
            }

            if($file_extension != 'jpg' && $file_extension != 'jpeg' && $file_extension != 'png'){
                $error = "Apenas arquivos '.jpg', '.jpeg' ou '.png'. ";
            }

            #Variables of profile photos
            $right_file = move_uploaded_file($profile_img['tmp_name'], $folder_profile_photos . $new_file_name . "." . $file_extension);
            
            if($right_file){
                $path_photo = "$folder_profile_photos$new_file_name.$file_extension";
                $_SESSION["path_photo"] = $path_photo;
            }else{
                $error = "A imagem não foi carregada corretamente.";
            }

            $_SESSION["erro"] = $error;
            if(!empty($error)){
                header('Location: ../../views/student/profile_student.php?action=show_data_profile&edit_profile=Error&id='.$student_id.'&language='.$language);
                exit;
            }
        }

        $image_path = new Student();
        $first_name = new Student();
        $last_name = new Student();
        $city = new Student();
        $email = new Student();
        $password = new Student();
        $age = new Student();
        $knowledge = new Student();
        $qualities = new Student();
        $i_like = new Student();
        $improve = new Student();
        
        if(isset($path_photo)){
            $image_path->__set('image_path', $path_photo);
        }else{
            $image_path->__set('image_path', $_POST['used_img']);
        }

        $first_name->__set('first_name', $_POST['first_name']);
        $last_name->__set('last_name', $_POST['last_name']);
        $city->__set('city', $_POST['city']);
        $email->__set('email', $_POST['email']);
        $password->__set('password', $_POST['password']);
        $age->__set('age', $_POST['age']);
        $knowledge->__set('knowledge' , $_POST['knowledge']);
        $qualities->__set('qualities' , $_POST['qualities']);
        $i_like->__set('i_like' , $_POST['i_like']);
        $improve->__set('improve' , $_POST['improve']);

        $conexion = new Conexion();

        $studentService = new StudentService($conexion, $image_path, $first_name, $last_name, $city, $email, $password, $age, $knowledge, $qualities, $i_like, $improve);
        $studentService->edit_profile();

        header('Location: ../../views/student/profile_student.php?action=show_data_profile&id='.$student_id.'&language='.$language);
    
    }else if($action == 'show_data_profile'){

        $email = new Student();
        $conexion = new Conexion();

        $studentService = new StudentService($conexion, $email);
        $students = $studentService->show_data_profile();
    } 
?>