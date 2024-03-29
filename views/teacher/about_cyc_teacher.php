<?php
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
		<link rel="stylesheet" href="../../public/css/about_cyc.css">
		<title>About - Creative Youth City</title>

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
                <img src="../../public/img/svg/logo-cyc.svg">
            </div>
            <div class="question_cyc">
                <h2>
                    <?php echo $text_about_cyc[$language]['0']?>
                </h2>
            </div>
            <div class="text_show_cyc">
                <p>
                    <?php echo $text_about_cyc[$language]['1']?>
                </p>
                <br>
                <p>
                    <?php echo $text_about_cyc[$language]['2']?>
                </p>
                <br>
                <p>
                    <?php echo $text_about_cyc[$language]['3']?>
                </p>
                <br>
                <p>
                    <?php echo $text_about_cyc[$language]['4']?>
                </p>
                <br>
                <p>
                    <?php echo $text_about_cyc[$language]['5']?>
                </p>
                <br>
                <p>
                    <?php echo $text_about_cyc[$language]['6']?>
                </p>
                <br>
                <p>
                    <?php echo $text_about_cyc[$language]['7']?>
                </p>
            </div>
           
            <div class="footer_img_city" style="margin-top:0;">
                <div class="city_background_image"></div>
                <div class="link_term">
                    <a href="../../faqs.php?language=<?=$language?>" target="_blank" style="margin-right: 14px;"><?php echo $link_term[$language]['0']?></a>
                    <a href="../../public/pdf/terms_and_conditions_cyc.pdf" target="_blank"><?php echo $link_term[$language]['1']?></a>
                </div>
            </div>
		</div> 
  	</body>
</html>