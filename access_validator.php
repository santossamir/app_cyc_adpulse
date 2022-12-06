<?php
  session_start();
  if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'Yes' ){
    header('Location: login.php?login=Error2');
  }
?>