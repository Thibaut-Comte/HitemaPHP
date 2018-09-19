<html>
<head>
  <title>A Leaflet map!</title>
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
  <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <style>
    #map{ height: 100% }
  </style>
</head>
<body>
 
  <div id="map"></div>
 
  <script>
 
  // initialize the map
  var map = L.map('map').setView([42.35, -71.08], 13);
 
  // load a tile layer
  L.tileLayer('http://tiles.mapc.org/basemap/{z}/{x}/{y}.png',
    {
      attribution: 'Tiles by <a href="http://mapc.org">MAPC</a>, Data by <a href="http://mass.gov/mgis">MassGIS</a>',
      maxZoom: 17,
      minZoom: 9
    }).addTo(map);
    

  $.getJSON("../leaflet/rodents.geojson",function(data){
    var ratIcon = L.icon({
      iconUrl: 'http://emassi.fr/wp-content/uploads/2017/10/Map-Marker-PNG-File.png',
      iconSize: [30,20]
    });
    L.geoJson(data,{
      pointToLayer: function(feature,latlng){
        var marker = L.marker(latlng,{icon: ratIcon});
        marker.bindPopup(feature.properties.Location + '<br/>' + feature.properties.OPEN_DT + "<br><button> Réserver </button>");
        return marker;
      }
    }).addTo(map);
  });
 
  </script>
</body>
</html>