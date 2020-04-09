<?php
    // Connexion with DB
    $con = mysqli_connect("localhost","root","","social");
    if(mysqli_connect_errno())
    {
        echo "Failed to connect". mysqli_connect_errno();
    }
    if(isset($_POST["register"]))
    {
        // Form Data
        $firstname        = $_POST["firstname"];
        $lastname         = $_POST["Lastname"];
        $email            = $_POST["email"];
        $confirmEmail     = $_POST["confirmEmail"];
        $password         = $_POST["password"];
        $confirmPassword  = $_POST["confirmPassword"];

        // First name
        $firstname = strip_tags($firstname);                 // Remove tags
        $firstname = str_replace(' ','',$firstname);         // remove space
        $firstname = ucfirst(strtolower($firstname));        // Capitilaze the first letter

        // Last name
        $lastname = strip_tags($lastname);                    // Remove tags
        $lastname = str_replace(' ','',$lastname);            // remove space 
        $lastname = ucwords(strtolower($lastname));           // capitilaze the first letter 

        // Email 
        $email = strip_tags($email);
        $email = str_replace(' ','',$email);
        $email = ucwords(strtolower($email));

        // Email  Confirmation 
        $confirmEmail = strip_tags($confirmEmail);             // Remove tags
        $confirmEmail= str_replace(' ','',$confirmEmail);      // remove space 
        $confirmEmail = ucwords(strtolower($confirmEmail));    // capitilaze the first letter

        // Password
        $password = strip_tags($password);                     // Remove tags
        $confirmPassword = strip_tags($confirmPassword);       // Remove tags


    }


?> 
<html>
     <head>
        <title>Register</title>
    
    </head>
    <body>
        <form action="register.php" method="POST">
        <input type="text" name="firstname" placeholder="First Name" required>
        <br>
        <input type="text" name="Lastname" placeholder="Last Name" required>
        <br>
        <input type="email" name="email" placeholder="Email" required>
        <br>
        <input type="email" name="confirmEmail" placeholder="Confirm Email" required>
        <br>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
        <br>
        <input type="submit" value="Register" name="register">
        </form>
        
    </body>


</html>