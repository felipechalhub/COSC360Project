<?php

include 'db.php';

if ($db->connect_error) {
    die("Connection failed");
} else {
    session_start();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User's blog page</title>
    <link rel="stylesheet" href="Styling/user_blog.css?v=<?php echo time(); ?>">
</head>

<body>


    <div class="topnav">
        <a href="newsfeed.php"><img src="Assets/logo_200x200.png" width="100" height="100"></a>
        <a href="Dashboard.php">Home</a>
        <a href="DashboardGuest.php">Sign Out</a>
    </div>

    <div class="searchBar">
        <a class="logo" href="#/">Home</a>
        <div iv class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">search</button>
            </form>
        </div>
        <!-- <a class="notification" href="#">
            <span>Notifications</span>
            <span class="badge">3</span>
        </a>
    </div> -->

    <div class="main">

        <?php

        if (isset($_GET['ID'])) {
            $blogId = mysqli_real_escape_string($db, $_GET['ID']);
            // echo $blogId;

            $sql2 = "SELECT * FROM blogs b WHERE  b.blogId = $blogId ";
            $res2 = mysqli_query($db, $sql2);
            // $row = mysqli_fetch_array($res2);
            if (mysqli_num_rows($res2) > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    echo "<div class=\"post\">";
                    echo "<table>";
                    echo  "<tr>";
                    echo  "<th>Username</th>";
                    echo  "<th>Created date</th>";
                    echo  "<th> Blog Content</th>";
                    echo  "<th>Category</th>";
                    echo  "<th>Likes</th>";
                    echo  "<th></th>";
                    echo  "</tr>";
                    echo "<tr><td>". $row['username'] . "</td><td>" . $row["createdDate"] . "</td><td>" . $row["blogContent"] . "</td><td>" . $row["category"] . "</td><td>" . $row["likes"] . "</td></tr>";          
                   
                    // $blogId = $row['blogId'];

                    echo "</table>";
                    echo "</div>";
                }
            }


            if (!empty($_POST['comment'])) {
                $comment = $_POST['comment'];
                //CHANGE USERID TO USER CURRENTLY LOGGED IN
                $insertValues = "INSERT INTO comments (commentContent, username, blogId) values ('$comment', '".$_SESSION['username']."',$blogId )";
                if (mysqli_query($db, $insertValues)) {
                    echo "commented posted";
                } else {
                    echo "form not submitted" . mysqli_error($db);
                }
            }
            $sql2 = "SELECT * FROM  user u, comments c WHERE u.username = c.username AND c.blogId = $blogId";
            $res2 = mysqli_query($db, $sql2);
            if (mysqli_num_rows($res2) > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    echo "<div class=\"post\">";
                    echo "<table id = comment>";
                    echo  "<tr>";
                    echo  "<th>Username</th>";
                    echo  "<th> Blog Content</th>";
                    echo  "</tr>";
                    echo "<tr><td>". $row['username'] . "</td><td>" . $row["commentContent"]  . "</td></tr>";
                    echo "</table>";
                    echo "</div>";
                }
            } else {
                echo "No comments";
                // header('Location: user_blog_page.php');
            }

        }


        ?>
        <form action="" method="POST">
            <label>Comment: </label><input type="text" name="comment">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>