function choose_type_mentor(){
    if((document.querySelector('input[name=type_user]:checked').value)){
        document.getElementById('form_login').style.display = 'block'; 
        document.getElementById('label_mentor').style.display = 'block';
        document.getElementById('mentor').style.display = 'block';
    } 
}

function choose_type_student(){
    if((document.querySelector('input[name=type_user]:checked').value)){
        document.getElementById('form_login').style.display = 'block'; 
        document.getElementById('label_mentor').style.display = 'none';
        document.getElementById('mentor').style.display = 'none';
    }
}