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

            // Email Verification 

            if( $email == $confirmEmail)
             {   
                // Check if email in Invalid Format
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                 { 
                    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                    
                     // Check Email Repetation
                     $email_check = mysqli_query($con,"SELECT Email from users WHERE Email = '$email'");
                    // Count the numbers of rows returned
                    $num_rows = mysqli_num_rows($email_check);
                
                    if($num_rows > 0)
                    {
                        echo "This Email already in use";
                    }
                 } 
                else
                 {
                    echo "Invalid Email";
                 }

             }
            
            else
             {
                echo "Email don't match";
             }
             // Valid Input

            if (strlen($firstname)>20 || strlen($firstname)<4)
            {
                echo "Your first name muste be between 4 and 20 characters<br>";
            }
            if (strlen($lastname)>20 || strlen($lastname)<4)
            {
                echo "Your last name muste be between 4 and 20 characters<br>";
            }
            if($password != $confirmPassword)
            {
                echo "Your password do not match";
            }
            else
            {
                if(preg_match('/[^A-Za-z0-9]/',$password))
                {
                    echo "Your password can only contain english characters and numbers<br>";
                }
            }
            if(strlen($password) > 20 || strlen($password) < 8)
            {
                echo "Your password must be between 8 and 20 characters<br>";
            }


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