<?php

    require 'config/config.php';
    require 'includes/form_handlers/register_handlers.php'
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