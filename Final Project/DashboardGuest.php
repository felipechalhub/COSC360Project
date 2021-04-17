<?php
include "db.php";
// include "login_page.php";
if ($db->connect_error) {
    die("Connection failed");
} else {
    ob_start();
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Home Page </title>
<link href="Styling/homePageStyles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
</head>
<body>


<div>
<a href = login.html><button id = "signIn">  Sign In  </button></a>
<a href = signup.php><button id = "signUp"> Sign Up </button></a>
<?php //<a href = "Logout.php"><button id = "signOut">   Sign Out </button></a> ?>
<?php //<a href = "Profile.php"> <button id = editProfile> Edit Profile </button> </a> ?>
<?php //<p id = "userNameDisplay"> <?php  $Color = "white";  echo '<div style="Color:'.$Color.'">'.$_SESSION['username'].'</div>';  ?> </p> 
<?php // <p> <?php if(isset($_POST['signup'])) { echo $_POST['firstname']; } else{ echo "notset";} ?> </p>
<a href="newsfeedGuest.php"><button id = "explore"> Explore </button></a>
</div>

<div>
<p><h1>Blog</h1></p> 
<p><h2> <i> Share With The World </i> </h2></p>
</div>



    <div class="footer">
    <footer>
        <p>Authors: Felipe, Jarin, Siddesh, Yidu</p>
    </footer>
    </div>

</body>
</html>
