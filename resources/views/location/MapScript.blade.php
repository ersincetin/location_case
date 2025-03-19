<script>
    let marker = undefined;
    let latitude = undefined;
    let longitude = undefined;

    function GoogleMap(latitude, longitude, zoomInput = 5, title = null, markerColor = 'red') {
        var mapProp = {
            center: new google.maps.LatLng(latitude, longitude),
            zoom: zoomInput,
            mapTypeId: 'hybrid',
            mapId: '90aa7b32be93ed8c'
        };
        let map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        const markerIcon = document.createElement('div');
        markerIcon.innerHTML = '<i class="fa fa-map-marker fa-3x" aria-hidden="true" style="color: ' + markerColor + '"></i>';

        marker = new google.maps.marker.AdvancedMarkerElement({
            position: new google.maps.LatLng(latitude, longitude),
            map: map,
            title: title,
            content: markerIcon
        });
        marker.content.style.color = markerColor;
        google.maps.event.addListener(map, 'click', function (me) {
            var result = [me.latLng.lat(), me.latLng.lng()];
            transition(result);
        });
    }

    let numDeltas = 100;
    let delay = 10; //milliseconds
    let i = 0;
    let deltaLat;
    let deltaLng;

    function transition(result) {
        i = 0;
        deltaLat = (result[0] - latitude) / numDeltas;
        deltaLng = (result[1] - longitude) / numDeltas;
        moveMarker();
    }

    function moveMarker() {
        latitude += deltaLat;
        longitude += deltaLng;
        marker.position = new google.maps.LatLng(latitude, longitude);
        if (i != numDeltas) {
            i++;
            setTimeout(moveMarker, delay);
            $('[name="latitude"]').val(latitude);
            $('[name="longitude"]').val(longitude);
        }
    }

    function initMap() {
        latitude = document.getElementById('latitude').value.split(' ').join('').length > 0 ? document.getElementById('latitude').value : 39.000000000000000;
        longitude = document.getElementById('longitude').value.split(' ').join('').length > 0 ? document.getElementById('longitude').value : 35.000000000000000;
        GoogleMap(latitude, longitude);
    }
</script>
