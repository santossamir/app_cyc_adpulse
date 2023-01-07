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

function show_modal(city, json){
    
    let modal = $('#modal_teacher');
    
    modal.find('.modal_title_number h3').html(json.length);
    modal.find('.modal_title h1 span').html(city);
    
    modal.find('.card_teacher').html('');
    for (i=0; i<json.length; i++) {
        let teacher = json[i];
        const htmlString = `<div class="card_teacher_box">
            <div class="card_name">
                <h2>${teacher.first_name} ${teacher.last_name}</h2>
                <h4>Mentor de <span>${teacher.mentor}</span></h4>
                <div class="card_name_plus">
                    <img src="../../public/img/svg/estrela.svg">
                    <span>4.3 de 5.0 </span>
                </div>
            </div>
            <div class="card_button">
                <a href="found_teacher.php?teacher=${teacher.first_name}${teacher.last_name}&id=${teacher.id}&language=pt" target="_blank">
                    <img src="../../public/img/svg/seta-direita.svg">
                </a>
            </div>
        </div>`;
        
        modal.find('.card_teacher').append(htmlString);
    }
   
    document.getElementById('modal_teacher').style.display = 'block'; 
}

const tilesProvider = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";

var myMap = L.map('map').setView([41.23668845, -8.302018317104206], 11);

L.tileLayer(tilesProvider, {
    maxZoom: 18,
}).addTo(myMap);

var marker = undefined;
        

$(function() {
    
    $("#form_search").submit(function( event ) {
        event.preventDefault();
        
        var cidade = '';
        
        $.each($(this).serializeArray(), function(i, field) {
            if (field.name == "search") cidade = field.value;
        });

        $.ajax({
            url: "https://nominatim.openstreetmap.org/search?q="+ cidade +"&format=json&limit=1",
        }).done(function(response) {
            
            if (response.length == 0) {
                alert('Cidade desconhecida');   
                return;
            }
            
            const lat = response[0].lat;
            const lon = response[0].lon;
            
            $.ajax({
                url: "https://creativeyouthcity.ad-pulse.com/app/user_teacher/search.php?search=" + cidade,
            }).done(function(response) {
               
               let json = JSON.parse(response)
               
               if (json.length) {
                   if (marker === undefined) {
                        marker = L.marker([lat, lon]);
                        marker.addTo(myMap).bindPopup("<b>" + json.length + " mentors on "+ cidade+ "</b>").openPopup();
                        
                   } else {
                       marker.setLatLng([lat, lon]).bindPopup("<b>" + json.length + " mentors on "+ cidade+ "</b>").openPopup();
                   }
                   
                   marker.off('click').on('click', function(e) {
                            show_modal(cidade, json);
                    });
               }
               
               myMap.setView([lat, lon], 11);
               
            });
            
        });
        
        
    });
    
});