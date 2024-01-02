<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<script>
    // Mapa edição animal
    document.addEventListener('DOMContentLoaded', function () {
        var southWest = L.latLng(-21.465, -50.15);
        var northEast = L.latLng(-21.385, -49.99);
        var bounds = L.latLngBounds(southWest, northEast);

        var defaultLatitude = {{ $animal->latitude }};
        var defaultLongitude = {{ $animal->longitude }};

        var map = L.map('map', {
            maxBounds: bounds,
            maxZoom: 18,
            minZoom: 12
        }).setView([defaultLatitude, defaultLongitude], 13); // Definindo a posição inicial do mapa com base nas coordenadas do animal

        var marker = L.marker([defaultLatitude, defaultLongitude]).addTo(map); // Adicionando marcador na posição do animal

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        map.on('click', function (e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;

            if (marker) {
                marker.setLatLng([lat, lng]);
            } else {
                marker = L.marker([lat, lng]).addTo(map);
            }
        });
    });
</script>
