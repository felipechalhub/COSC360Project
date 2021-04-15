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
    <link rel="stylesheet" href="css/user_blog.css?v=<?php echo time(); ?>">
</head>

<body>


    <div class="topnav">
        <a href="/COSC360/Project/user_blog_page.php"><img src="img/logo.png" width="100" height="100"></a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#clients">Clients</a>
        <a href="#contact">Contact</a>
    </div>

    <div class="searchBar">
        <a class="logo" href="#/">Home</a>
        <div iv class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">search</button>
            </form>
        </div>
        <a class="notification" href="#">
            <span>Notifications</span>
            <span class="badge">3</span>
        </a>
    </div>

    <div class="main">

        <?php

        if (isset($_GET['ID'])) {
            $blogId = mysqli_real_escape_string($db, $_GET['ID']);
            echo $blogId;

            $sql2 = "SELECT * FROM blog b, user u WHERE  u.userId = b.userId AND b.blogId = $blogId AND u.userId=1";
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
                    echo  "</tr>";
                    echo "<tr><td><a href = " . $row["username"] . ">" . $row['username'] . "</a></td><td>" . $row["createdDate"] . "</td><td>" . $row["blogContent"] . "</td><td>" . $row["category"] . "</td></tr>";
                    echo "</table>";
                    echo "</div>";
                }
            }

            if (!empty($_POST['comment'])) {
                $comment = $_POST['comment'];
                //CHANGE USERID TO USER CURRENTLY LOGGED IN
                $insertValues = "INSERT INTO comment (commentContent, userId, blogId) values ('$comment', 1,$blogId )";
                if (mysqli_query($db, $insertValues)) {
                    echo "commented posted";
                } else {
                    echo "form not submitted" . mysqli_error($db);
                }
            }
            $sql2 = "SELECT * FROM blog b, user u, comment c WHERE  c.blogId= b.blogId AND u.userId = b.userId AND b.blogId = $blogId AND u.userId=1";
            $res2 = mysqli_query($db, $sql2);
            if (mysqli_num_rows($res2) > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    echo "<div class=\"post\">";
                    echo "<table id = comment>";
                    echo  "<tr>";
                    echo  "<th>Username</th>";
                    echo  "<th> Blog Content</th>";
                    echo  "<th>Created date</th>";
                    echo  "</tr>";
                    echo "<tr><td><a href = " . $row["username"] . ">" . $row['username'] . "</a></td><td>" . $row["commentContent"] . "</td><td>" . $row["createdDate"] . "</td></tr>";
                    echo "</table>";
                    echo "</div>";
                }
            } else {
                echo "nothing";
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