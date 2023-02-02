<?php
	session_start();

    require_once "../../access_validator.php";
    require "../../app/messages/messages_controller.php";

    $image_path = $_SESSION['image_path'];
    $date_registration = $_SESSION['date_registration'];
    $teacher_id = $_GET['teacher_id'];

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
		<link rel="stylesheet" href="../../public/css/my_favorites.css">
		<title>Messages - Teacher CYC</title>

		<style>
            /*Font family*/
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
            
            .card_teache{
                display:flex;
                flex-direction:column;
                text-align:center;"
            }

            .input_message input{
                height: 35px;
                font-size: 16px;
                width: 85%;" 
            }

            .input_message ::placeholder{
                font-size: 16px;
            }
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
                <img src="../../public/img/png/logo-CYC-19.png">
            </div>
            <div class="profile_img">
                <img src="<?php echo $image_path;?>">
            </div>
            <div class="customization_user" style="background-color: #f7931e;">
                <div class="card_teacher">
                    <div class="card_teacher">
                        <?php
                            foreach($messages as $message){
                                if($message->receiver_id == $teacher_id){
                        ?>
                            <div class="card_teacher_box">
                                <div class="card_name">
                                    <h2>
                                        <?= $mensagens[$language]['1']?> - <?=$message->first_name." ".$message->last_name;?>
                                    </h2>
                                    <h4>
                                        <?=$message->mentor;?>
                                    </h4>
                                    <p><?=$message->date_registration?> - <i><?=$message->message?></i></p>
                                    <form style="margin:10px 0 10px 0;" method="post" action="messages_controller.php?action=insert_message_teacher&id=<?=$message->student_id?>&teacher_id=<?=$teacher_id?>&language=<?=$language?>">
                                        <div>
                                            <div class="input_message">
                                                <input type="text" name="message" id="message" placeholder="<?= $mensagens[$language]['3']?>">
                                                <div class="card_button" style="width:0; margin-top:0;">
                                                    <button type="submit" style="border:none; margin-left: 10px;">
                                                        <img style="width: 35px;" src="../../public/img/svg/seta-direita.svg">
                                                    </button>
                                                </div>    
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                           
                        <?php }}
                        ?>
                    </div>
                </div>
                <div class="footer_img_city" style="background-color: #f7931e;">
                    <div class="city_background_image"></div>
                    <div class="link_term">
                        <a href="../../faqs.php?language=<?=$language?>" target="_blank" style="margin-right: 14px;"><?php echo $link_term[$language]['0']?></a>
                        <a href="../../public/pdf/terms_and_conditions_cyc.pdf" target="_blank"><?php echo $link_term[$language]['1']?></a>
                    </div>
                </div>
            </div>
		</div> 
  	</body>
</html>