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


function checkCheckBoxesTEMP()
{
	alert ("werkt test");
	var checkboxes = document.event-add.getElementsByTagName(\'input\');
	for(var i = 0; i < checkboxes.length; i++)
	{
		if (checkboxes[i].type.toLowerCase() == \'checkbox\' && checkboxes[i].checked)
		{
			alert ("Nice checkbox checked");
			return (true);
		}
	}
	alert ("No checkbox checked noob");
	return (false);
}

