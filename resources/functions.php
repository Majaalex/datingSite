
<?php


function url_for($script_path){
    //add the leading '/' if not present
    if($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}
function u($string=""){
    return urlencode($string);
}

function raw_u($string=""){
    return rawurlencode($string);
}

function h($string="")
{
    return htmlspecialchars($string);
}

// takes a preference (1, 2, 4
function browseQuery($pref, $offset, $rowsPerPage, $order){
    switch ($pref){
        case 1:
            $count = db::instance()->count("
            SELECT id 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ?)
            AND age > ?
            AND age < ?
            AND (preference = 1 OR preference = 3 OR preference = 5 OR preference = 7)
            LIMIT $offset, $rowsPerPage",
                array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));

            $array = db::instance()->get("
            SELECT firstname,lastname,username, email, salary,about 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ? )
            AND age > ?
            AND age < ?
            AND (preference = 1 OR preference = 3 OR preference = 5 OR preference = 7)
            ORDER BY $order 
            LIMIT $offset, $rowsPerPage",
                array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));
            return array($count, $array);
            break;
        case 2:
            $count = db::instance()->count("
            SELECT id 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ?)
            AND age > ?
            AND age < ?
            AND (preference = 2 OR preference = 3 OR preference = 6 OR preference = 7)
            LIMIT $offset, $rowsPerPage",
                array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));

            $array = db::instance()->get("
            SELECT firstname,lastname,username, email, salary,about 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ? )
            AND age > ?
            AND age < ?
            AND (preference = 2 OR preference = 3 OR preference = 6 OR preference = 7)
            ORDER BY $order 
            LIMIT $offset, $rowsPerPage",
                array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));
            return array($count, $array);
            break;
        case 4:
            $count = db::instance()->count("
            SELECT id 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ?)
            AND age > ?
            AND age < ?
            AND (preference = 4 OR preference = 5 OR preference = 6 OR preference = 7)
            LIMIT $offset, $rowsPerPage",
                array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));

            $array = db::instance()->get("
            SELECT firstname,lastname,username, email, salary,about 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ? )
            AND age > ?
            AND age < ?
            AND (preference = 4 OR preference = 5 OR preference = 6 OR preference = 7)
            ORDER BY $order 
            LIMIT $offset, $rowsPerPage",
                array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));
            return array($count, $array);
            break;
    }
}

function initialCountQueryAll($pref){
    switch ($pref){
        case 1:
            $count = db::instance()->count("
            SELECT id 
            FROM users
            WHERE (preference = 1 OR preference = 3 OR preference = 5 OR preference = 7)",
                array("0"));
            return $count;
            break;
        case 2:
            $count = db::instance()->count("
            SELECT id 
            FROM users
            WHERE (preference = 2 OR preference = 3 OR preference = 6 OR preference = 7)",
                array("0"));
            return $count;
            break;
        case 4:
            $count = db::instance()->count("
            SELECT id 
            FROM users
            WHERE (preference = 4 OR preference = 5 OR preference = 6 OR preference = 7)",
                array("0"));
            return $count;
            break;

    }
}

function initialCountQueryFilter($pref){
    switch ($pref){
        case 1:
            $count = db::instance()->count("
            SELECT id 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ?)
            AND age > ?
            AND age < ?
            AND (preference = 1 OR preference = 3 OR preference = 5 OR preference = 7)",
                array($_GET['minSalary'], $_GET['maxSalary'], $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));
            return $count;
            break;
        case 2:
            $count = db::instance()->count("
            SELECT id 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ?)
            AND age > ?
            AND age < ?
            AND (preference = 2 OR preference = 3 OR preference = 6 OR preference = 7)",
                array($_GET['minSalary'], $_GET['maxSalary'], $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));
            return $count;
            break;
        case 4:
            $count = db::instance()->count("
            SELECT id 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ?)
            AND age > ?
            AND age < ?
            AND (preference = 4 OR preference = 5 OR preference = 6 OR preference = 7)",
                array($_GET['minSalary'], $_GET['maxSalary'], $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));
            return $count;
            break;

    }
}