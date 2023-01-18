<?php
	session_start();

    require_once "../../access_validator.php";
    require "../../app/user_teacher/teacher_controller.php";
    $action="show_modal";


    $image_path = $_SESSION['image_path'];
    $date_registration = $_SESSION['date_registration'];
    $student_id = $_SESSION['student_id'];

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
		<link rel="stylesheet" href="../../public/css/my_courses.css">
		<title>My Friends - Student CYC</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
            .card_name{
                width:50%;
            }
        </style>
  	</head>
  	<body>
		<div class="container">
			<div class="logo_cyc">
                <div class="header_buttons">
                    <div class="come_back_button">
                        <a href="user_student.php?language=<?=$language?>">
							<img src="../../public/img/svg/seta-esquerda.svg">
						</a>
                    </div>
                    <div class="menu_button">
                        <a href="user_student.php?language=<?=$language?>">
							<img src="../../public/img/svg/menu.svg">
						</a>
                    </div>
                </div>
                <img src="../../public/img/png/logo-CYC-19.png">
            </div>
            <div class="profile_img">
                <img src="<?php echo $image_path;?>">
            </div>
            <div class="customization_user">
                <div class="card_teacher">
                    <?php
                        foreach($researches as $teacher){
                    ?>
                        <div class="card_teacher_box">
                            <div>
                                <img style="width:70px; border-radius:50%;"src="<?=$teacher->image_path?>">
                            </div>
                            <div class="card_name">
                                <h2>
                                    <?=$teacher->first_name." ".$teacher->last_name;?>
                                </h2>
                                <h4>
                                    <?=$teacher->mentor;?>
                                </h4>
                            </div>
                            <div class="card_button">
                                <a href="student_messages.php?action=show_message_student&id=<?=$student_id?>&teacher_id=<?=$teacher->teacher_id?>&teacher_name=<?=$teacher->first_name?>&teacher_apelido=<?=$teacher->last_name?>&language=<?=$language?>">
                                    <img src="../../public/img/svg/seta-direita.svg">
                                </a>
                            </div>
                        </div>
                    <?php }
                    ?>
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