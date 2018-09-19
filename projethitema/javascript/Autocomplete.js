function Autocomplete()
{
	var RechercheAutocomplete= document.getElementById('Ville');
	var ul=document.getElementById("ulAutocomplete");

	RechercheAutocomplete.addEventListener('keyup',function(){
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
	    
	    if (this.readyState == 4 && this.status == 200) {
	      console.log(this.responseText);  // Le retour affiche la page ou s'execute la requete, si etatRequete== 4 c'est bon ca a executé
	  	  ul.style.display = 'block';
	  	  ul.innerHTML=this.responseText;
	  	  var Li=document.querySelectorAll('#liAutocomplete');

	  	  for(var i=0; i<=Li.length; i++)
	  	  {

	  	  	Li[i].addEventListener('click', function(e){

       
                RechercheAutocomplete.value=e.target.innerHTML;
                ul.style.display= 'none';

	  	  	})

	  	  }




	    }
	  };
	
	var Value= encodeURIComponent(this.value);
	if(Value!="")
	{
		
		xhr.open("POST", "Autocomplete.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("AutocompleteValue="+Value);
	}
	else
	{
		 ul.style.display= 'none';
	}
	})
}