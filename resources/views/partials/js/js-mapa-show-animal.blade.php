<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var animalLatitude = {!! json_encode($animal->latitude ?? null) !!};
    var animalLongitude = {!! json_encode($animal->longitude ?? null) !!};

    document.addEventListener('DOMContentLoaded', function () {
        var southWest = L.latLng(-21.465, -50.15);
        var northEast = L.latLng(-21.385, -49.99);
        var bounds = L.latLngBounds(southWest, northEast);

        var mapShow = L.map('mapa', {
            maxBounds: bounds,
            maxZoom: 18,
            minZoom: 12
        });

        mapShow.fitBounds(bounds); // Ajusta o mapa aos limites definidos

        if (animalLatitude !== null && animalLongitude !== null) {
            var markerShow = L.marker([animalLatitude, animalLongitude]).addTo(mapShow);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(mapShow);
        } else {
            var mapContainer = document.getElementById('mapa');
            mapContainer.innerHTML = "Não há coordenadas disponíveis para exibir o mapa.";
        }
    });
</script>
