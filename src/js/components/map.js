import mapboxgl from 'mapbox-gl'


const el = document.createElement('img');
const iconMap = document.querySelector('#project-map').getAttribute('data-icon')
const lat = document.querySelector('#project-map').getAttribute('data-lat')
const lng = document.querySelector('#project-map').getAttribute('data-lng')

mapboxgl.accessToken = 'pk.eyJ1IjoiYWxzaGNoZXRpbmluIiwiYSI6ImNqNHRtYXppZjA2NHEzMm54enZzdGo5czgifQ.MQGFzuBObNY8TSB9HlqzUw';
const map = new mapboxgl.Map({
container: 'project-map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [lng, lat], // starting position [lng, lat]
zoom: 14 
});

el.className = 'marker';
el.setAttribute('src',iconMap)
el.setAttribute('width','50px')
el.setAttribute('height','50px')
el.style= 'border-radius: 500px'
const marker = new mapboxgl.Marker(el)
  .setLngLat([lng, lat])
  .addTo(map);
