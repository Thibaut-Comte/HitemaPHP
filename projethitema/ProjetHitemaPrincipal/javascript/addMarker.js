var markersPersos = new L.LayerGroup();
mymap.on('click', addMarker);

function addMarker(e) {
	markersPersos.clearLayers();
    var marker = L.marker(e.latlng);
    marker.bindPopup("<div class='form-group' style='text-align : center;width:100%;'><h3 style='text-align : center;'>Proposer une location </h3><form method='post' action='InsertNewMarker.php'><input class='mb-2 form-control' type='text' name='nameHotel' placeholder='Nom de votre hôtel' required><input class='mb-2 form-control' type='text' name='villeHotel' placeholder='Ville' required><input class='mb-2 form-control' type='number' value='"+e.latlng.lat+"' name='lat' required /><input class='mb-2 form-control' type='number' value='"+e.latlng.lng+"' name='lng' required /><input class='mb-2 form-control-range form-control-file border' type='file' name='img'><button class='mb-2 btn btn-primary' type='submit' name='ValidMarker'>Soumettre</button></form></div>");
    marker.addTo(markersPersos);
    markersPersos.addTo(mymap);
}