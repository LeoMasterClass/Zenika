window.onload = function() {
    L.mapquest.key = 'lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24';
    var baseLayer = L.mapquest.tileLayer('map');

    var map = L.mapquest.map('map', {
      center: [47.643504, -2.774895],
      layers: L.mapquest.tileLayer('map'),
      zoom: 16
    });

    var customIcon = L.mapquest.icons.circle({
      primaryColor: '#3b5998'
    });

    L.control.layers({
      'Map': baseLayer,
      'Hybrid': L.mapquest.tileLayer('hybrid'),
      'Satellite': L.mapquest.tileLayer('satellite'),
      'Light': L.mapquest.tileLayer('light'),
      'Dark': L.mapquest.tileLayer('dark'),
      'marker': L.mapquest.tileLayer('Default')
    }).addTo(map);
  }