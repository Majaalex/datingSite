<?php
// load up your config file
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div id="container">
        <div id="content">
            <div class="centered">
                <?php
                //Get user and make a query of the users information
                $user = $_GET['user'];
                $query = db::instance()->get("SELECT firstname,lastname,postal,email,about,age,salary,gender,preference,currency FROM users WHERE username = ?",array($user));
                ?>
                <script>
                    var postal = '<?php echo $query[0]['postal'] ?>';
                </script>
                <!--Table with a persons information-->
                <table>
                    <tr>
                        <td>
                            First Name & Last Name : <?php echo $query[0]["firstname"] ." ". $query[0]["lastname"] ; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>        <!--If not logged in, then the person cannot se the email address-->
                            Email : <?php if(isset($_SESSION['id'])){ echo $query[0]["email"];}else{ echo "<a href ='" . url_for("login.php") . "'>Login to see this persons email</a>";} ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Postal : <?php echo $query[0]["postal"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            About : <?php echo $query[0]["about"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Age : <?php echo $query[0]["age"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Salary : <?php echo $query[0]["salary"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Currency : <?php echo $query[0]["currency"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gender : <?php echo $query[0]["gender"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Preference :
                            <?php $pref = $query[0]["preference"];
                            if($pref == 1){
                                echo "Male";
                            }elseif ($pref == 2){
                                echo "Female";
                            }
                            elseif ($pref == 3){
                                echo "Male and Female";
                            }
                            elseif ($pref == 4){
                                echo "Other";
                            }
                            elseif ($pref == 5){
                                echo "Male and Other";
                            }
                            elseif ($pref == 6){
                                echo "Female and Other";
                            }
                            elseif ($pref == 7){
                                echo "Male, Female and Other";
                            }
                            else{
                                echo "Not interested in anything";
                            }; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($_SESSION['id'])&& $_SESSION['id'] == $_GET['user']){echo "<a href ='" . url_for("profileEdit.php") . "'>Edit</a>";} ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($_SESSION['id'])&& $_SESSION['id'] == $_GET['user']){echo "<a href ='" . url_for("profileEditPass.php") . "'>Change password</a>";} ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div id="map" class="centered"></div>
    <div class="centered">
        <table id="POIList">
            <tr>
                <th>Places of interest:</th>
            </tr>
        </table>
    </div>
    <script>
        // This example creates a simple polygon representing the Bermuda Triangle.
        $(document).ready(function () {
            // Request from google api a location based on a zip code in finland
            $.get('https://maps.googleapis.com/maps/api/geocode/json', {address: postal, components: "country:Finland", key: 'AIzaSyAlpvlB0VK_O7RgtcaNHL52NxwjKJ_hOII'}, function (response) {
                // pick out the lat and lng coordinates
                var coords = response.results[0].geometry.location;
                //initiate the map with coords
                initMap(coords);
                getVenues(coords);
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

        function getVenues(coords){
            console.log(coords);
            // Build the get varible query
            //var query = "boundary.circle.lat=" + coords.lat + "&boundary.circle.lon=" + coords.lng + "&layers=venue&size=20&sources=osm" ;
            var query = "boundary.circle.lat=" + coords.lat + "&boundary.circle.lon=" + coords.lng + "&boundary.circle.radius=5" ;
            // Send the request
            console.log('https://api.digitransit.fi/geocoding/v1/search?text=cafe&' + query );
            $.get('https://api.digitransit.fi/geocoding/v1/search?text=cafe&' + query, function (respon) {
                for (var i = 0; i < 20; i++){
                    console.log(respon.features[i].properties.label);
                    console.log(i);
                    $('#POIList tr:last').after('<tr><td>' + respon.features[i].properties.label + '</td><tr>')
                }
            })
            $.get('https://api.digitransit.fi/geocoding/v1/search?text=restaurant&' + query, function (respo) {
                for (var i = 0; i < 20; i++){
                    console.log(respo.features[i].properties.label);
                    console.log(i);
                    $('#POIList tr:last').after('<tr><td>' + respo.features[i].properties.label + '</td><tr>')
                }
            })
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlpvlB0VK_O7RgtcaNHL52NxwjKJ_hOII&callback=initMap"
            async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
require_once(TEMPLATES_PATH . "/footer.php");