<?php
    session_start();

    require "./app/user/user_model.php";
    require "./app/user/user_service.php";
    require "./app/conexion.php";

    $action = isset($_GET['action']) ? $_GET['action'] : $action;

    if($action == 'insert'){
        $user = new User();
        
        $user->__set('user', $_POST['user']);

        $conexion = new Conexion();

        $userService = new UserService($conexion, $user);
        $userService->inserir();

        header('Location: login.php');

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

