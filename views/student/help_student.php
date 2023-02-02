<?php
    session_start();
    $student_id = $_GET['student_id'];

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
		<link rel="stylesheet" href="../../public/css/teacher_registration.css">
		<title>Help - Creative Youth City</title>

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
            <div class="form">
                <!--Start registration form-->
                <form id="form_login" method="POST" action="../../app/send_help/send_help_student.php?student_id=<?=$student_id?>&language=<?=$language?>">
                    <!--Start error text loading image-->
                    <?php
                        if(!empty($error)){
                    ?>
                    <div class="text_error">
                        <strong><?php echo $error;?></strong>
                    </div>               
                    <?php } ?>
                    <!--End error text loading image-->

                    <label><?php echo $help[$language]['0']?></label>
                    <div class="first_name">
                        <input type="text" name="full_name" placeholder="<?php echo $form[$language]['2']?>" required>
                    </div>
                    <label><?php echo $help[$language]['1']?></label>
                    <div class="email">
                        <input type="text" name="email" placeholder="<?php echo $form[$language]['10']?>" required>
                    </div>
                    <label><?php echo $help[$language]['2']?></label>
                    <div class="password">
                        <input type="text" name="assunto" placeholder="<?php echo $help[$language]['3']?>" required>
                    </div>
                    <label><?php echo $help[$language]['4']?></label>
                    <div class="textarea">
                        <textarea name="mensagem" rows="8" placeholder="<?php echo $help[$language]['5']?>" required></textarea>
                    </div>
                    <div class="button_submit">
                        <button type="submit">
                            <?php echo $help[$language]['6']?>
                        </button>
                    </div>
                </form>
                <!--End registration form-->
            </div>
            <div class="footer_img_city">
                <div class="city_background_image"></div>
                <div class="link_term">
                    <a href="faqs.php?language=<?=$language?>" target="_blank" style="margin-right: 14px;"><?php echo $link_term[$language]['0']?></a>
                    <a href="./public/pdf/terms_and_conditions_cyc.pdf" target="_blank"><?php echo $link_term[$language]['1']?></a>
                </div>
            </div>
        </div>
    </body>
</html>