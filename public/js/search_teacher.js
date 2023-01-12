//Variables to change the class of the buttons 'Localização' and 'Categoria'
let class_active = document.getElementsByClassName("active");
let btn_category = document.getElementById('btn_category');
let btn_localization = document.getElementById('btn_localization');

//Variable to retrieve the language parameter
let url_params = new URLSearchParams(window.location.search);
let language_parameter = url_params.get('language');

//Variable to retrieve the student_id parameter
let url_params2 = new URLSearchParams(window.location.search);
let student_parameter = url_params2.get('id');

//Variable to change the placeholder
let category_placeholder = "";
let location_placeholder = "";

if(language_parameter == "pt"){
    category_placeholder = "Escolhe tua categoria";
    location_placeholder =  "Escolhe a localização";
} else if(language_parameter == "en"){
    category_placeholder = "Choose your category";
    location_placeholder =  "Choose location";
} else if(language_parameter == "it"){
    category_placeholder = "Scegli la tua categoria";
    location_placeholder = "Scegli la posizione";
} else if(language_parameter == "ro"){
    category_placeholder = "Alege categoria ta";
    location_placeholder = "Alege locația";
}

//Variable to change the action parameter in the form
let search_category = "teacher_controller.php?action=search_category&id="+student_parameter+"&language=";

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

/*
Para fazer uso do OpenStreetMap dinÂmicamento com o input_search
let lat = 0;
let lon = 0;

$('#search_button').click(function(){
  
    let cidade = $("#input_search").val();
    let city = cidade.toLowerCase();
    
    $.ajax({
      url: "https://nominatim.openstreetmap.org/search?q="+city+"&format=json&limit=1",
    }).done(function(response) {
      lat = response[0].lat;
      lon = response[0].lon;
      console.log(lat);
      console.log(lon);

      const provider = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
        let newMap = L.map('map').setView([lat, lon], 9);
        
        L.tileLayer(provider, {
            maxZoom: 18,
        }).addTo(newMap)
    });
  });*/

  const provider = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
  let newMap = L.map('map').setView([51, 10], 3.5);
  
  L.tileLayer(provider, {
      maxZoom: 18,
  }).addTo(newMap)
