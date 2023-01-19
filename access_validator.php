<?php
  session_start();

  include("language.php");
  $language = "";

  if((isset($_GET['language']) && $_GET['language'] == "pt") || !isset($_GET['language'])){
      $pt_select = "selected";
      $language = "pt";
  }
  else if((isset($_GET['language']) && $_GET['language'] == "en") || !isset($_GET['language'])){
      $en_select = "selected";
      $language = "en";
  }else if((isset($_GET['language']) && $_GET['language'] == "it") || !isset($_GET['language'])){
      $it_select = "selected";
      $language = "it";
  }else if((isset($_GET['language']) && $_GET['language'] == "ro") || !isset($_GET['language'])){
      $ro_select = "selected";
      $language = "ro";
  };

  if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'Yes' ){
    header('Location: ../../index.php?login=Error&language='.$language);
  }
?>