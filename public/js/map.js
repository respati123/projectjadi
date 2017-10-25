function InitMap(){

  var uluru = {lat: -25.363, lng: 131.044};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: uluru
  });
  


  var input = document.getElementById('autocomplete');

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infoWindow  = new google.maps.InfoWindow();
  var marker      = new google.maps.Marker({

    map:map,
    anchorPoint: new google.maps.Point(0. -29)

  });

  autocomplete.addListener('place_changed', function(){
    infoWindow.close();
    marker.setVisible(false);
    var place     = autocomplete.getPlace();
    if(!place.geometry) {
      window.alert(" No details available for input");

      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);
    var address = '';
      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }

      infoWindow.setContent('<div><strong>' + place.name + '</strong><br>' + place.geometry.location.lat(), place.geometry.location.lng() );
      infoWindow.open(map, marker);

     document.getElementById('lat').value = place.geometry.location.lat();
     document.getElementById('lng').value = place.geometry.location.lng();
  
    });



}