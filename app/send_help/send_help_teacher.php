<?php

    require_once('./sendmail.php');

    $teacher_id = $_GET['teacher_id'];

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

    //Variáveis
    $nome = $_POST['full_name'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');

    //Compo E-mail
    $arquivo = "
        <html>
        <p><b>Nome: </b>$nome</p>
        <p><b>E-mail: </b>$email</p>
        <p><b>Mensagem: </b>$mensagem</p>
        <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
        </html>
    ";
    
    //Emails para quem será enviado o formulário
    $destino = "daniela.costa@cjagueda.pt";
    $nome_destino = "Daniela Costa";
    $assunto = $_POST['assunto'];

    $email = sendmail($destino, $nome_destino, $assunto, $arquivo);

    if($email){
        echo "<script>
                    alert('Message sent successfully!')
                    window.location.href='../../views/teacher/user_teacher.php?teacher_id=".$teacher_id."&language=".$language."';
                </script>";
    }else{
        echo "<script>
                    alert('Error sending message!')
                    window.location.href='../../views/teacher/user_teacher.php?teacher_id=".$teacher_id."&language=".$language."';
                </script>";
    }
?>
