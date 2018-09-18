//Fichier à placé dans une balise script sous la popup modal de map.php
//Instance de la map
var mymap = L.map('mapid').setView([45, 12], 5);

var marqueurs = [];

var lgMarkers = new L.LayerGroup();

getMarkers();

mymap.on('movestart', onStart);
mymap.on('moveend', onEnd);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	maxZoom: 18,
	id: 'mapbox.streets',
	accessToken: 'pk.eyJ1IjoidGNvbXRlIiwiYSI6ImNqbTYwejkwdzAzc2QzcW54cDdkdGE1ZnYifQ.ckjNHA2niw5ZOpo8WkPRnw'
}).addTo(mymap);	

function getMarkers() {

	$.getJSON(m"ap.geojson",function(data){

		L.geoJson(data,{
			pointToLayer: function(feature,latlng){				
				var marker = L.marker(latlng);
				marker.bindPopup("<div style='width: 150%;'><center><h1>Réservation </h1></center><hr><form action = '' method = 'post'><center>Hotel N° <strong><label>"+feature.id+"</label></strong></center><div class='row'><div class='col'><input type ='date' class='form-control' name='dateArrivee'></div><div class='col'><input type ='date' class='form-control' name='dateRentree' ></div></div></br><input type ='number' name='nbVoyageurs' class='form-control' placeholder='Nombre de personnes' min=1><br><center><button type = 'submit' class='btn btn-primary bnt-lg'> Réserver </button></center></form></div>");
				marqueurs.push(marker);
				return marker;
			}
			
		}); afficher();
		
	});
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

function onStart(e) {
	mymap.removeLayer(lgMarkers);
}

function onEnd(e) {
	afficher();
}

