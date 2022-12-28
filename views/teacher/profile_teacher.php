<?php
	session_start();
    $image_path = $_SESSION['image_path'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $mentor = $_SESSION['mentor'];
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
		<link rel="stylesheet" href="../../public/css/profile_teacher.css">
		<title>Profile - Teacher CYC</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>
  	</head>
  	<body>
		<div class="container">
			<div class="header_photo">
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
				<img src="../../public/img/png/foto-mentor-18.png">
            </div>
            <div class="profile_img">
                <img src="<?php echo $image_path;?>">
            </div>
            <div class="customization_user">
				<div class="user_data">
					<div class="user_data_name">
                        <div>
                            <h2>
								<?php
									echo $first_name." ".$last_name;
								?>
							</h2>
                            <h4><?php echo $modal_teacher[$language]['1']?> 
								<?php
								  echo $mentor
								?>
							</h4>
                        </div>
                        <div class="link_cv">
                            <a href="#">
                                <img src="../../public/img/svg/icon-CV.svg">
                            </a>
                        </div>
					</div>
					<div class="user_data_plus">
						<img src="../../public/img/svg/icon-localizacao-green.svg">
						<span><?php echo $found_teacher[$language]['0']?>
							<?php
								echo $date_registration;
							?>
						</span>
					</div>
					<div class="user_data_plus">
						<img src="../../public/img/svg/icon-aulas-green.svg">
						<span><?php echo $found_teacher[$language]['1']?></span>
					</div>
					<div class="user_data_plus">
						<img src="../../public/img/svg/estrela.svg">
						<span><?php echo $found_teacher[$language]['2']?></span>
					</div>
					<div class="user_qualifications">
						<div class="user_qualifications_plus">
							<img src="../../public/img/svg/icon-boa-comunicacao-green.svg">
							<span id="span_communication"><?php echo $found_teacher[$language]['3']?></span>    
						</div>
						<div class="user_qualifications_plus">
							<img src="../../public/img/svg/icon-empatia-green.svg">
							<span><?php echo $found_teacher[$language]['4']?></span>    
						</div>
						<div class="user_qualifications_plus">
							<img src="../../public/img/svg/icon-responsavel-green.svg">
							<span><?php echo $found_teacher[$language]['5']?></span>    
						</div>
					</div>
					<div class="topics_session">
						<div class="topics_session_plus">
							<h2><?php echo $found_teacher[$language]['6']?></h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing
								elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi
								enim ad minim veniam, quis nostrud exerci tation
								ullamcorper suscipit lobortis nisl ut aliquip ex
							</p>
						</div>
						<div class="topics_session_plus">
							<h2><?php echo $found_teacher[$language]['7']?></h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing
								elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi
								enim ad minim veniam, quis nostrud exerci tation
								ullamcorper suscipit lobortis nisl ut aliquip ex
							</p>
						</div>
					</div>
					<div class="send_button">
						<button>
							<a href="login.php"><?php echo $found_teacher[$language]['8']?></a>
						</button>
					</div>
                    <div class="add_button">
						<button>
							<a href="login.php"><?php echo $found_teacher[$language]['9']?></a>
						</button>
					</div>
				</div>
		    </div> 
        </div>
  	</body>
</html>