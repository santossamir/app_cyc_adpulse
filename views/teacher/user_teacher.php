<?php
	session_start();

    $image_path = $_SESSION['image_path'];
    $date_registration = $_SESSION['date_registration'];
    
    require_once "../../access_validator.php";
    require "../../app/user_teacher/teacher_controller.php";
    $action = "login";

    include("../../language.php");
    $language = "";
   
    if((isset($_GET['language']) && $_GET['language'] == "pt") || !isset($_GET['language'])){
        $language = 'pt';
    }else if((isset($_GET['language']) && $_GET['language'] == "en") || !isset($_GET['language'])){
        $language = 'en';
    } else if((isset($_GET['language']) && $_GET['language'] == "es") || !isset($_GET['language'])){
        $language = 'es';
    }
?>
<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../../public/css/user_teacher.css">
		<title>User - Teacher CYC</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>
  	</head>
  	<body>
		<div class="container">
			<div class="logo_cyc">
                <img src="../../public/img/png/logo-CYC-19.png">
            </div>
            <div class="profile_img">
                    <img src="<?php echo $image_path;?>">
            </div>
            <div class="customization_user">
                <div class="profile_button">
                    <button>
                        <a href="profile_teacher.php?language=<?=$language?>"><?php echo $user_teacher[$language]['0']?></a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#"><?php echo $user_teacher[$language]['1']?></a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#"><?php echo $user_teacher[$language]['2']?></a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#"><?php echo $user_teacher[$language]['3']?></a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#"><?php echo $user_teacher[$language]['4']?></a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="about_cyc_teacher.php?language=<?=$language?>"><?php echo $user_teacher[$language]['5']?></a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#"><?php echo $user_teacher[$language]['6']?></a>
                    </button>
                </div>
                <div class="logout_button">
                    <button>
                        <a href="../../logoff.php?language=<?=$language?>"><?php echo $user_teacher[$language]['7']?></a>
                    </button>
                </div>
                <div class="footer_img_city">
                    <img src="../../public/img/svg/cidade.svg">
                </div>
            </div>
		</div> 
  	</body>
</html>