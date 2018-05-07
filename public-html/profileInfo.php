<div id="container">
    <div id="content">
        <?php
        //echo $_SESSION['id'];
        $query = db::instance()->get("SELECT * FROM users WHERE username = ?",array($_GET['user']));
        //var_dump($query);
        ?>
        <table>
            <tr>
                <td>
                    First Name & Last Name : <?php echo $query[0]["firstname"] ." ". $query[0]["lastname"] ; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email : <?php echo $query[0]["email"]; ?>
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