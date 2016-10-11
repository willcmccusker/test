<? $this->assign('title', "Atlas");?>

  <div id="worldmap"></div>

<script>

// L.mapbox.accessToken = 'pk.eyJ1Ijoid2lsbGNtY2N1c2tlciIsImEiOiJjaXF0c2hseGswMDZtZnhuaHlwdmdiOXM1In0._0qo-NTp7TGotAhL6sa4Og';
$(document).ready(function(){

  bounds = new L.LatLngBounds(new L.LatLng(-90, -180), new L.LatLng(90, 180));

var map = L.map('worldmap', {
  maxZoom : 5,
  minZoom : 2,
  scrollWheelZoom : false,
  maxBounds: bounds,
  maxBoundsViscosity: 1
}).setView([36, 0], 3);

var activeId = null;

function getColor(name) {
  return name == 0 ? 'black' :
         name == 1 ? '#7FDDC3' : // East Asia
         name == 2 ? '#D58899' : // Northern Eurasia
         name == 3 ? '#A1E9A5' : // North America
         name == 4 ? '#C79CBE' : // South America
         name == 5 ? '#CE7D71' : // North Africa
         name == 6 ? '#D7EE89' : // Middle East
                     '#85CBD7';  // South Africa
}


function regionStyle(feature) {
  return {
    fillColor: getColor(feature.properties.REGION),
    weight: 1,
    opacity: 1,
    color: 'white',
    fillOpacity: 0.5
  };
}


var outline = L.tileLayer('/tiles/show/all/world/world/{z}/{x}/{y}.png', {tms: true}).addTo(map);

L.geoJson(<?= $points ?>, {
  pointToLayer: function (feature, latlng) {
    return L.circleMarker(latlng, {
      radius: 4,
      stroke: false,
      fillOpacity:1,
      fillColor: '#666'
    });
  },
  onEachFeature: function (feature, layer) {
    var cityName = feature.properties.City;
    var href = '/cities/view/' + feature.properties.slug;

    layer.bindPopup('<p><a href=\"' + href + '\">' + cityName + ", "+ feature.properties.Country + "</a></p>");
    layer.on('mouseover click', function(e) {
      e.target.feature.properties.active = true;
      layer.openPopup();
    });
  }
}).addTo(map);
});
</script>
