<?php

include 'db.php';


if ($db->connect_error) {
    die("Connection failed");
} else {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Newsfeed</title>
    <link rel="stylesheet" href="Styling/newsfeed.css?v=<?php echo time(); ?>" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>




<body>
    <header>
 
    <div class="topnav">
        <a href="newsfeed.php"><img src="Assets/logo_200x200.png" width="100" height="100"></a>
        <a href="Dashboard.php">Home</a>
        <a href="signup.php">Sign up</a>
        <a href="login.html">Sign In</a>
    </div>
</header>
<div class="panel" id="sidenav">
    <nav>
            <a href="DashboardGuest.php">Dashboard</a><br>
             <a href="login.html">My Blog</a><br>

            <!-- <a href=".">News Feed</a><br> -->
            <!-- <a href=".">Settings</a> -->
        </nav>
    </div>

    <div class="panel" id="centerfeed">

        <div class="main">

        <?php
 
    

        $sql = "SELECT * FROM blogs ";

        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<div class=\"post\">";
                echo "<table>";
                echo  "<tr>";
                echo  "<th>Username</th>";
                echo  "<th>Created date</th>";
                echo  "<th> Blog Content </th>";
                echo  "<th>Category</th>";
                echo  "</tr>";
                echo "<tr><td>". $row['username'] . "</td><td>" . $row["createdDate"] . "</td><td>" . $row["blogContent"] . "</td><td>" . $row["category"] . "</td></tr>";

                $blogId = $row['blogId'];


  

                echo "</table>";
                echo "</div>";

            }
        }
        $db->close();
        ?>
        </div>
    </div>

    <div class="panel" id="sidesugg">
        <h2>Suggested</h2>
        <section>
            <h5>James Doe</h5>
            <h4>Insert Blog Title Here</h4>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
        </section>
        <section>
            <h5>Jean Doe</h5>
            <h4>Insert Blog Title Here</h4>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
        </section>
    </div>

</body>


</html>