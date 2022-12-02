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
                        <img src="./public/img/svg/seta-esquerda.svg">
                    </div>
                    <div class="menu_button">
                        <img src="./public/img/svg/menu.svg">
                    </div>
                </div>
            </div>
           <h1>Encontra o teu mentor</h1>
           <form>
                <div class="search_teacher">
                    <input typpe="search" name="search">
                    <img src="./public/img/svg/icon-search.svg">
                </div>
           </form>
            <div id="search_button" class="search_button">
                <button id="btn_category" class="btn" onClick="category()">Categoria</button>
                <button id="btn_localization" class="btn active" onClick="localization()">Localização</button>                     
            </div>
		</div> 
  	</body>
    <script src="public/js/search_teacher.js">

    </script>
</html>