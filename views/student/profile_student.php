<?php
	session_start();

    $image_path = $_SESSION['image_path'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $date_registration = $_SESSION['date_registration'];
	$age = $_SESSION['age'];
	$student_id = $_GET['id'];

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
		<link rel="stylesheet" href="../../public/css/profile_student.css">
		<title>Profile - Student CYC</title>

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
				<img src="../../public/img/png/foto-utilizador-20.png">
            </div>
            <div class="profile_img">
                <img src="<?php echo $image_path;?>">
            </div>
            <div class="customization_user">
				<div class="user_data">
					<div class="div_1">
						<div class="user_data_name">
							<h2>
								<?php
									echo $first_name." ".$last_name;
								?>
							</h2>
							<h4>
								<?php echo $age;?> <?php echo $profile_student[$language]['0']?>
							</h4>
						</div>
						<div class="user_data_plus">
							<img src="../../public/img/svg/icon-localizacao.svg">
							<span><?php echo $found_teacher[$language]['0']?>
								<?php
									echo $date_registration;
								?>
							</span>
						</div>
						<div class="user_data_plus">
							<img src="../../public/img/svg/icon-aulas.svg">
							<span><?php echo $found_teacher[$language]['1']?></span>
						</div>
						<div class="user_data_plus">
							<img src="../../public/img/svg/icon-rating.svg">
							<span><?php echo $found_teacher[$language]['2']?></span>
						</div>
					</div>
					<div class="user_qualifications">
						<div class="user_qualifications_plus">
							<img src="../../public/img/svg/icon-boa-comunicacao.svg">
							<span id="span_communication"><?php echo $found_teacher[$language]['3']?></span>    
						</div>
						<div class="user_qualifications_plus">
							<img src="../../public/img/svg/icon-empatia.svg">
							<span><?php echo $found_teacher[$language]['4']?></span>    
						</div>
						<div class="user_qualifications_plus">
							<img src="../../public/img/svg/icon-responsavel.svg">
							<span><?php echo $found_teacher[$language]['5']?></span>    
						</div>
					</div>
					<div class="topics_session">
						<div class="topics_session_plus">
							<h2><?php echo $profile_student[$language]['1']?></h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing
								elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi
								enim ad minim veniam, quis nostrud exerci tation
								ullamcorper suscipit lobortis nisl ut aliquip ex
							</p>
						</div>
						<div class="topics_session_plus">
							<h2><?php echo $profile_student[$language]['2']?></h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing
								elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi
								enim ad minim veniam, quis nostrud exerci tation
								ullamcorper suscipit lobortis nisl ut aliquip ex
							</p>
						</div>
						<div class="topics_session_plus">
							<h2><?php echo $profile_student[$language]['3']?></h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing
								elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi
								enim ad minim veniam, quis nostrud exerci tation
								ullamcorper suscipit lobortis nisl ut aliquip ex
							</p>
						</div>
						<div class="topics_session_plus">
							<h2><?php echo $profile_student[$language]['4']?></h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing
								elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi
								enim ad minim veniam, quis nostrud exerci tation
								ullamcorper suscipit lobortis nisl ut aliquip ex
							</p>
						</div>
					</div>
				</div>
				<div class="send_button">
					<button>
						<a href="student_messages.php?action=show_message_student&id=<?=$student_id?>&language=<?=$language?>"><?php echo $found_teacher[$language]['8']?></a>
					</button>
				</div>
			</div>
		</div> 
  	</body>
</html>