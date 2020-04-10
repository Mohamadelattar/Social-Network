<?php

    session_start();
    // Connexion with DB
    $con = mysqli_connect("localhost","root","","social");
    if(mysqli_connect_errno())
    {
        echo "Failed to connect". mysqli_connect_errno();
    }

    // Error Array
    $error_array = array();
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
        $firstname             =  strip_tags($firstname);                  // Remove tags
        $firstname             =  str_replace(' ','',$firstname);          // remove space
        $firstname             =  ucfirst(strtolower($firstname));         // Capitilaze the first letter
        $_SESSION["firstname"] =  $firstname;
        // Last name
        $lastname              = strip_tags($lastname);                    // Remove tags
        $lastname              = str_replace(' ','',$lastname);            // remove space 
        $lastname              = ucwords(strtolower($lastname));           // capitilaze the first letter 
        $_SESSION["Lastname"]  = $lastname;
        // Email 
        $email                  = strip_tags($email);
        $email                  = str_replace(' ','',$email);
        $email                  = ucwords(strtolower($email));
        $_SESSION["email"]      = $email;
        // Email  Confirmation 
        $confirmEmail             = strip_tags($confirmEmail);              // Remove tags
        $confirmEmail             = str_replace(' ','',$confirmEmail);      // remove space 
        $confirmEmail             = ucwords(strtolower($confirmEmail));     // capitilaze the first letter
        $_SESSION["confirmEmail"] = $confirmEmail;
        // Password
        $password                    = strip_tags($password);               // Remove tags
        $confirmPassword             = strip_tags($confirmPassword);        // Remove tags
        $_SESSION["password"]        = $password;
        $_SESSION["confirmPassword"] = $confirmPassword;

        // Date;
        $date = date("y-m-d");
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
                        
                        array_push($error_array,"This Email already in use<br>");
                    }
                 } 
                else
                 {
                    array_push($error_array,"Invalid Email<br>");
                     
                 }

             }
            
            else
             {
                array_push($error_array,"Email don't match<br>");
                 
             }
             // Valid Input

            if (strlen($firstname)>20 || strlen($firstname)<4)
            {
                array_push($error_array,"Your first name muste be between 4 and 20 characters<br>");
            }

            if (strlen($lastname)>20 || strlen($lastname)<4)
            {
                array_push($error_array,"Your last name muste be between 4 and 20 characters<br>");
            }

            if($password != $confirmPassword)
            {
                array_push($error_array,"Your password do not match<br>");
            }
            else
            {
                if(preg_match('/[^A-Za-z0-9]/',$password))
                {
                
                    array_push($error_array,"Your password can only contain english characters and numbers<br>");
                }
            }

            if(strlen($password) > 20 || strlen($password) < 8)
            {
            
                array_push($error_array,"Your password must be between 8 and 20 characters<br>");
            
            }

            if(empty($error_array))
            {
                // Encrypt Password
                $password = md5($password);

                // Generate Username
                $Username = $firstname."_".$lastname;
                $check_user = mysqli_query($con,"SELECT username FROM users WHERE username = '$Username' ");
                $i=0;
                // if username exist 
                while(mysqli_num_rows($check_user) != 0)
                {
                    $i++;
                    $Username = $Username.$i;
                    $check_user = mysqli_query("SELECT username FROM users WHERE username = '$Username' ");
                }

                // Profile pic
               $rand = rand(1,2);

                if($rand == 1)
                {
                    $profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
                }

                else if($rand == 2)
                {
                    $profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";
                }

                $query = mysqli_query($con,"INSERT INTO users VALUES ('','$firstname','$lastname','$Username','$email','$password','$date','$profile_pic','0','0','no','')");

                array_push($error_array,"<span style='color:#14C800;'>You're all set! Goahead and Login<br> </span>");
                $_SESSION["firstname"]="";
                $_SESSION["Lastname"]="";
                $_SESSION["email"]="";
                $_SESSION["confirmEmail"]="";
                $_SESSION["password"]="";
                $_SESSION["confirmPassword"]="";
                

            }

            

     }


?> 
<html>
     <head>
        <title>Register</title>
    
    </head>
    <body>
        <form action="register.php" method="POST">
        <input type="text" name="firstname" placeholder="First Name" value="<?php 
            if(isset($_SESSION["firstname"]))
            {
                echo $_SESSION["firstname"];
            }
        ?>" required>
        <br>
        <?php
            if(in_array("Your first name muste be between 4 and 20 characters<br>",$error_array))
            {
                echo "Your first name muste be between 4 and 20 characters<br>";
            }
         ?>
        <input type="text" name="Lastname" placeholder="Last Name" value="<?php
            if(isset($_SESSION["Lastname"]))
            {
                echo $_SESSION["Lastname"];
            }
        
        ?>" required>
        <br>
        <?php
            if(in_array("Your last name muste be between 4 and 20 characters<br>",$error_array))
            {
                echo "Your last name muste be between 4 and 20 characters<br>";
            }
        ?>
        <input type="email" name="email" placeholder="Email"  value="<?php
            if(isset($_SESSION["email"]))
            {
                echo $_SESSION["email"];
            }
        ?>"required>
        <br>
        <input type="email" name="confirmEmail" placeholder="Confirm Email" value="<?php
            if(isset($_SESSION["confirmEmail"]))
            {
                echo $_SESSION["confirmEmail"];
            }
        ?>" required>
        <br>
        <?php
            if(in_array("This Email already in use<br>",$error_array))
            {
                echo "This Email already in use<br>";
            }
            else if(in_array("Invalid Email<br>",$error_array))
            {
                echo "Invalid Email<br>";
            }
            else if(in_array("Email don't match<br>",$error_array))
            {
                echo "Email don't match<br>";
            }

        ?>
        <input type="password" name="password" placeholder="Password" value="<?php
            if(isset($_SESSION["password"]))
            {
                echo $_SESSION["password"];
            }
        ?>" required>
        <br>
        <input type="password" name="confirmPassword" placeholder="Confirm Password" value="<?php
            if(isset($_SESSION["confirmPassword"]))
            {
                echo $_SESSION["confirmPassword"];
            }
        ?>" required>
        <br>
        <?php
            if(in_array("Your password do not match<br>",$error_array))
            {
                echo "Your password do not match<br>";
            }
            else if(in_array("Your password can only contain english characters and numbers<br>",$error_array))
            {
                echo "Your password can only contain english characters and numbers<br>";
            }
            else if(in_array("Your password must be between 8 and 20 characters<br>",$error_array))
            {
                echo "Your password must be between 8 and 20 characters<br>";
            }
        ?>
        <input type="submit" value="Register" name="register">
        <br>
        <?php
            if(in_array("<span style='color:#14C800;'>You're all set! Goahead and Login<br> </span>",$error_array))
            {
                echo "<span style='color:#14C800;'>You're all set! Go ahead and Login<br> </span>";
            }
        ?>
        </form>
        
    </body>


</html>