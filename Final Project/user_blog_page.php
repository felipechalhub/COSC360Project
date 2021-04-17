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
        <a href="homePage.html">Home</a>
        <a href="signup.php">Sign up</a>
        <a href="#">Sign Out</a>

    </div>

    <div class="searchBar">
        <a class="logo" href="#home">Home</a>
        <div iv class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">search</button>
            </form>
        </div>

    </div>

    <div class="main">
        <div id="addComment">
        <form action="" method="POST">
            <label>Post: </label><input type="text" name="content">
            <label>Category: </label><input type="text" name="category">
            <button type="submit" name="submit">Submit</button>
            <br>
            <br>

            <b><?php echo 'Welcome Back '  . $_SESSION['username']; ?></b>
        </form>
        </div>
        <?php


        if (isset($_POST['submit'])) {
            if (!empty($_POST['content']) && !empty($_POST['category'])) {
                $content = $_POST['content'];
                $category = $_POST['category'];
                $insertValues = "INSERT INTO blogs (blogContent, category, username, createdDate) values ('$content','$category', '" . $_SESSION['username'] . "', CURRENT_TIMESTAMP)";
                if (mysqli_query($db, $insertValues)) {
                    echo "blog posted";
                } else {
                    echo "form not submitted" . mysqli_error($db);
                }
            } else {
                echo "all fields required";
            }
        }


        $sql = "SELECT * FROM blogs WHERE username='" . $_SESSION['username'] . "'";

        $res = mysqli_query($db, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<div class=\"post\">";
                echo "<table>";
                echo  "<tr>";
                echo  "<th>Username</th>";
                echo  "<th>Created date</th>";
                echo  "<th> <a href ='comments.php?ID={$row['blogId']}'>Blog Content</a> </th>";
                echo  "<th>Category</th>";
                echo  "<th>Likes</th>";
                echo  "</tr>";
                echo "<tr><td>" . $row['username'] . "</td><td>" . $row["createdDate"] . "</td><td>" . $row["blogContent"] . "</td><td>" . $row["category"] . "</td><td>" . $row["likes"] . "</td></tr>";

                $blogId = $row['blogId'];

                echo "</table>";
                echo "</div>";

            }
        }

        $db->close();
        ?>


    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script src="Javascript/script.js"></script>
</body>

</html>