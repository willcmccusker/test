<? $this->assign('title', "Home");?>
<div class='position-relative'>
	<div id="worldmap"></div>
  <div class='logos'>
    <div class='logologo'><div></div></div>
    <div class='logologo'><div></div></div>
    <div class='logologo'><div></div></div>
  </div>
  <div class='site-info hide-on-desktop show-on-mobile grid'>
    <div class='col-1-1'>
    El <b>Atlas de Expansión Urbana</b> recopila y analiza datos sobre la cantidad y la calidad de la expansión urbana en una grupo de municipios Colombianos. Dicho estudio complementará el recientemente uno recientemente realizado utilizando la misma metodología del estudio global estratificada de <a href='/ciudades'>200</a> ciudades.
    </div>
  </div>
</div>
<script>

// L.mapbox.accessToken = 'pk.eyJ1Ijoid2lsbGNtY2N1c2tlciIsImEiOiJjaXF0c2hseGswMDZtZnhuaHlwdmdiOXM1In0._0qo-NTp7TGotAhL6sa4Og';

var startFrontMap = function(){
  var x = document.getElementById("demo");
    if (navigator.geolocation.position) {
        lat = navigator.geolocation.position.coords.latitude;
        long = navigator.geolocation.position.coords.longitude;
    } else {
    	//new york
      lat = 40.717;
      long = -74.004;

      lat = 3;
      long = -73;
      // lat = 26;
      // long = 8;
    }


  bounds = new L.LatLngBounds(new L.LatLng(-66, -200), new L.LatLng(79, 200));

  var map = L.map('worldmap', {
    maxZoom : 7,
    minZoom : 5,
    // scrollWheelZoom : false,
    zoomControl: false,
    maxBounds: bounds,

    maxBoundsViscosity: 1,
    attribution: {
      prefix: false
    }
  }).setView([lat, long], 5);

  L.mapbox.styleLayer('mapbox://styles/willcmccusker/cj1p6wvk000552ro5lfefr4wc').addTo(map)
  L.tileLayer('http://atlasexpansionurbanacolombia.org/tiles/show/All/world/world/{z}/{x}/{y}.png', {tms: true}).addTo(map);


  new L.Control.Zoom({ position: 'bottomright' }).addTo(map)
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


  var outline = L.tileLayer('http://atlasofurbanexpansion.org/tiles/show/All/world/world/{z}/{x}/{y}.png', {tms: true}).addTo(map);

  L.geoJson(<?= $points ?>, {
    pointToLayer: function (feature, latlng) {
      return L.circleMarker(latlng, {
        radius: 2,
        stroke: false,
        fillOpacity:1,
        fillColor: '#F00'
      });
    },
    onEachFeature: function (feature, layer) {
      var cityName = feature.properties.City;
      var href = '/cities/view/' + feature.properties.slug;

      layer.bindPopup('<p><a href=\"' + href + '\">' + cityName + ", "+ feature.properties.Country + "</a></p>");
      layer.on('mouseover', function(e) {
        e.target.feature.properties.active = true;
        layer.openPopup();
      });
      layer.on('click', function(e){
      	window.location = href;
      });
    }
  }).addTo(map);
}
// if (document.readyState === 'complete' || document.readyState !== 'loading') {
//   startFrontMap();
// } else {
//   document.addEventListener('DOMContentLoaded', startFrontMap);
// }
</script>
