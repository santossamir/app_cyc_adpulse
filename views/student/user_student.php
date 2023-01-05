<?php
	session_start();

    $image_path = $_SESSION['image_path'];
    $date_registration = $_SESSION['date_registration'];

    require_once "../../access_validator.php";
    require "../../app/user_student/student_controller.php";
    $action = "login";

    include("../../language.php");
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
?>
<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../../public/css/user_student.css">
		<title>User - Student CYC</title>

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
                        <a href="profile_student.php?language=<?=$language?>"><?php echo $user_teacher[$language]['0']?></a>
                    </button>
                </div>
                <div class="look_teachers_button">
                    <button>
                        <a href="../teacher/search_teacher.php?language=<?=$language?>"><?php echo $user_teacher[$language]['8']?></a>
                    </button>
                </div> 
                <div class="profile_button">
                    <button>
                        <a href="#"><?php echo $user_teacher[$language]['1']?></a>
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
                        <a href="#"><?php echo $user_teacher[$language]['9']?></a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="about_cyc_student.php?language=<?=$language?>"><?php echo $user_teacher[$language]['5']?></a>
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
                    <div class="link_term">
                        <a href="../../faqs.php?language=<?=$language?>" target="_blank" style="margin-right: 14px;"><?php echo $link_term[$language]['0']?></a>
                        <a href="../../public/pdf/terms_and_conditions_cyc.pdf" target="_blank"><?php echo $link_term[$language]['1']?></a>
                    </div>
                </div>
            </div>
		</div> 
  	</body>
</html>