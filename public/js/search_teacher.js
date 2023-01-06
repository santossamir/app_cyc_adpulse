//Variables to change the class of the buttons 'Localização' and 'Categoria'
let class_active = document.getElementsByClassName("active");
let btn_category = document.getElementById('btn_category');
let btn_localization = document.getElementById('btn_localization');

//Variable to retrieve the language parameter
let url_params = new URLSearchParams(window.location.search);
let language_parameter = url_params.get('language');

//Variable to change the placeholder
let category_placeholder = "";
let location_placeholder = "";

if(language_parameter == "pt"){
    category_placeholder = "Escolhe tua categoria";
    location_placeholder =  "Escolhe a localização";
} else if(language_parameter == "en"){
    category_placeholder = "Choose your category";
    location_placeholder =  "Choose location";
} else if(language_parameter == "es"){
    category_placeholder = "Elige tu categoría";
    location_placeholder = "Elegir la ubicación";
}

//Variable to change the action parameter in the form
let search_category = "teacher_controller.php?action=search_category&language=";

function category(){
    if(class_active){
        btn_localization.classList.remove('active');
        btn_category.classList.add('active');
        document.getElementById('input_search').placeholder = category_placeholder;
        
        //Change the action parameter in the form
        document.getElementById("form_search").action = search_category+language_parameter;
    }else{
        btn_localization.classList.add('active');
    }; 
    
    document.getElementById('dropdown').style.display = 'flex'; 
}

function localization(){
    if(class_active){
        btn_category.classList.remove('active');
        btn_localization.classList.add('active');
        document.getElementById('input_search').placeholder = location_placeholder;
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

const tilesProvider = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
        let myMap = L.map('map').setView([41.23668845, -8.302018317104206], 11);
        
        L.tileLayer(tilesProvider, {
            maxZoom: 18,
        }).addTo(myMap)

        //let marker = L.marker([51.505, -0.09]).addTo(myMap)