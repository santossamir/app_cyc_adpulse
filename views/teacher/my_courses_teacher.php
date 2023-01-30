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
    }else if((isset($_GET['language']) && $_GET['language'] == "it") || !isset($_GET['language'])){
        $language = "it";
    }else if((isset($_GET['language']) && $_GET['language'] == "ro") || !isset($_GET['language'])){
        $language = "ro";
    }
?>
<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../../public/css/my_favorites.css">
		<title>User - Teacher CYC</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3VDMQVTHTC"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-3VDMQVTHTC');
        </script>
  	</head>
  	<body>
		<div class="container">
			<div class="logo_cyc">
                <div class="header_buttons">
                    <div class="come_back_button">
                        <a href="user_teacher.php?language=<?=$language?>">
							<img src="../../public/img/svg/seta-esquerda.svg">
						</a>
                    </div>
                    <div class="menu_button">
                        <a href="user_teacher.php?language=<?=$language?>">
							<img src="../../public/img/svg/menu.svg">
						</a>
                    </div>
                </div>
                <img src="../../public/img/png/logo-CYC-19.png">
            </div>
            <div class="profile_img">
                    <img src="<?php echo $image_path;?>">
            </div>
            <div style="background-color: #f7931e;"class="customization_user">
                <div class="card_teacher">
                    <div style="width:100%; margin-top:4%;">
                        <h2 style="text-align:center; font-weight: bolder; font-size:30px; color: #4d4d4d;">
                            This page is under construction.
                        </h2>
                    </div>
                </div>
                <div style="background-color: #f7931e;" class="footer_img_city">
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