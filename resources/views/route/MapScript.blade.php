<script>
    let marker = undefined;
    let latitude = undefined;
    let longitude = undefined;
    let markers = [];

    function GoogleMap(data) {
        var mapProp = {
            center: new google.maps.LatLng(39.00, 35.00),
            zoom: 5,
            mapTypeId: 'hybrid',
            mapId: '90aa7b32be93ed8c'
        };
        let map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        data.forEach((value) => {
            const markerIcon = document.createElement('div');
            markerIcon.innerHTML = '<i class="fa fa-map-marker fa-3x" aria-hidden="true" style="color: ' + value.marker_color + '"></i>';

            marker = new google.maps.marker.AdvancedMarkerElement({
                position: new google.maps.LatLng(parseFloat(value.latitude), parseFloat(value.longitude)),
                map: map,
                title: value.name,
                content: markerIcon
            });
            markers.push(marker);
        });
        google.maps.event.addListener(map, 'click', function (me) {
            var result = [me.latLng.lat(), me.latLng.lng()];
            transition(result);
        });
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
    }

    function initMap() {
        latitude = document.getElementById('latitude').value.split(' ').join('').length > 0 ? document.getElementById('latitude').value : 39.000000000000000;
        longitude = document.getElementById('longitude').value.split(' ').join('').length > 0 ? document.getElementById('longitude').value : 35.000000000000000;
        listLocation();
    }

    function calculateRoute(latitude = null, longitude = null) {
        const apiKey = 'AIzaSyBSXcawvXc9FJ3FQkIUcUiduiVdmw1PHf8';
        var mapProp = {
            center: new google.maps.LatLng(39.00, 35.00),
            zoom: 5,
            mapTypeId: 'hybrid',
            mapId: '90aa7b32be93ed8c'
        };
        let map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        const inputLocation = new google.maps.LatLng(latitude, longitude);
        const sortedMarkers = markers
            .map(marker => {
                const distance = google.maps.geometry.spherical.computeDistanceBetween(inputLocation, marker.position);
                marker['distance'] = distance;
                return marker;
            })
            .sort((a, b) => {
                a.distance - b.distance
            });
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer({map: map});

        const origin = {lat: 41.0082, lng: 28.9784};
        const destination = {lat: 36.8969, lng: 30.7133};

        const waypoints = sortedMarkers.map(marker => ({location: marker.position, stopover: true}));

        directionsService.route({
            origin: origin,
            destination: destination,
            waypoints: waypoints,
            travelMode: google.maps.TravelMode.DRIVING,
            optimizeWaypoints: true
        }, (response, status) => {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
            } else {
                console.error("Rota oluşturulamadı: " + status);
            }
        });
    }

    function listLocation() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('location/list')}}",
            type: 'POST',
            dataType: 'JSON',
            success: function (data) {
                if (data != undefined && data != null) {
                    GoogleMap(data);
                }
            }
        });
    }
</script>
