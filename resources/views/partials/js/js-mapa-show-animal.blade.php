<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var animalLatitude = {!! json_encode($animal->latitude ?? null) !!};
    var animalLongitude = {!! json_encode($animal->longitude ?? null) !!};

    document.addEventListener('DOMContentLoaded', function () {
        if (animalLatitude !== null && animalLongitude !== null) {
            var mapShow = L.map('mapa', {
                maxZoom: 18,
                minZoom: 12
            }).setView([animalLatitude, animalLongitude], 13);

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
