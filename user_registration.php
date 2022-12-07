<html>
  	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="public/css/user_registration.css">
		<title>Login - Creative Youth City</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>
  	</head>
  	<body>
		<div class="container">
            <div class="form">
                <!--Start input radio for choose type user-->
                <p id="inputs_radio" class="inputs_radio">
                    <input type="radio" name="type_user"  value="mentor" onchange="choose_type_mentor()">Eu sou um mentor
                </p>    
                <p class="inputs_radio">
                    <input type="radio" name="type_user" value="student" onchange="choose_type_student()">Eu sou um estudante
                </p>
                <!--End input radio for choose type user-->

                <!--Start registration form-->
                <form id="form_login" method="POST" action="user_controller.php?action=insert" onSubmit="handleSubmitForm(event)">
                    <label>Nome</label>
                    <div class="first_name">
                        <input type="text" name="first_name" placeholder="Insere o teu nome" required>
                    </div>
                    <label>Apelido</label>
                    <div class="last_name">
                        <input type="text" name="last_name" placeholder="Insere o teu apelido" required>
                    </div>
                    <label id="label_mentor">Mentor de</label>
                    <div class="mentor">
                        <input id="mentor" type="text" name="mentor" placeholder="Insere tua habilidade" required>
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
  	<script src="public/js/user_registration.js">
	       
	</script>
</html>