<?php
// load up your config file
require_once("../resources/config.php");

require_once(TEMPLATES_PATH . "/header.php");

?>
<?php if(isset($_SESSION['id'])){                                                                                       //TODO make a change password change link and site, enter old , enter new twice
    include "profileInfo.php";                                                                                          //TODO COMMENT CODE
}else{
    echo "Signup or Login to see this profile.";
}
?>
<?php
require_once(TEMPLATES_PATH . "/footer.php");