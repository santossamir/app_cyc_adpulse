<?php
    session_start();
    $error = "";
    if(isset($_SESSION["erro"])){
       $error = $_SESSION["erro"];
    }

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
		<title>Registration - Creative Youth City</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>
  	</head>
  	<body>
		<div class="container">
            <div class="form">
                <!--Start registration form-->
                <form id="form_login" method="POST" action="teacher_controller.php?action=insert" enctype="multipart/form-data">
                    <label><?php echo $form[$language]['0']?></label>
                    <div class="profile_img">
                        <input type="file" name="profile_img" required>
                    </div>

                    <!--Start error text loading image-->
                    <?php
                        if(!empty($error)){
                    ?>
                    <div class="text_error">
                        <strong><?php echo $error;?></strong>
                    </div>               
                    <?php } ?>
                    <!--End error text loading image-->

                    <label><?php echo $form[$language]['1']?></label>
                    <div class="first_name">
                        <input type="text" name="first_name" placeholder="<?php echo $form[$language]['2']?>" required>
                    </div>
                    <label><?php echo $form[$language]['3']?></label>
                    <div class="last_name">
                        <input type="text" name="last_name" placeholder="<?php echo $form[$language]['4']?>" required>
                    </div>
                    <label id="label_mentor"><?php echo $form[$language]['5']?></label>
                    <div class="mentor">
                        <input id="mentor" type="text" name="mentor" placeholder="<?php echo $form[$language]['6']?>" required>
                    </div>
                    <label><?php echo $form[$language]['7']?></label>
                    <div class="city">
                        <input type="text" name="city" placeholder="<?php echo $form[$language]['8']?>" required>
                    </div>
                    <label><?php echo $form[$language]['9']?></label>
                    <div class="email">
                        <input type="text" name="email" placeholder="<?php echo $form[$language]['10']?>" required>
                    </div>
                    <label><?php echo $form[$language]['11']?></label>
                    <div class="password">
                        <input type="password" name="password" placeholder="<?php echo $form[$language]['12']?>" required>
                    </div>
                    <div class="button_submit">
                        <button type="submit">
                            <?php echo $form[$language]['13']?>
                        </button>
                    </div>
                </form>
                <!--End registration form-->
            </div>
            <div class="footer_img_city">
                <img src="../../public/img/svg/fundo-cidade.svg">
            </div>
		</div> 
  	</body>
</html>