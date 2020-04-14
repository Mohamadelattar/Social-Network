 <?php
    
    require 'config/config.php';
    require 'includes/form_handlers/register_handlers.php';
    require 'includes/form_handlers/login_handlers.php';
?>
 <html>
      <head>
         <title>Welecome to Medbook</title>
         <link rel="stylesheet" href="assets/css/register_style.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="assets/js/register.js"></script>
     
     </head>
      <body>
      <?php  

	if(isset($_POST['register'])) {
		echo '
		<script>

		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});

		</script>

		';
	}


	?>
<div class="wrapper">
    
    <div class="login_box">    
     
       <div class="login_header">
           <h1>Welecome to Medbook</h1>
             Login or signup are below
       </div>
       
       <div id="first">
        <form action="register.php" method="POST">
            <input type="email" name="log_email" placeholder="Email" value="<?php 
                 if(isset($_SESSION["log_email"]))
                {
                     echo $_SESSION["log_email"];
                }
            ?>"required>
        <br>
        <input type="password" name="log_password" placeholder="password" required>
        <br>
        <?php
                if(in_array("Email or password was incorrect<br>",$error_array))
                {
                    echo "Email or password was incorrect<br>";
                }
            ?>
        <input type="submit" name="login" value="Login">
        <br>
        <a href="#second" id="signup" class="signup" >Need an accaount ? Register Here </a>
     </form>   
     </div>
     <!----------------------- Regestration Form -------------------->
      <div id="second">
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




        <input type="password" name="password" placeholder="Password"   required>
        <br>
        <input type="password" name="confirmPassword" placeholder="Confirm Password"   required>
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
        <br>
        <a href="#" id="signin" class="signin" >Already have an accaount ? Sign in here! </a>
        </form>
        </div>
       </div>
     </div>   
    </body>


</html>