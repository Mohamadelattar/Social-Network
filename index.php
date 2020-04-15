<?php  
include('header.php');

?>
<head>
<link rel="stylesheet" href="assets/css/style.css">

</head>
<div class="wrapper">
    <div class="user_details column">
        <a href=""> <img src="<?php echo $user ["profile_pics"]; ?> " alt=""> </a>
        <div class="user_details_left_right">
            <a href="">
            <?php
                echo $user["FirstName"]." ".$user["LastName"];
            
            ?>
            </a>
            <br>
            <?php echo "Posts:".$user["num_posts"] ."<br>";
            
                echo "Likes:".$user["num_likes"]."<br>";
            ?>        
        </div>
    </div>
    <div class="main_column column">
        <form action="index.php" method="POST" class="post_form">
            <textarea name="post_text" id="post_button" value="post" placeholder="Got something to say?"></textarea>
            <input type="submit" name="post" id="post_button" value="Post">
            <hr>
        </form>
    </div>
    </div>

</body>
</html>