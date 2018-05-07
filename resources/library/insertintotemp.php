<?php
for ($i = 0; $i < 100; $i++){
    $user = "user" . "$i";
    $firstName = $user;
    $lastName = $user;
    $pass = $user;
    $email = "$user@yahoo.cooo";
    $salary = rand(100,2000000);
    $currency = "USD";
    $genNum = rand(1,3);
    switch ($genNum){
        case 1:
            $gender = "male";
            break;
        case 2:
            $gender = "female";
            break;
        case 3:
            $gender = "other";
            break;
    }
    $about = "$user has a big donger";
    $postal = "00700";
    $age = rand(20,50);
    $num = rand(1,7);
    switch ($num){
        case 1:
            $preference = 1;
            break;
        case 2:
            $preference = 2;
            break;
        case 3:
            $preference = 3;
            break;
        case 4:
            $preference = 4;
            break;
        case 5:
            $preference = 5;
            break;
        case 6:
            $preference = 6;
            break;
        case 7:
            $preference = 7;
            break;
    }
    db::instance()->action(
        "INSERT INTO users (
username, 
firstname, 
lastname, 
password, 

email, 
postal, 

about, 

salary, 
currency, 
gender,
age,
preference) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)", array("$user", "$firstName", "$lastName", "$pass","$email", "$postal", "$about", "$salary++", "$currency", "$gender", "$age", "$preference"));
}