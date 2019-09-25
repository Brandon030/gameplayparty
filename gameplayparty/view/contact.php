<div class="row center-xs middle-xs">

    <div class="col-xs-12 col-md-12 contact-service">
        <h1>Service</h1>
        <p> Vragen? Neem contact met ons op. </p>
    </div>

    <div class="col-xs-12 col-md-6 contact-info">
        <h1>Contact info</h1>
        <ul>
            <li>Utrecht</li>
            <li>lorem ipsum</li>
            <li>1111AA</li>
            <li>hanneke@loremipsum.com</li>
            <li>061234566</li>

        </ul>
    </div>

    <div class="col-xs-12 col-md-6 contact-image">
        <img src="./assets/img/customer.png" alt="customer">
    </div>



    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>
    </head>
    <body>
    <h3>Locatie</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: -25.344, lng: 131.036};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 4, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>


</div>
