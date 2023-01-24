<?php
    session_start();

    require_once "../../access_validator.php";
    require "../../app/teacher_files/teacher_files_controller.php";
    $action = "show_file";

    $error = "";
    if(isset($_SESSION["erro"])){
       $error = $_SESSION["erro"];
    }

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
		<link rel="stylesheet" href="../../public/css/documents.css">
		<title>Documents - Creative Youth City</title>

		<!--Font family-->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');
		</style>
  	</head>
  	<body>
		<div class="container">
            <div class="form">
                
                <!--Start error or success text loading file-->
                <?php
                    if(!empty($error)){
                ?>
                    <div class="text_error">
                        <strong><?php echo $error;?></strong>
                    </div>               
                <?php } else if($_GET['upload'] == 'Success'){
                ?>
                    <div class="text_error" style="color:#8cc63f;">
                        <strong><?php echo "Arquivo carregado com sucesso!";?></strong>
                    </div>   
                <?php }
                ?>
                <!--End error  or success text loading file-->

                <form id="form_login" method="POST" action="files_controller.php?action=upload_files&teacher_id=<?=$teacher_id?>&language=<?=$language?>" enctype="multipart/form-data">
                    <label><?php echo $documents[$language]['0']?></label>
                    <div class="teacher_file">
                        <input type="file" name="uploaded_file" required>
                    </div>
                    <label><?php echo $documents[$language]['1']?></label>
                    <div class="file_name">
                        <input type="text" name="file_name" placeholder="<?php echo $form[$language]['2']?>" required>
                    </div>
                    <div class="submit_documents">
                        <button type="submit">
                            <?php echo $button_submit[$language]['1']?>
                        </button>
                    </div>
                </form>
                <hr>
                <div class="my_documents">
                    <span><?php echo $documents[$language]['2']?></span>
                    <table>
                        <thead>
                            <tr>
                                <th>Nome do Arquivo</th>
                                <th>Arquivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($files as $file){
                            ?>
                            <tr>
                                <td><h4><?= $file->file_name?></h4></td>
                                <td><a href="<?php echo $file->file_path;?>" target="_blank">Here</a></td>
                            <?php }
                            ?>
                            </tr>
                        </tbody>
                    </table>
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
  	</body>
</html>