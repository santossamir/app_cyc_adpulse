<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="public/css/login.css">
		<title>Login - Creative Youth City</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>
  	</head>
  	<body>
		<div class="container">
            <div class="form">
                <form id="form_login" method="POST" action="student_controller.php?action=login" onSubmit="handleSubmitForm(event)">
                    
                    <!--Start of error text-->
                    <?php
                        if(isset($_GET['login']) && $_GET['login'] == 'Error'){
                    ?>
                    <!--Error text of login-->
                    <div class="text_error">
                        <strong>Usuário ou senha inválido(s).</strong>
                    </div>               

                    <?php } ?> 
                    <!--End error text-->

                    <label>E-mail</label>
                    <div class="email">
                        <input type="text" name="email" placeholder="Insere o teu e-mail" required>
                    </div>
                    <label id="label_password">Palavra-chave</label>
                    <div class="password">
                        <input type="password" name="password" placeholder="Insere tua palavra-chave" required>
                    </div>
                    <h4>
                        <a href="#">Não te lembras da palavra-chave?</a>
                    </h4>
                    <div class="button_submit">
                        <button type="submit">
                            Entrar
                        </button>
                    </div>
                    <h4>
                        Ainda não tens uma conta?<a style="color:#8cc63f; padding-left:10px" href="student_registration.php">Regista-te</a>
                    </h4>
                </form>
            </div>
            <div class="footer_img_city">
                <img src="./public/img/svg/fundo-cidade.svg">
            </div>
		</div> 
  	</body>
  	<script src="public/js/login.js">
		
	</script>
</html>