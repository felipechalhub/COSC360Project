<?php
 include "Connection.php";
include "Includes.php";
if(isset($_SESSION['username'])) //this is a comment
{
?>
<!DOCTYPE html>
<html>
<head>
<title> Home Page </title>
<link href="homePageStyles.css" rel="stylesheet" type="text/css">
</head>
<body>



<div>
<?php //<a href = http://localhost/Loginform.php><button id = "signIn">  Sign In  </button></a> ?>
<?php //<button id = "signUp"> Sign Up </button> ?>
<a href = "Logout.php"><button id = "signOut">   Sign Out </button></a>
<a href = "Profile.php"> <button id = editProfile> Edit Profile </button> </a>
<p id = "userNameDisplay" style= "color:white;">  <?php  $Color = "white"; echo 'Welcome Back '.'<i style="Color:'.$Color.'">'.$_SESSION['username'].'</i>';  ?>  <?php
$sql = "SELECT * FROM users2 WHERE username = '".$_SESSION['username']."'";
$sth = $conn->query($sql);
$result=mysqli_fetch_assoc($sth);
$profpic = $result['profilepic'];
$imgUrl = "photos/$profpic";
echo '<a href = "Profile.php"><img src="'.$imgUrl.'" id="output" height="25" width="25"> </a>' ;
?> </p> 



<button id = "explore"> Explore </button>
</div>

<div>
<p><h1>Blog</h1></p> 
<p><h2> <i> Share With The World </i> </h2></p>
</div>



  


</body>
</html>
<?php

}
else
{
    /* redirect to Loginform.php */
    //header("Location: Loginform.php");
    header("Location: DashboardGuest.php");
}
?>
