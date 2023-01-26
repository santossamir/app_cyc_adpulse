<?php
	session_start();

    $image_path = $_SESSION['image_path'];
    $date_registration = $_SESSION['date_registration'];
    $teacher_id = $_SESSION['teacher_id'];
    
    require_once "../../access_validator.php";
    require "../../app/user_teacher/teacher_controller.php";
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
                <div class="buttons_of_profile">
                    <div class="profile_button">
                        <button>
                            <a href="profile_teacher.php?teacher_id=<?=$teacher_id?>&language=<?=$language?>"><?php echo $user_teacher[$language]['0']?></a>
                        </button>
                    </div>
                    <div class="profile_button">
                        <button>
                            <a href="my_courses_teacher.php?language=<?=$language?>"><?php echo $user_teacher[$language]['1']?></a>
                        </button>
                    </div>
                    <div class="profile_button">
                        <button>
                            <a href="teacher_documents.php?action=show_file&teacher_id=<?=$teacher_id?>&language=<?=$language?>" target="_blank"><?php echo $user_teacher[$language]['2']?></a>
                        </button>
                    </div>
                    <div class="profile_button">
                        <button>
                            <a href="teacher_messages.php?action=show_message_teacher&teacher_id=<?=$teacher_id?>&language=<?=$language?>"><?php echo $user_teacher[$language]['3']?></a>
                        </button>
                    </div>                 
                    <div class="profile_button">
                        <button>
                            <a href="about_cyc_teacher.php?language=<?=$language?>"><?php echo $user_teacher[$language]['5']?></a>
                        </button>
                    </div>
                    <div class="profile_button">
                        <button>
                            <a href="help_teacher.php?teacher_id=<?=$teacher_id?>&language=<?=$language?>" target="_blank"><?php echo $user_teacher[$language]['6']?></a>
                        </button>
                    </div>
                </div>
                <div class="logout_button">
                    <button>
                        <a href="../../logoff.php?language=<?=$language?>"><?php echo $user_teacher[$language]['7']?></a>
                    </button>
                </div>
                <div class="footer_img_city">
                    <div class="city_background_image"></div>
                    <!--<img src="./public/img/svg/fundo-cidade.svg">-->
                    <div class="link_term">
                        <a href="../../faqs.php?language=<?=$language?>" target="_blank" style="margin-right: 14px;"><?php echo $link_term[$language]['0']?></a>
                        <a href="../../public/pdf/terms_and_conditions_cyc.pdf" target="_blank"><?php echo $link_term[$language]['1']?></a>
                    </div>
                </div>
            </div>
		</div> 
  	</body>
</html>