<?php
    include("language.php");
    $en_select = "";
    $pt_select = "";
    $it_select = "";
    $ro_select = "";
    $language = "";

    if((isset($_GET['language']) && $_GET['language'] == "pt") || !isset($_GET['language'])){
        $pt_select = "selected";
        $language = "pt";
    }
    else if((isset($_GET['language']) && $_GET['language'] == "en") || !isset($_GET['language'])){
        $en_select = "selected";
        $language = "en";
    }else if((isset($_GET['language']) && $_GET['language'] == "it") || !isset($_GET['language'])){
        $it_select = "selected";
        $language = "it";
    }else if((isset($_GET['language']) && $_GET['language'] == "ro") || !isset($_GET['language'])){
        $ro_select = "selected";
        $language = "ro";
    }
?>
<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="public/css/index.css">
		<title>Home - Creative Youth City</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>
  	</head>
  	<body>
		<div class="container">
            <div class="select_language">
                <select onChange="set_language()" name="language" id="language">
                    <option value="pt" <?php echo $pt_select?>>PT</option>
                    <option value="en" <?php echo $en_select?>>EN</option>
                    <option value="it" <?php echo $it_select?>>IT</option>
                    <option value="ro" <?php echo $ro_select?>>RO</option>
                </select>
            </div>
			<div class="logo_cyc">
                <img src="./public/img/svg/logo-cyc.svg">
            </div>
            <div class="text_show_cyc">
                <p>
                    <?php echo $text_show_cyc[$language]['0']?>
                </p>
                <p>
                    <?php echo $text_show_cyc[$language]['1']?>
                </p>
            </div>
            <div class="question_cyc">
                <h2>
                    <?php echo $question_cyc[$language]['0']?>
                </h2>
            </div>
            <?php
                if(isset($_GET['login']) && $_GET['login'] == 'Error'){
            ?>
                <!--Error text of authentication-->
            <div class="text_error">
                <strong><?php echo $text_error[$language]['0']?></strong>
            </div>               

            <?php } ?>
            <div class="buttons">
                <div class="button_teacher">
                    <a href="views/teacher/teacher_login.php?language=<?=$language?>">
                        <button><?php echo $button_teacher[$language]['0']?></button>
                    </a>
                </div>
                <div class="button_student">
                    <a href="views/student/student_login.php?language=<?=$language?>">
                        <button><?php echo $button_student[$language]['0']?></button>
                    </a>
                </div>
            </div>
            <div class="footer_img_city">
                <img src="./public/img/svg/fundo-cidade.svg">
                <div class="link_term">
                    <a href="faqs.php?language=<?=$language?>" target="_blank" style="margin-right: 14px;"><?php echo $link_term[$language]['0']?></a>
                    <a href="./public/pdf/terms_and_conditions_cyc.pdf" target="_blank"><?php echo $link_term[$language]['1']?></a>
                </div>
            </div>
		</div> 
  	</body>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous">
    </script>
    <script src="public/js/index.js">

    </script>
</html>