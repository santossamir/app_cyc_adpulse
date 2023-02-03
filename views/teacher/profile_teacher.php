<?php
	session_start();

	require_once "../../access_validator.php";
    require "../../app/user_teacher/teacher_controller.php";
    $action = "show_data_profile";

	//Variables to return profile image editing
	$error = "";
    if(isset($_SESSION["erro"])){
       $error = $_SESSION["erro"];
    }

	//Variable for the parameter
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
		<link rel="stylesheet" href="../../public/css/profile_teacher.css">
		<title>Profile - Teacher CYC</title>

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
			<div class="header_photo">
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
				<img src="../../public/img/png/foto-mentor-18.png">
            </div>
			<!--Start of data return-->
			<?php
				foreach($teachers as $teacher){
					if($teacher->teacher_id == $teacher_id){
			?>
            <div class="profile_img">
                <img src="<?php echo $teacher->image_path;?>">
            </div>
            <div class="customization_user">
				<div class="user_data">
					<div class="div_1">
						<div class="user_data_name">
							<div>
								<h2>
									<?php
										echo $teacher->first_name." ".$teacher->last_name;
									?>
								</h2>
								<h4><?php echo $modal_teacher[$language]['1']?> 
									<?php
										echo $teacher->mentor;
									?>
								</h4>
							</div>
							<div class="link_cv">
								<a href="#">
									<img src="../../public/img/svg/icon-CV.svg">
								</a>
							</div>
						</div>
						<div class="user_data_plus">
							<img src="../../public/img/svg/icon-localizacao-green.svg">
							<span><?php echo $found_teacher[$language]['0']?>
								<?php
									echo $teacher->date_registration;
								?>
							</span>
						</div>
						<div class="user_data_plus">
							<img src="../../public/img/svg/icon-aulas-green.svg">
							<span><?php echo $found_teacher[$language]['1']?></span>
						</div>
						<div class="user_data_plus">
							<img src="../../public/img/svg/estrela.svg">
							<span><?php echo $found_teacher[$language]['2']?></span>
						</div>
					</div>
					<div class="user_qualifications">
						<div class="user_qualifications_plus">
							<img src="../../public/img/svg/icon-boa-comunicacao-green.svg">
							<span id="span_communication"><?php echo $found_teacher[$language]['3']?></span>    
						</div>
						<div class="user_qualifications_plus">
							<img src="../../public/img/svg/icon-empatia-green.svg">
							<span><?php echo $found_teacher[$language]['4']?></span>    
						</div>
						<div class="user_qualifications_plus">
							<img src="../../public/img/svg/icon-responsavel-green.svg">
							<span><?php echo $found_teacher[$language]['5']?></span>    
						</div>
					</div>
					<div class="topics_session_plus">
							<h2><?php echo $found_teacher[$language]['6']?></h2>
							<p>
								<?php echo $teacher->about_me;?>
							</p>
					</div>
					<div class="topics_session_plus">
							<h2><?php echo $found_teacher[$language]['7']?></h2>
							<p>
								<?php echo $teacher->teach_you;?>
							</p>
					</div>					
				</div>
				<!--Start of edit Profile Modal-->
				<div id="modal" class="modal">
					<div class="content">
						<div class="form">
							<div class="close_modal">
								<button id="close_modal" onClick="close_modal()">X</button>
							</div>
							<form id="form_login" method="POST" action="teacher_controller.php?action=edit_profile&id=<?=$teacher_id?>&language=<?=$language?>" enctype="multipart/form-data">
								<div class="photo_profile">
									<label><?php echo $form[$language]['0']?></label>
									<div class="img_modal">
										<input type="file" name="profile_img" value="">
										<input type="text" name="used_img" value="<?=$teacher->image_path;?>" hidden>
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
								</div>
								<div style="display:flex;">
									<div style="width: 50%;">
										<label><?php echo $form[$language]['1']?></label>
										<div class="first_name_modal">
											<input type="text" name="first_name" value="<?=$teacher->first_name;?>"required>
										</div>
									</div>
									<div style="width: 50%;">
										<label id="last_name_label"><?php echo $form[$language]['3']?></label>
										<div class="last_name_modal">
											<input type="text" name="last_name" value="<?=$teacher->last_name;?>" required>
										</div>
									</div>
								</div>
								<label><?php echo $form[$language]['5']?></label>
								<div class="mentor_modal">
									<input id="mentor" type="text" value="<?=$teacher->mentor;?>" name="mentor" required>
								</div>
								<label><?php echo $form[$language]['7']?></label>
								<div class="city">
									<input type="text" name="city" value="<?=$teacher->city;?>" required>
								</div>
								<label><?php echo $form[$language]['9']?></label>
								<div class="email">
									<input type="text" name="email" value="<?=$teacher->email;?>" required>
								</div>
								<label><?php echo $form[$language]['11']?></label>
								<div class="password">
									<input type="text" name="password" value="<?=$teacher->password;?>" required>
								</div>
								<div class="student_information">
									<div class="student_information_item">
										<label id="information_label"><?php echo $edit_profile[$language]['8']?></label>
										<div class="textarea">
											<textarea name="about_me" rows="8"  maxlength="300" placeholder="<?php echo $edit_profile[$language]['9']?>" required><?=$teacher->about_me;?></textarea>
										</div>
									</div>
									<div class="student_information_item">
										<label id="information_label"><?php echo $edit_profile[$language]['10']?></label>
										<div class="textarea">
											<textarea name="teach_you" rows="8" maxlength="300" placeholder="<?php echo $edit_profile[$language]['11']?>" required><?=$teacher->teach_you;?></textarea>
										</div>
									</div>
								</div>
								<div class="button_submit">
									<button type="submit">
										<?php echo $help[$language]['6']?>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--End of profile edit modal-->
				<div class="send_button">
					<button>
						<a href="teacher_messages.php?action=show_message_teacher&teacher_id=<?=$teacher_id?>&language=<?=$language?>"><?php echo $found_teacher[$language]['8']?></a>
					</button>
				</div>
                <div class="add_button">
					<button onClick="show_modal()">
						<span style="color: #fff;"><?php echo $edit_profile[$language]['12']?></span>
					</button>
				</div>
		    </div>
			<?php }}
			?>
			<!--End of data return--> 
        </div>
  	</body>
	<script src="../../public/js/profile_teacher.js"></script>
</html>