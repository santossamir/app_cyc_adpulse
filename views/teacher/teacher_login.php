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
		<link rel="stylesheet" href="../../public/css/login.css">
		<title>Login - Creative Youth City</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>
  	</head>
  	<body>
		<div class="container">
            <div class="form">
                <form id="form_login" method="POST" action="teacher_controller.php?action=login&language=<?=$language?>" onSubmit="handleSubmitForm(event)">
                    
                    <!--Start of error text-->
                    <?php
                        if(isset($_GET['login']) && $_GET['login'] == 'Error'){
                    ?>
                    <!--Error text of login-->
                    <div class="text_error">
                        <strong><?php echo $text_error[$language]['1']?></strong>
                    </div>               

                    <?php } ?> 

                    <?php
                        if(isset($_GET['login']) && $_GET['login'] == 'Error2'){
                    ?>
                     <!--Error text of authentication-->
                    <div class="text_error">
                        <strong><?php echo $text_error[$language]['0']?></strong>
                    </div>               

                    <?php } ?>
                    <!--End error text-->

                    <label><?php echo $email[$language]['0']?></label>
                    <div class="email">
                        <input type="text" name="email" placeholder="<?php echo $email[$language]['1']?>" required>
                    </div>
                    <label id="label_password"><?php echo $password[$language]['0']?></label>
                    <div class="password">
                        <input type="password" name="password" placeholder="<?php echo $password[$language]['1']?>" required>
                    </div>
                    <h4>
                        <a href="#"><?php echo $link_h4[$language]['0']?></a>
                    </h4>
                    <div class="button_submit">
                        <button type="submit">
                            <?php echo $button_submit[$language]['0']?>
                        </button>
                    </div>
                    <h4>
                        <?php echo $link_h4[$language]['1']?><a style="color:#8cc63f; padding-left:10px" href="teacher_registration.php?language=<?=$language?>"><?php echo $link_h4[$language]['2']?></a>
                    </h4>
                </form>
            </div>
            <div class="footer_img_city">
                <div class="city_background_image"></div>
                <!--<img src="./public/img/svg/fundo-cidade.svg">-->
                <div class="link_term">
                    <a href="../../faqs.php?language=<?=$language?>" target="_blank" style="margin-right: 14px;"><?php echo $link_term[$language]['0']?></a>
                    <a href="../../public/pdf/terms_and_conditions_cyc.pdf" target="_blank"><?php echo $link_term[$language]['1']?></a>
                </div>
            </div>
		</div> 
  	</body>
</html>