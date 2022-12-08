<?php
    session_start();

    require "./app/user_teacher/teacher_model.php";
    require "./app/user_teacher/teacher_service.php";
    require "./app/conexion.php";

    $action = isset($_GET['action']) ? $_GET['action'] : $action;

    if($action == 'insert'){
        
        //Start validation of send photo file

        #Variables to validate photo file
        $file_profile_photo = $_FILES['profile_img'];
        $folder_profile_photos = "./public/img/profile_photos/";
        $file_name = $file_profile_photo['name'];
        $new_file_name = uniqid();
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        #Conditionals to validate photo file before send database 
        if($file_profile_photo['error']){
            header('Location: user_registration.php?insert=Error3');
        } else if($file_profile_photo['size'] > 2097152){
            header('Location: user_registration.php?insert=Error4');
        }else if($file_extension != 'jpg' && $file_extension != 'jpeg' && $file_extension != 'png'){
            header('Location: user_registration.php?insert=Error5');
        }

        $right_file = move_uploaded_file($file_profile_photo['tmp_name'], $folder_profile_photos . $new_file_name . "." . $file_extension);
        #./public/img/profile_photos/$new_file_name.$file_extension (Link do arquivo foto.)
        
        //End validation of send photo file
        
        echo '<pre>';
            print_r($_POST);
            echo '<br>';
            print_r($_FILES['profile_img']);
        echo'</pre>';
        
        /*$user = new User();
        
        $user->__set('user', $_POST['user']);

        $conexion = new Conexion();

        $userService = new UserService($conexion, $user);
        $userService->inserir();

        header('Location: login.php');*/

    }else if($action == 'login'){

        $email_user = new User();
        $conexion = new Conexion();

        $userService = new UserService($conexion, $email_user);
        $users = $userService->login();
        

        //Start validation of input value with registered in the database
        
        #Variables for authentication
        $authenticated_user = false;
        $id_user = null;
        $email_user = $_POST['email'];
        $user_password = $_POST['password']; 

        foreach($users as $user){
            if( $user->email_user == $email_user && $user->password_user == $user_password){
                $authenticated_user = true;
                $id_user = $user->id_user;
            }else{
                header('Location: login.php?login=Error');
            }
        };

        if($authenticated_user){
            $_SESSION['authenticated'] = 'Yes';
            $_SESSION['id_user'] = $id_user;
            header('Location: user_teacher.php');
        } else{
            $_SESSION['authenticated'] = 'No';
            header('Location: index.php?login=Error2');
        }

        //End validation of input value with registered in the database
    }
?>

