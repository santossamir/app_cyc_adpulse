function set_language(){
    var language = jQuery('#language').val();
    window.location.href='http://localhost:3000/index.php?language='+language;
}