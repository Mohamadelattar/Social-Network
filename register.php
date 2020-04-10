<?php

    require 'config/config.php';
    require 'includes/form_handlers/register_handlers.php'
   

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