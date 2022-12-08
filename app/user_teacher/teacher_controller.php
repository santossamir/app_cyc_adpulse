<?php
    session_start();

    require "./app/user_teacher/teacher_model.php";
    require "./app/user_teacher/teacher_service.php";
    require "./app/conexion.php";

    $action = isset($_GET['action']) ? $_GET['action'] : $action;
    
    if($action == 'insert'){
    
    //Start validation of form
        
        #Start validation input profile_img
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

        $right_file = move_uploaded_file($profile_img['tmp_name'], $folder_profile_photos . $new_file_name . "." . $file_extension);
        $link_photo = "./public/img/profile_photos/$new_file_name.$file_extension";

        #Start validation input name
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $error = '';

        if(empty($first_name) || empty($last_name)){
            $error = "Nome/Apelido não pode ser vazio.";
        }

        if(strlen($first_name) < 3 || strlen($last_name) < 3 ){
            $error = "Nome/Apelido deve conter min de 3 caracteres.";
        }
        
        #Start validation input mentor
        $mentor = $_POST['mentor'];

        if(empty($mentor)){
            $error = "Mentor não pode ser vazio.";
        }

        if(strlen($mentor) < 3 ){
            $error = "Mentor deve conter min de 3 caracteres.";
        }

        #Start validation input city
        $city = $_POST['city'];

        if(empty($city)){
            $error = "Concelho não pode ser vazio.";
        }

        if(strlen($city) < 3 ){
            $error = "Concelho deve conter min de 3 caracteres.";
        }

        #Start validation input email
        $email = $_POST['email'];

        if(empty($email)){
            $error = "Email não pode ser vazio.";
        }

        if(strlen($email) < 8 || strstr($email, '@') == false){
            $error = "Email incorreto.";
        }

        #Start validation input password
        $password = $_POST['password'];

        if(empty($password) || strlen($password) < 4){
            $error = "Palavra-chave não pode ser vazio ou min 4 caracteres.";
        }

        #$right_file = move_uploaded_file($profile_img['tmp_name'], $folder_profile_photos . $new_file_name . "." . $file_extension);
        #./public/img/profile_photos/$new_file_name.$file_extension (Link do arquivo foto.)

        if(($_SESSION["erro"] = $error) != ""){
            header('Location: teacher_registration.php?insert=Error');
        }
        
        
    //End validation of form 
        
        echo '<pre>';
            print_r($_POST);
            echo '<br>';
            print_r($_FILES['profile_img']);
            echo $link_photo;
        echo'</pre>';
        
        /*$user = new User();
        
        $user->__set('user', $_POST['user']);

        $conexion = new Conexion();

        $userService = new UserService($conexion, $user);
        $userService->inserir();

        header('Location: login.php');*/

    }else if($action == 'login'){

        $email = new Teacher();
        $conexion = new Conexion();

        $userService = new TeacherService($conexion, $email);
        $teachers = $teacherService->login();
        

        //Start validation of input value with registered in the database
        
        #Variables for authentication
        $authenticated_user = false;
        $id_user = null;
        $email = $_POST['email'];
        $password = $_POST['password']; 

        foreach($teachers as $teacher){
            if( $teacher->email == $email && $teacher->password == $password){
                $authenticated_user = true;
                $id_user = $teacher->id_user;
            }else{
                header('Location: teacher_login.php?login=Error');
            }
        };

        if($authenticated_user){
            $_SESSION['authenticated'] = 'Yes';
            $_SESSION['id_user'] = $id_user;
            header('Location: user_teacher.php');
        } else{
            $_SESSION['authenticated'] = 'No';
            header('Location: index.php?login=Error');
        }

        //End validation of input value with registered in the database
    }
?>

