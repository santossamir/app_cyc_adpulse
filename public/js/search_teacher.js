let class_active = document.getElementsByClassName("active");
let btn_category = document.getElementById('btn_category');
let btn_localization = document.getElementById('btn_localization');

function category(){
    if(class_active){
        btn_localization.classList.remove('active');
        btn_category.classList.add('active');
    }else{
        btn_localization.classList.add('active');
        
    }; 
    setTimeout(function teste(){
        alert("Categoria!");
    }, 400);   
}

function localization(){
    if(class_active){
        btn_category.classList.remove('active');
        btn_localization.classList.add('active');
    }else{
        btn_category.classList.add('active');
    }; 
    setTimeout(function teste(){
        alert("Localização!");
    }, 400);            
}