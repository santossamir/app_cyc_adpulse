<?php
  session_start();
  if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'Yes' ){
    header('Location: index.php?login=Error');
  }
?>