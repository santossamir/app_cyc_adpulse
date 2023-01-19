<?php
	session_start();

    require_once "../../access_validator.php";
    require "../../app/messages/messages_controller.php";
    $action = "";

    $image_path = $_SESSION['image_path'];
    $date_registration = $_SESSION['date_registration'];
    $student_id = $_SESSION['student_id'];

    #This variable contains values sent by the parameters
    $student_id = $_GET['id'];
    $teacher_id = $_GET['teacher_id'];
    $teacher_name = $_GET['teacher_name'];
    $teacher_apelido = $_GET['teacher_apelido'];

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
		<link rel="stylesheet" href="../../public/css/my_courses.css">
		<title>Messages - Student CYC</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
            .div_input input:focus{
                outline: 0; 
            }

            .div_input ::placeholder{
                font-size: 22px;
                line-height: 20px;
            }
        </style>
  	</head>
  	<body>
		<div class="container">
			<div class="logo_cyc">
                <div class="header_buttons">
                    <div class="come_back_button">
                        <a href="user_student.php?language=<?=$language?>">
							<img src="../../public/img/svg/seta-esquerda.svg">
						</a>
                    </div>
                    <div class="menu_button">
                        <a href="user_student.php?language=<?=$language?>">
							<img src="../../public/img/svg/menu.svg">
						</a>
                    </div>
                </div>
                <img src="../../public/img/png/logo-CYC-19.png">
            </div>
            <div class="profile_img">
                <img src="<?php echo $image_path;?>">
            </div>
            <div class="customization_user">
                <div style="display:flex; flex-direction:column; text-align:center;" class="card_teacher">
                    <?php
                        if(isset($teacher_id)){
                            echo "<h2 style='margin-top:30px;'>".$mensagens[$language]['0']." ".$teacher_name." ".$teacher_apelido. "</h2>";
                    ?>
                    <form style="margin:10px 0 10px 0;" method="post" action="messages_controller.php?action=insert_message_student&id=<?=$student_id?>&teacher_id=<?=$teacher_id?>&language=<?=$language?>">
                        <div>
                            <div class="div_input" style="display: flex; flex-direction: row; justify-content: center; margin-top: 15px;">
                                <input style="height: 40px; font-size: 22px; width: 50%; padding-left: 10px; border-radius: 5px; border:1px solid #b3b3b3;" type="text" name="message" id="message" placeholder="<?= $mensagens[$language]['2']?>">
                                <div class="card_button" style="width:0; margin-top:0;">
                                    <button type="submit" style="border:none; margin-left: 10px;">
                                        <img style="width: 40px;" src="../../public/img/svg/seta-direita.svg">
                                    </button>
                                </div>    
                            </div>
                        </div>
                    </form>
                    <?php }
                    ?>
                    <div class="card_teacher">
                        <?php
                            foreach($messages as $message){
                                if($message->issuer_id == $student_id){
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
                            </div>
                        </div>
                    <?php }}
                    ?>
                </div>
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
		</div> 
  	</body>
</html>