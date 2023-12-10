import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Mapa leaflet
document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('map').setView([51.505, -0.09], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([51.5, -0.09]).addTo(map);
    var circle = L.circle([51.508, -0.11], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map);

    var polygon = L.polygon([
        [51.509, -0.08],
        [51.503, -0.06],
        [51.51, -0.047]
    ]).addTo(map);

    marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
    circle.bindPopup("I am a circle.");
    polygon.bindPopup("I am a polygon.");

    map.on('click', function (e) {
        var popup = L.popup()
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(map);
    });
});

// navbar
var navbar = document.querySelector('.fixed-nav');
    var navLinks = document.querySelectorAll('.nav-link');
    var threshold = 100;

    window.addEventListener('scroll', function() {
        if (window.scrollY > threshold) {
            navbar.style.backgroundColor = '#ccc';
            navLinks.forEach(function(link) {
                link.style.color = 'blue';
            });
        } else {
            navbar.style.backgroundColor = 'blue';
            navLinks.forEach(function(link) {
                link.style.color = 'white';
            });
        }
    });
