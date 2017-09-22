function initAutocomplete() {
    var input = document.getElementById('location');
    var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(20.5937, 78.9629));
        var searchBox = new google.maps.places.SearchBox(input, {bounds: defaultBounds});
            
        searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
            }
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
            }
        });
    });
  }