// Initialize and add the map
function initMap() {
    // The location
    const hec = { lat: 28.6005, lng: -81.1976 };
    const psy = { lat: 28.6051, lng: -81.1993 };
    // The map, centered at ucf
    const map = new google.maps.Map(document.getElementById("map_canvas"), {
      zoom: 14.5,
      center: hec,
    });
    const map2 = new google.maps.Map(document.getElementById("map_canvas2"), {
      zoom: 14.5,
      center: psy,
    });
    // The marker, positioned at ucf
    const marker = new google.maps.Marker({
      position: hec,
      map: map,
    });
    const marker2 = new google.maps.Marker({
      position: psy,
      map: map2,
    });
  }