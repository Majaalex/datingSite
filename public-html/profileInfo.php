<?php
// load up your config file
require_once("../resources/config.php"); //TODO DELETE THIS FROM FINAL PROJECT. OLD AND NOT CONNECTED TO ANYTHING
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div id="container">
        <div id="content">
            <?php
            $user = $_GET['user'];
            $query = db::instance()->get("SELECT * FROM users WHERE username = ?",array($user));

            ?>
            <script>
                var postal = '<?php echo $query[0]['postal'] ?>';
            </script>
            <table>
                <tr>
                    <td>
                        First Name & Last Name : <?php echo $query[0]["firstname"] ." ". $query[0]["lastname"] ; ?>
                    </td>
                </tr>
                <tr>
                    <td>
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
