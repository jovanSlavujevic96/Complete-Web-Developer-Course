/*
 * ADD MARKER TO YOUR GOOGLE MAPS
 * https://developers.google.com/maps/documentation/javascript/adding-a-google-map
 */
/* standard map */
// function initMap() {
//     // The location of Uluru
//     const uluru = { lat: 51.5074, lng: 0.1278 }; /*London*/
//     // The map, centered at Uluru
//     const map = new google.maps.Map(document.getElementById("map"), {
//         zoom: 8,
//         center: uluru,
//     });
//     // The marker, positioned at Uluru
//     const marker = new google.maps.Marker({
//         position: uluru,
//         map: map,
//     });
// }

/*
 * STYLING YOUR GOOGLE MAPS
 * https://developers.google.com/maps/documentation/javascript/styling
 * https://developers.google.com/maps/documentation/cloud-customization/overview
 */
// function initMap() {
//     new google.maps.Map(document.getElementById("map"), {
//         mapId: "8e0a97af9386fef",
//         center: { lat: 48.85, lng: 2.35 },
//         zoom: 12,
//     });
// }

/*
 * USER GEOLOCATION
 * https://developers.google.com/maps/documentation/javascript/geolocation
 */
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 6,
    });
    infoWindow = new google.maps.InfoWindow();

    const locationButton = document.createElement("button");

    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
}
