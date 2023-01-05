<?php
   session_start();
   
   session_destroy();

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

   header('Location: index.php?language='.$language);
  
?>