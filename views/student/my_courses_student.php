<?php
	session_start();

    require_once "../../access_validator.php";
    require "../../app/my_courses/my_courses_controller.php";
    $action = "show_my_courses";

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
		<title>User - Student CYC</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
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
                    <!--Starts to show the card with the courses -->
                    <?php 
                        foreach($courses as $course){  
                            if($student_id == $course->student_id){                       
                    ?>
                        <div class="card_teacher_box">
                            <div class="card_name">
                                <h2>
                                    <?php echo $course->mentor;?>
                                </h2>
                                <h4>
                                    <?php echo $course->first_name.' '.$course->last_name;?>
                                </h4>
                                <div class="card_name_plus">
                                    <img src="../../public/img/svg/estrela.svg">
                                    <span><?php echo $modal_teacher[$language]['2']?> </span>
                                </div>
                            </div>
                            <div class="card_button">
                                <a href="../teacher/found_teacher.php?student_id=<?=$course->student_id?>&teacher=<?=$course->first_name.$course->last_name?>&id=<?=$course->teacher_id?>&language=<?=$language?>" target="_blank">
                                    <img src="../../public/img/svg/seta-direita.svg">
                                </a>
                            </div>
                        </div>
                        <?php }}
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