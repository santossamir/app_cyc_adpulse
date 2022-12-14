//Variables to change the class of the buttons 'Localização' and 'Categoria'
let class_active = document.getElementsByClassName("active");
let btn_category = document.getElementById('btn_category');
let btn_localization = document.getElementById('btn_localization');

//Variable to change the action parameter in the form
let search_category = "teacher_controller.php?action=search_category";

function category(){
    if(class_active){
        btn_localization.classList.remove('active');
        btn_category.classList.add('active');
        document.getElementById('input_search').placeholder="Escolhe a tua categoria";
        
        //Change the action parameter in the form
        document.getElementById("form_search").action = search_category;
    }else{
        btn_localization.classList.add('active');
    }; 
    
    document.getElementById('dropdown').style.display = 'flex'; 
}

function localization(){
    if(class_active){
        btn_category.classList.remove('active');
        btn_localization.classList.add('active');
        document.getElementById('input_search').placeholder="Escolhe a localização";
    }else{
        btn_category.classList.add('active');
    }; 
   
    document.getElementById('dropdown').style.display = 'none'; 
}

function show_modal(){
    document.getElementById('modal_teacher').style.display = 'block'; 
    document.getElementById('button_locator_two').style.display = 'none';
    document.getElementById('button_locator_three').style.display = 'none';
}
