//Fichier à placé dans une balise script sous la popup modal de map.php
//Instance de la map
var mymap = L.map('mapid', { minZoom :2 ,zoomSnap: 0.25});

mymap.setView([45,12],4);

var marqueurs = [];

var lgMarkers = new L.LayerGroup();
var xhr = new XMLHttpRequest();

var Icon= L.icon({
	iconUrl:'https://gemeinde-lambrechtshagen.de/wp-content/uploads/Objektveranwortlicher.png',
	iconSize:  [30,30]
});
	     	
var southWest = L.latLng(-89.98155760646617, -180),
northEast = L.latLng(89.99346179538875, 180);
var bounds = L.latLngBounds(southWest, northEast);

mymap.setMaxBounds(bounds); 

init();

mymap.on('drag', onDrag);
mymap.on('movestart', onStart);
mymap.on('moveend', onEnd);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	maxZoom: 18,
	id: 'mapbox.streets',
	accessToken: 'pk.eyJ1IjoidGNvbXRlIiwiYSI6ImNqbTYwejkwdzAzc2QzcW54cDdkdGE1ZnYifQ.ckjNHA2niw5ZOpo8WkPRnw'
}).addTo(mymap);


function init()
{
  xhr.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      ReturnMapMarker=JSON.parse(this.responseText);  // Le retour affiche la page ou s'execute la requete, si etatRequete== 4 c'est bon ca a executé

      if(ReturnMapMarker)
      {
      	getMarkers();
      }
    }
  };
  
 xhr.open("GET", "apiMain.php?action=get_list_articles", true);
 xhr.send(null);

}

function GetNameMap() {

var boutonRechercher=document.querySelector('#ValidationRequete'); // ton bouton ou tu veux executer ton ajax

	boutonRechercher.addEventListener('click', function(e)
	{

		e.preventDefault();
	  var xhr = new XMLHttpRequest();
	  xhr.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     ReturnMapMarker=JSON.parse(this.responseText);  // Le retour affiche la page ou s'execute la requete, si etatRequete== 4 c'est bon ca a executé
	     if(ReturnMapMarker)
	     {
	     	onStart();
	     	if(ValeurEnvoie=="")
	     	{
	     		mymap.flyTo([45,12],4);
	     	}
	     	else
	     	{
	     		mymap.flyTo([ReturnMapMarker[0].Latitude,ReturnMapMarker[0].Longitude],8.5)
	     	}
	     	getMarkers();
	     }	
	    }
	  };

	  var ValeurEnvoie=encodeURIComponent(document.getElementById('Ville').value);
		if(ValeurEnvoie=="")
		{
			xhr.open("GET", "apiMain.php?action=get_list_articles", true);
		}
		else
		{
			 xhr.open("GET", "apiMain.php?action=get_article_by_Localisation&Localisation="+ValeurEnvoie+"", true);
		}
	  
 	  xhr.send(null);
	})
}


function getMarkers() {
	marqueurs=[];	
	for(var value of ReturnMapMarker)
	{					
				latlng=[value.Latitude, value.Longitude];	
				var marker = L.marker(latlng, {icon: Icon});
				marker.bindPopup("<div ><center><h1>Réservation </h1></center><form action='Reservation.php' method ='post'><center><strong><label name='Hotel'>"+value.Name+"</label></strong><br><img  width='200px' height='100px' src='../imgHotel/"+value.Image+"'></center><hr><div class='row'><div class='col'><input type ='date' class='form-control' name='dateArrivee'></div><div class='col'><input type ='date' class='form-control' name='dateDepart' ></div></div></br><input type ='number' name='nbVoyageurs' class='form-control' placeholder='Nombre de personnes' min=1><br><center><button type ='button' class='btn btn-primary bnt-lg' id='Reservation'  onclick='Reservation' > Réserver </button></center></form></div>");
				//marker.bindPopup("<div class='card' style='width: 210%;border:none;'><center><img src='../imgHotel/Paris1Picture.jpg'  height='100px' width='100px'></center><div class='card-body'><h5 class='card-title'>Au Belvédére</h5><hr><p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p><div class='row'><div class='col'><input type ='date' class='form-control' name='dateArrivee'></div><div class='col'><input type ='date' class='form-control' name='dateRentree' ></div></div></br><input type ='number' name='nbVoyageurs' class='form-control' placeholder='Nombre de personnes' min=1><br><center><a href='#' class='btn btn-primary' style='color: # fff;'>Go somewhere</a></div></div>");
	
			marqueurs.push(marker);

				
	
	}
	afficher();
}	

function afficher() {			

	var east = mymap.getBounds().getEast();
	var west = mymap.getBounds().getWest();
	var north = mymap.getBounds().getNorth();
	var south = mymap.getBounds().getSouth();
	lgMarkers.clearLayers();
	for (var i = 0; i < marqueurs.length; i++) {

		if (marqueurs[i]._latlng.lat <= north && marqueurs[i]._latlng.lat >= south && marqueurs[i]._latlng.lng <= east && marqueurs[i]._latlng.lng >= west) {

			marqueurs[i].addTo(lgMarkers);

		}
	}

	lgMarkers.addTo(mymap);

}

//jqdhjvefjefn;f



function onStart(e) {
	mymap.removeLayer(lgMarkers);
}

function onEnd(e) {
	afficher();
}
function onDrag(e) {
    mymap.panInsideBounds(bounds, { animate: false });
};

GetNameMap();


