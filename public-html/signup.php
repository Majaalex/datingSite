<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Signup to find your partner</title>
</head>

<div>
    <form action="connect.php" method="post">
        <pre>
            First Name:         <input type="text" name="firstname" required/><br>
            Last Name:          <input type="text" name="lastname" required/><br>
            Username:           <input type="text" name="username" required/><br>
            Password:           <input type="password" name="password" required/><br>
            Password check:     <input type="password" name="passwordValidation" required/><br>
            Email:              <input type="email" name="email" required/><br>
            Postal code:        <input type="number" name="postalCode" required/><br>
            About me:           <input type="text" name="about" required/><br>
            Salary:             <input type="number" name="salary" required/><br>
            Looking for:        <input type="checkbox" name="genderM" value="0" checked/> Male
                                <input type="checkbox" name="genderF" value="0" /> Female
                                <input type="checkbox" name ="genderO" value="0" /> Other
            <input type="submit" value="Register"/>
        </pre>
    </form>
</div>

