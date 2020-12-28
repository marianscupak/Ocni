var center = SMap.Coords.fromWGS84(18.2813425, 49.8490075);
var m = new SMap(JAK.gel("map"), center, 16);
m.addDefaultLayer(SMap.DEF_BASE).enable();
m.addDefaultControls();

var layer = new SMap.Layer.Marker();
m.addLayer(layer);
layer.enable();

var options = {};
var marker = new SMap.Marker(center, 'marker', options);
layer.addMarker(marker);