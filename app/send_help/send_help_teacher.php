<?php

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
    $destino = "samirtxr@gmail.com";
    $assunto = $_POST['assunto'];

    //Este sempre deverá existir para garantir a exibição correta dos caracteres
    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: $nome <$email>";

    //Enviar
    $email = mail($destino, $assunto, $arquivo, $headers);

    if($email){
        echo "<script>alert('Mensagem enviada com sucesso!');</script>";
        header('Location: ../../views/teacher/user_teacher.php?teacher_id='.$teacher_id.'&language='.$language);
    }else{
        echo "<script>alert('Erro ao enviar!');</script>";
        header('Location: ../../views/teacher/user_teacher.php?teacher_id='.$teacher_id.'&language='.$language);
    }
?>
