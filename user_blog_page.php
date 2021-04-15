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
        <a href="#home"><img src="img/logo.png" width="100" height="100"></a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#clients">Clients</a>
        <a href="#contact">Contact</a>
    </div>

    <div class="searchBar">
        <a class="logo" href="#home">Home</a>
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

        <form action="" method="POST">
            <label>Post: </label><input type="text" name="content">
            <label>Category: </label><input type="text" name="category">
            <button type="submit" name="submit">Submit</button>

        </form>
        <?php
        if (isset($_POST['submit'])) {
            if (!empty($_POST['content']) && !empty($_POST['category'])) {
                $content = $_POST['content'];
                $category = $_POST['category'];
                //CHANGE USERID TO USER CURRENTLY LOGGED IN
                $insertValues = "INSERT INTO blog (blogContent, category, userId, createdDate) values ('$content','$category', 1, CURRENT_TIMESTAMP)";
                if (mysqli_query($db, $insertValues)) {
                    echo "blog posted";
                } else {
                    echo "form not submitted" . mysqli_error($db);
                }
            } else {
                echo "all fields required";
            }
        }


        $sql = "SELECT * FROM blog b, user u WHERE b.userId = u.userId AND u.userId=1";

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
                echo  "</tr>";
                echo "<tr><td><a href = " . $row["username"] . ">" . $row['username'] . "</a></td><td>" . $row["createdDate"] . "</td><td>" . $row["blogContent"] . "</td><td>" . $row["category"] . "</td></tr>";

                $blogId = $row['blogId'];


                // $blogId = $row['blogId'];
                // $createdDate = $row['createdDate'];
                // $blogContent = $row['blogContent'];
                // $category = $row['category'];
                // $userId = $row['userId'];


                echo "</table>";
                echo "</div>";

                $sql2 = "SELECT * FROM blog b, comment c, user u WHERE b.blogId = c.blogId AND u.userId = b.userId";

                $res2 = mysqli_query($db, $sql2);
            }
        }

        $db->close();
        ?>

    </div>
    </div>




</body>

</html>