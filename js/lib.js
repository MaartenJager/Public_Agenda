function toggleVisibility(id) {
   var e = document.getElementById(id);
   if(e.style.display == 'block')
      e.style.display = 'none';
   else
      e.style.display = 'block';
}

function checkPasswords(form){
    if(form.password.value != form.password2.value) {
        alert("Passwoord niet in beide velden gelijk!");
        return false;
    }    
}


