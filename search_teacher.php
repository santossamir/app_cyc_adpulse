<?php
	session_start();

    $city = $_SESSION['city'];
    $mentor = $_SESSION['mentor'];
    
    require_once "access_validator.php";
    require "./app/user_teacher/teacher_controller.php";
    $action = "search";
?>
<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="public/css/search_teacher.css">
		<title>Search - Teacher CYC</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
        </style>
  	</head>
  	<body>
		<div class="container">
			<div class="header">
                <div class="header_buttons">
                    <div class="come_back_button">
                        <a href="profile_student.php">    
                            <img src="./public/img/svg/seta-esquerda.svg">
                        </a>                    
                    </div>
                    <div class="menu_button">
                        <a href="user_student.php">
                        <img src="./public/img/svg/menu.svg">
                        </a>
                    </div>
                </div>
            </div>
            <div class="title_find_teacher">
                <h1>Encontra o teu mentor</h1>
            </div>
            <?php
                if(isset($_GET['search']) && $_GET['search'] == 'Error'){
            ?>
                <!--Error text of search-->
            <div class="text_error">
                <strong>Nenhum resultado encontrado.</strong>
            </div>               

            <?php } ?>
            <form method="POST" action="teacher_controller.php?action=search">
                <div class="search_teacher">
                    <input id="input_search" typpe="search" name="search" placeholder="Escolhe a localização">
                    <div class="dropdown_search">
                        <img id="dropdown" src="./public/img/svg/dropdown-pesquisa.svg">
                    </div>
                    <!--onClick="find_teacher()"-->
                    <button class="icon_search">
                        <img src="./public/img/svg/icon-search.svg">
                    </button>
                </div>
            </form>
            <div class="search_button">
                <button id="btn_category" class="btn" onClick="category()">Categoria</button>
                <button id="btn_localization" class="btn active" onClick="localization()">Localização</button>                     
            </div>
            <!--Start of search return-->
            <?php
                if(isset($_GET['search']) && $_GET['search'] == 'Return'){
            ?>
                <!--Buttons return of search-->
                <div class="locator_buttons">
                 <button class="button_locator_one" onClick="teste()">
                    <div class="photo_locator">
                        <div class="photo_locator_number">
                            <h3>
                                <?php
                                    print_r(count($city));
                                ?>
                            </h3>
                        </div>
                    </div>
                </button>
                <button class="button_locator_two" onClick="teste()">
                    <div class="photo_locator">
                        <div class="photo_locator_number">
                            <h3>0</h3>
                        </div>
                    </div>
                </button>
                <button class="button_locator_three" onClick="teste()">
                    <div class="photo_locator">
                        <div class="photo_locator_number">
                            <h3>0</h3>
                        </div>
                    </div>
                </button>
            </div>              

            <?php } ?>
            <!--End of search return-->

            <div class="modal_teacher">
                <div class="modal_title">
                    <div class="modal_title_img">
                        <!--Image like background-->
                        <div class="modal_title_number">
                            <h3>6</h3>
                        </div>
                    </div>
                    <h1>MENTORES EM <span>LISBOA</span></h1>
                </div>
                <div class="card_teacher">
                    <div class="card_teacher_box">
                        <div class="card_name">
                            <h2>José Mourão</h2>
						    <h4>Mentor de Guitarra</h4>
                            <div class="card_name_plus">
                                <img src="./public/img/svg/estrela.svg">
                                <span>4.3 de 5.0</span>
                            </div>
                        </div>
                        <div class="card_button">
                            <a href="profile_teacher.php">
                                <img src="./public/img/svg/seta-direita.svg">
                            </a>
                        </div>
                    </div>
                    <div class="card_teacher_box">
                        <div class="card_name">
                            <h2>João Maria</h2>
						    <h4>Mentor de Literatura</h4>
                            <div class="card_name_plus">
                                <img src="./public/img/svg/estrela.svg">
                                <span>4.3 de 5.0</span>
                            </div>
                        </div>
                        <div class="card_button">
                            <a href="profile_teacher.php">
                                <img src="./public/img/svg/seta-direita.svg">
                            </a>
                        </div>
                    </div>
                    <div class="card_teacher_box">
                        <div class="card_name">
                            <h2>Antonia Resende</h2>
						    <h4>Mentora de Artes manuais</h4>
                            <div class="card_name_plus">
                                <img src="./public/img/svg/estrela.svg">
                                <span>4.3 de 5.0</span>
                            </div>
                        </div>
                        <div class="card_button">
                            <a href="profile_teacher.php">
                                <img src="./public/img/svg/seta-direita.svg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
		</div> 
  	</body>
    <script src="public/js/search_teacher.js">
       
    </script>
</html>