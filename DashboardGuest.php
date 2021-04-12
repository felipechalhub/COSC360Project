<?php
include "Includes.php";

?>

<!DOCTYPE html>
<html>
<head>
<title> Home Page </title>
<link href="homePageStyles.css" rel="stylesheet" type="text/css">
</head>
<body>


<div>
<a href = http://localhost/Loginform.php><button id = "signIn">  Sign In  </button></a>
<a href = http://localhost/Signupform.php><button id = "signUp"> Sign Up </button></a>
<?php //<a href = "Logout.php"><button id = "signOut">   Sign Out </button></a> ?>
<?php //<a href = "Profile.php"> <button id = editProfile> Edit Profile </button> </a> ?>
<?php //<p id = "userNameDisplay"> <?php  $Color = "white";  echo '<div style="Color:'.$Color.'">'.$_SESSION['username'].'</div>';  ?> </p> 
<?php // <p> <?php if(isset($_POST['signup'])) { echo $_POST['firstname']; } else{ echo "notset";} ?> </p>
<button id = "explore"> Explore </button>
</div>

<div>
<p><h1>Blog</h1></p> 
<p><h2> <i> Share With The World </i> </h2></p>
</div>



  


</body>
</html>