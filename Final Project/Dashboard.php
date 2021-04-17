<?php
include "db.php";
// include "login_page.php";
if ($db->connect_error) {
    die("Connection failed");
} else {
    ob_start();
    session_start();
}
// include "Includes.php";
if (isset($_SESSION['username'])) //this is a comment
{
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title> Home Page </title>
        <link href="Styling/homePageStyles.css" rel="stylesheet" type="text/css">
    </head>

    <body>



        <div>
            <?php //<a href = http://localhost/Loginform.php><button id = "signIn">  Sign In  </button></a> 
            ?>
            <?php //<button id = "signUp"> Sign Up </button> 
            ?>
            <a href="logout.php"><button id="signOut"> Sign Out </button></a>
            <a href="Profile.php"> <button id=editProfile> Edit Profile </button> </a>
            <p id="userNameDisplay" style="color:white;">
                <?php
                $Color = "white";
                echo 'Welcome Back ' . '<i style="Color:' . $Color . '">' . $_SESSION['username'] . '</i>';
                ?>
                <?php
                $sql = "SELECT * FROM user WHERE username = '" . $_SESSION['username'] . "'";
                $sth = $db->query($sql);
                $result = mysqli_fetch_assoc($sth);
                $profpic = $result['userImage'];
                $imgUrl = "Assets/$profpic";
                // echo $profpic;
                echo '<a href = "Profile.php"><img src="' . $imgUrl . '" id="output" height="25" width="25"> </a>';
                ?> </p>



            <button id="explore"><a href="newsfeed.php">Explore </a></button>
        </div>

        <div>
            <p>
            <h1>Blog</h1>
            </p>
            <p>
            <h2> <i> Share With The World </i> </h2>
            </p>
        </div>






    </body>

    </html>
<?php

} else {
    echo "blank";
    /* redirect to Loginform.php */
    //header("Location: Loginform.php");
    header("Location: DashboardGuest.php");
}
?>