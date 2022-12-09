<?php
	session_start();

    $image_path = $_SESSION['image_path'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $date_registration = $_SESSION['date_registration'];

    require_once "access_validator.php";
    require "./app/user_teacher/teacher_controller.php";
    $action = "login";
?>
<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="public/css/profile_student.css">
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
                        <a href="user_student.php">
							<img src="./public/img/svg/seta-esquerda.svg">
						</a>
                    </div>
                    <div class="menu_button">
                        <a href="user_student.php">
							<img src="./public/img/svg/menu.svg">
						</a>
                    </div>
                </div>
				<img src="./public/img/png/foto-utilizador-20.png">
            </div>
            <div class="profile_img">
                <img src="<?php echo $image_path;?>">
            </div>
            <div class="customization_user">
				<div class="user_data">
					<div class="user_data_name">
						<h2>
							<?php
								echo $first_name." ".$last_name;
							?>
						</h2>
						<h4>18 anos</h4>
					</div>
					<div class="user_data_plus">
						<img src="./public/img/svg/icon-localizacao.svg">
						<span>Na cidade desde
							<?php
								echo $date_registration;
							?>
						</span>
					</div>
					<div class="user_data_plus">
						<img src="./public/img/svg/icon-aulas.svg">
						<span>Participou em 30 aulas</span>
					</div>
					<div class="user_data_plus">
						<img src="./public/img/svg/icon-rating.svg">
						<span>4.3 de 5.0</span>
					</div>
					<div class="user_qualifications">
						<div class="user_qualifications_plus">
							<img src="./public/img/svg/icon-boa-comunicacao.svg">
							<span id="span_communication">Boa comunicação</span>    
						</div>
						<div class="user_qualifications_plus">
							<img src="./public/img/svg/icon-empatia.svg">
							<span>Empatia</span>    
						</div>
						<div class="user_qualifications_plus">
							<img src="./public/img/svg/icon-responsavel.svg">
							<span>Responsável</span>    
						</div>
					</div>
					<div class="topics_session">
						<div class="topics_session_plus">
							<h2>Conhecimento</h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing
								elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi
								enim ad minim veniam, quis nostrud exerci tation
								ullamcorper suscipit lobortis nisl ut aliquip ex
							</p>
						</div>
						<div class="topics_session_plus">
							<h2>Qualidades</h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing
								elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi
								enim ad minim veniam, quis nostrud exerci tation
								ullamcorper suscipit lobortis nisl ut aliquip ex
							</p>
						</div>
						<div class="topics_session_plus">
							<h2>O que é que eu gosto?</h2>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing
								elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi
								enim ad minim veniam, quis nostrud exerci tation
								ullamcorper suscipit lobortis nisl ut aliquip ex
							</p>
						</div>
						<div class="topics_session_plus">
							<h2>A melhorar</h2>
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
							<a href="login.php">Enviar mensagem</a>
						</button>
					</div>
				</div>
		</div> 
  	</body>
</html>