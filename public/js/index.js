function chooseLanguage(anything){
    var language = jQuery('#textBox').val();
    window.location.href='http://localhost:3000/index.php?language='+anything;
}

let dropdown = document.getElementById('dropdown');
dropdown.onclick = function(){
    dropdown.classList.toggle('active');
}