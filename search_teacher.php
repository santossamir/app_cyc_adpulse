<?php
	session_start();
    $action = "show_modal";
    require_once "access_validator.php";
    require "./app/user_teacher/teacher_controller.php";
    
    #Arrays with search values
    $city = array();
    $mentor = array();

    if(isset($_SESSION["city"])){
        $city = $_SESSION["city"];
     }

     if(isset($_SESSION['mentor'])){
        $mentor = $_SESSION['mentor'];
     }

    #Variables to change body style after search -> inline style on body tag
    $background = "linear-gradient(0deg, #0068379c, #8bc63f93),url('./public/img/png/background-city.jpg')";
    $background_two = "linear-gradient(0deg, #c0c0c063, #dcdcdc56),url('./public/img/png/background-city.jpg')";
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
  	<body style="background-image: <?php if($_GET['search'] == 'Return'|| $_GET['search_category'] == 'Return_category' ){echo $background_two;}else{ echo $background;}?>">
		<div class="container">
			<div class="header">
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
            </div>
            <div class="title_find_teacher">
                <h1>Encontra o teu mentor</h1>
            </div>
            <!--Start - It shows that there was an error in the search-->
            <?php
                if(isset($_GET['search']) && $_GET['search'] == 'Error'){
            ?>
                <!--Error text of search-->
            <div class="text_error">
                <strong>Nenhum resultado encontrado.</strong>
            </div>               

            <?php } 
            ?>
            <!--End - It shows that there was an error in the search-->
            <form id="form_search" method="POST" action="teacher_controller.php?action=search">
                <div class="search_teacher">
                    <input id="input_search" type="search" name="search" placeholder="Escolhe a localização" required>
                    <div class="dropdown_search">
                        <img id="dropdown" src="./public/img/svg/dropdown-pesquisa.svg">
                    </div>
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
                <div class="locator_buttons" onClick="show_modal()">
                 <button class="button_locator_one">
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
                <button id="button_locator_two" class="button_locator_two" onClick="teste()">
                    <div class="photo_locator">
                        <div class="photo_locator_number">
                            <h3>0</h3>
                        </div>
                    </div>
                </button>
                <button id="button_locator_three" class="button_locator_three" onClick="teste()">
                    <div class="photo_locator">
                        <div class="photo_locator_number">
                            <h3>0</h3>
                        </div>
                    </div>
                </button>
            </div>              

            <?php } ?>
            <!--End of search return-->

            <!--Start of search_category return-->
            <?php
                if(isset($_GET['search_category']) && $_GET['search_category'] == 'Return_category'){
            ?>
                <!--Buttons return of search-->
                <div class="locator_buttons" onClick="show_modal()">
                 <button class="button_locator_one">
                    <div class="photo_locator_category">
                        <div class="photo_locator_number">
                            <h3>
                                <?php
                                    print_r(count($mentor));
                                ?>
                            </h3>
                        </div>
                    </div>
                </button>
                <button id="button_locator_two" class="button_locator_two" onClick="show_modal()">
                    <div class="photo_locator_category">
                        <div class="photo_locator_number">
                            <h3>0</h3>
                        </div>
                    </div>
                </button>
                <button id="button_locator_three" class="button_locator_three" onClick="show_modal()">
                    <div class="photo_locator_category">
                        <div class="photo_locator_number">
                            <h3>0</h3>
                        </div>
                    </div>
                </button>
            </div>              

            <?php } ?>
            <!--End of search_category return-->
            
            <!--Start show modal-->
            <div id="modal_teacher" class="modal_teacher">
                <div class="modal_title">
                    <div class="modal_title_img">
                        <!--Image like background-->
                        <div class="modal_title_number">
                            <h3>
                                <?php
                                    isset($_GET['search'])? print_r(count($city)): print_r(count($mentor));
                                ?>
                            </h3>
                        </div>
                    </div>
                    <h1>MENTORES EM 
                        <span>
                            <?php
                                print_r($city['0'])
                            ?>
                        </span>
                    </h1>
                </div>
                <div class="card_teacher">
                    <!--Starts to show the card with teachers found -->
                    <?php 
                        #This variable passes 'id' to the page found_teacher.php
                        $teacher_id = null;

                        if($action = "show_modal"){
                            if(isset($_GET['search']) && $_GET['search'] == 'Return'){
                            foreach($researches as $found){
                                if($found->city == $city['0']){
                                    $teacher_id = $found->teacher_id;
                                    $_SESSION['teacher_id'] = $teacher_id;
                    ?>
                        <div class="card_teacher_box">
                            <div class="card_name">
                                <h2>
                                    <?php
                                        echo $found->first_name." ".$found->last_name;
                                    ?>
                                </h2>
                                <h4>Mentor de 
                                    <?php
                                        echo $found->mentor;
                                    ?>
                                </h4>
                                <div class="card_name_plus">
                                    <img src="./public/img/svg/estrela.svg">
                                    <span>4.3 de 5.0</span>
                                </div>
                            </div>
                            <div class="card_button">
                                <a href="found_teacher.php?teacher=<?=$found->first_name.$found->last_name.'-'.$teacher_id?>">
                                    <img src="./public/img/svg/seta-direita.svg">
                                </a>
                            </div>
                        </div>
                    <?php
                        }}} else if(isset($_GET['search_category']) && $_GET['search_category'] == 'Return_category'){
                            foreach($researches as $found){
                                if($found->mentor == $mentor['0']){
                                    $teacher_id = $found->teacher_id;
                                    $_SESSION['teacher_id'] = $teacher_id;
                    ?>
                        <div class="card_teacher_box">
                            <div class="card_name">
                                <h2>
                                    <?php
                                        echo $found->first_name." ".$found->last_name;
                                    ?>
                                </h2>
                                <h4>Mentor de 
                                    <?php
                                        echo $found->mentor;
                                    ?>
                                </h4>
                                <div class="card_name_plus">
                                    <img src="./public/img/svg/estrela.svg">
                                    <span>4.3 de 5.0</span>
                                </div>
                            </div>
                            <div class="card_button">
                                <a href="found_teacher.php?teacher=<?=$found->first_name.$found->last_name.'-'.$teacher_id?>">
                                    <img src="./public/img/svg/seta-direita.svg">
                                </a>
                            </div>
                        </div>
                    <?php
                        }}}}
                    ?>
                    <!--Ends to show the card with teachers found -->
                </div>
            </div>
             <!--End show modal-->
		</div> 
  	</body>
    <script src="public/js/search_teacher.js">
       
    </script>
</html>