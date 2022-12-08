<?php
	require_once "access_validator.php";
?>
<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="public/css/user_student.css">
		<title>User - Student CYC</title>

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
                <img src="./public/img/svg/icon-feminino.svg">
            </div>
            <div class="customization_user">
                <div class="profile_button">
                    <button>
                        <a href="profile_student.php">O meu perfil</a>
                    </button>
                </div>
                <div class="look_teachers_button">
                    <button>
                        <a href="search_teacher.php">Procurar mentores</a>
                    </button>
                </div> 
                <div class="profile_button">
                    <button>
                        <a href="#">Os meus cursos</a>
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
                        <a href="#">Convidar um amigo</a>
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
                        <a href="login.php">Logout</a>
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