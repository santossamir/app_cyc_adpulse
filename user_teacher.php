<?php
	session_start();

    $image_path = $_SESSION['image_path'];
    $date_registration = $_SESSION['date_registration'];
    
    require_once "access_validator.php";
    require "./app/user_teacher/teacher_controller.php";
    $action = "login";
?>
<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="public/css/user_teacher.css">
		<title>User - Teacher CYC</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>
  	</head>
  	<body>
		<div class="container">
			<div class="logo_cyc">
                <img src="./public/img/png/logo-CYC-19.png">
            </div>
            <div class="profile_img">
                    <img src="<?php echo $image_path;?>">
            </div>
            <div class="customization_user">
                <div class="profile_button">
                    <button>
                        <a href="profile_teacher.php">O meu perfil</a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#">Os meus cursos</a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#">Documentos</a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#">Mensagens</a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#">Favoritos</a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#">Sobre a CYC</a>
                    </button>
                </div>
                <div class="profile_button">
                    <button>
                        <a href="#">Ajuda</a>
                    </button>
                </div>
                <div class="logout_button">
                    <button>
                        <a href="logoff.php">Logout</a>
                    </button>
                </div>
                <div class="footer_img_city">
                    <img src="./public/img/svg/cidade.svg">
                </div>
            </div>
		</div> 
  	</body>
  	<script src="public/js/index.js">
		
	</script>
</html>