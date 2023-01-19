<?php
    include("language.php");
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
		<link rel="stylesheet" href="../../public/css/faqs.css">
		<title>FAQs - Creative Youth City</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
        </style>
  	</head>
  	<body>
		<div class="container">       
			<div class="logo_cyc">
                <img src="../../public/img/svg/logo-cyc.svg">
            </div>
            <div class="faqs_cyc">
                <div class="title_faqs">
                    <div class="title_faqs_h2">
                        <h2><?= $faqs[$language]['0']?></h2>
                    </div>
                    <div id="faqs_img" class="faqs_img">
                        <img id="angle_right" onclick="show_faqs_youth('faqs_youth')" src="./public/img/svg/angle-right.svg">
                    </div>
                </div>
                <div id="faqs_youth" class="faqs">
                    <ul>
                        <li><?= $faqs[$language]['2']?>
                            <img id="angle_response_1" onclick="show_response_youth_1('angle_response_11')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_11" class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['3']?></li>
                            </ul>
                        </div>
                        <li><?= $faqs[$language]['4']?>
                            <img id="angle_response_2" onclick="show_response_youth_2('angle_response_22')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_22"  class="faqs_response">    
                            <ul>
                                <li><?= $faqs[$language]['5']?>
                                   
                                </li>
                            </ul>
                        </div>
                        <li><?= $faqs[$language]['6']?>
                            <img id="angle_response_3" onclick="show_response_youth_3('angle_response_33')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_33" class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['7']?></li>
                            </ul>
                        </div>
                        <li><?= $faqs[$language]['8']?>
                            <img id="angle_response_4" onclick="show_response_youth_4('angle_response_44')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_44" class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['9']?></li>
                            </ul>
                        </div>
                        <li><?= $faqs[$language]['10']?>
                            <img id="angle_response_5" onclick="show_response_youth_5('angle_response_55')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_55" class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['11']?></li>
                            </ul>
                        </div>                       
                        <li><?= $faqs[$language]['12']?>
                            <img id="angle_response_6" onclick="show_response_youth_6('angle_response_66')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_66"  class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['13']?></li>
                            </ul>
                        </div>
                        <li><?= $faqs[$language]['14']?>
                            <img id="angle_response_7" onclick="show_response_youth_7('angle_response_77')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_77" class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['15']?></li>
                            </ul>
                        </div>
                    </ul>
                </div>
                <div class="title_faqs">
                    <div class="title_faqs_h2">
                        <h2><?= $faqs[$language]['1']?></h2>
                    </div>
                    <div id="faqs_img_org" class="faqs_img">
                        <img id="angle_right_org" onclick="show_faqs_org('faqs_org')" src="./public/img/svg/angle-right.svg">
                    </div>
                </div>               
                <div id="faqs_org" class="faqs">    
                    <ul>
                        <li><?= $faqs[$language]['16']?>
                            <img id="angle_response_8" onclick="show_response_org_8('angle_response_88')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_88" class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['17']?></li>
                            </ul>
                        </div>
                        <li><?= $faqs[$language]['18']?>
                            <img id="angle_response_9" onclick="show_response_org_9('angle_response_99')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_99"  class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['19']?></li>
                            </ul>
                        </div>
                        <li><?= $faqs[$language]['20']?>
                            <img id="angle_response_10" onclick="show_response_org_10('angle_response_101')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_101"  class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['21']?></li>
                            </ul>
                        </div>
                        <li><?= $faqs[$language]['22']?>
                            <img id="angle_response_12" onclick="show_response_org_12('angle_response_121')" src="./public/img/svg/angle-right.svg">
                        </li>
                        <div id="angle_response_121" class="faqs_response">
                            <ul>
                                <li><?= $faqs[$language]['23']?></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="footer_img_city">
                <div class="city_background_image"></div>
                <!--<img src="./public/img/svg/fundo-cidade.svg">-->
                <div class="link_term">
                    <a href="faqs.php?language=<?=$language?>" target="_blank" style="margin-right: 14px;"><?php echo $link_term[$language]['0']?></a>
                    <a href="./public/pdf/terms_and_conditions_cyc.pdf" target="_blank"><?php echo $link_term[$language]['1']?></a>
                </div>
            </div>
		</div> 
  	</body>
    <script src="./public/js/faqs.js">
    </script>
</html>