<?php
// load up your config file
require_once("../resources/config.php");

require_once(TEMPLATES_PATH . "/header.php");
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div id="container">
        <div id="content">
            <?php
            echo $_SESSION['id'] . "<br>";
            $user = $_GET['user'];
            echo $user . " AFASDFASDFASDFASDF <br>";
            $query = db::instance()->get("SELECT * FROM users WHERE username = ?",array($user));
            var_dump($query);
            echo "var postal =" . $query[0]["postal"] . ";";
            ?>
            <script>
                var postal = '<?php echo $query[0]['postal'] ?>';
            </script>
            <table>
                <tr>
                    <td>
                        First Name & Last Name
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                </tr>
                <tr>
                    <td>
                        Password
                    </td>
                </tr>
                <tr>
                    <td>
                        First Name & Last Name
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="map"></div>
    <script>
        // This example creates a simple polygon representing the Bermuda Triangle.

        $(document).ready(function () {
            // Request from google api a location based on a zip code in finland
            $.get('https://maps.googleapis.com/maps/api/geocode/json', {address: postal, components: "country:Finland", key: 'AIzaSyAlpvlB0VK_O7RgtcaNHL52NxwjKJ_hOII'}, function (response) {
                // pick out the lat and lng coordinates
                var coords = response.results[0].geometry.location;
                //initiate the map with coords
                initMap(coords);
            });
        });

        function initMap(coords) {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: coords,
                mapTypeId: 'terrain'
            });

            var circle = new google.maps.Circle({
                map: map,
                center: coords,
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                radius: 1500
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlpvlB0VK_O7RgtcaNHL52NxwjKJ_hOII&callback=initMap"
            async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
require_once(TEMPLATES_PATH . "/footer.php");