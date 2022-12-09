<?php
    session_start();
    $error = "";
    if(isset($_SESSION["erro"])){
       $error = $_SESSION["erro"];
    }
?>
<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="public/css/student_registration.css">
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
                <form id="form_login" method="POST" action="student_controller.php?action=insert" enctype="multipart/form-data">
                    <label>Foto do perfil</label>
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

                    <label>Nome</label>
                    <div class="first_name">
                        <input type="text" name="first_name" placeholder="Insere o teu nome" required>
                    </div>
                    <label>Apelido</label>
                    <div class="last_name">
                        <input type="text" name="last_name" placeholder="Insere o teu apelido" required>
                    </div>
                    <label>Concelho</label>
                    <div class="city">
                        <input type="text" name="city" placeholder="Insere tua cidade" required>
                    </div>
                    <label>E-mail</label>
                    <div class="email">
                        <input type="text" name="email" placeholder="Insere o teu e-mail" required>
                    </div>
                    <label>Palavra-chave</label>
                    <div class="password">
                        <input type="password" name="password" placeholder="Insere tua palavra-chave" required>
                    </div>
                    <div class="button_submit">
                        <button type="submit">
                            Registrar
                        </button>
                    </div>
                </form>
                <!--End registration form-->
            </div>
            <div class="footer_img_city">
                <img src="./public/img/svg/fundo-cidade.svg">
            </div>
		</div> 
  	</body>
</html>