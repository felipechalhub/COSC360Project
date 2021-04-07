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
    <link rel="stylesheet" href="css/user_blog.css?v=<?php echo time();?>">
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

<?php

$sql = "SELECT * FROM blog b, user u WHERE b.userId = u.userId AND u.userId=1";
$res = mysqli_query($db,$sql);

if(mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)){
        echo "<div class=\"post\">";
        echo "<table>";
        echo  "<tr>";
        echo  "<th>Username</th>";
        echo  "<th>Created date</th>";
        echo  "<th>Blog Content</th>";
        echo  "<th>Category</th>";
        echo  "</tr>";
        echo "<tr><td><a href = ".$row["username"].">".$row['username']."</a></td><td>".$row["createdDate"]."</td><td>".$row["blogContent"]."</td><td>".$row["category"]."</td></tr>";
      
   
   
        // $blogId = $row['blogId'];
    // $createdDate = $row['createdDate'];
    // $blogContent = $row['blogContent'];
    // $category = $row['category'];
    // $userId = $row['userId'];


    echo "</table>";
    echo "</div>";
}
}else{
    echo "0 results";
}
$db->close();
?>



        <!-- <div class="post">

            <table>
                <tr>
                    <td>
                        <a href="#author">Author</a>
                    </td>
                    <td>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum</p>
                    </td>
                </tr>
            </table>

        </div>

        <div class="post">
            <table>
                <tr>
                    <td>
                        <a href="#author">Author</a>
                    </td>
                    <td>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum</p>
                    </td>
                </tr>
            </table>
        </div> -->
    </div>




</body>

</html>