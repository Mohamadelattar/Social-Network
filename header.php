<?php
    require 'config/config.php';
  
        if (isset($_SESSION['username'])) {
            $userLoggedIn = $_SESSION['username'];
            $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
            $user = mysqli_fetch_array($user_details_query);
        }
        else {
            header("Location: register.php");
        }
        
?>
 
<html>
    <head>
        <title>Welecome to Medbook</title>
        <!----------- Css -------------------->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!----------- Javascript ------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="https://kit.fontawesome.com/d7dcb35a76.js" crossorigin="anonymous"></script>
    </head>

    <body>
      <div class="top_bar">
        <div class="Logo">
            <a href="index.php">MedBook!</a>
        </div>
        <nav>
            <a href="">
                <?php echo $user["FirstName"]; ?>
            </a>
            <a href="#">
            <i class="fas fa-home"></i>
            </a>
            <a href="#">
            <i class="fas fa-envelope"></i>
            </a>
            <a href="">
            <i class="fas fa-bell"></i>
            </a>
            <a href="">
            <i class="fas fa-users"></i>
            </a>
            <a href="#">
            <i class="fas fa-cog"></i>
            </a>
        </nav>
      </div>
      <div class="wrapper"></div>
    </body>
</html>