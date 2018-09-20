var markersPersos = new L.LayerGroup();
mymap.on('click', addMarker);

function addMarker(e) {
	markersPersos.clearLayers();
    var marker = L.marker(e.latlng);
    marker.bindPopup("<div class='form-group' style='text-align : center'><h3 style='text-align : center;'>Proposer un hotel </h3><form method='post' action=''><input class='mb-2 form-control' type='text' name='nameHotel' placeholder='Nom de votre hôtel'><input class='mb-2 form-control' type='text' value='"+e.latlng.lat+"' name='lat'><input class='mb-2 form-control' type='text' value='"+e.latlng.lng+"' name='lng'><input class='mb-2 form-control-range form-control-file border' type='file' name='img'><button class='mb-2 btn btn-primary' type='submit'>Soumettre</button></form></div>");
    marker.addTo(markersPersos);
    markersPersos.addTo(mymap);
}