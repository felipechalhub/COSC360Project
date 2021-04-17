<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Newsfeed</title>
        <link rel="stylesheet" href="newsfeed.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>




    <body>
        <script type="text/javascript" src="newsfeed.js"></script>
        <header>
            <a href="."><img src="blog.PNG" alt="header logo" class="logo"/></a>
            <nav id="topnav">
                <a href=".">Home </a>|
                <a href="."> Sign Up </a>|
                <a href="."> Sign In</a>
            </nav>
        </header>
    <div class="panel" id="sidenav">
        <nav>
            <a href=".">Home</a><br>
            <a href=".">Dashboard</a><br>
            <a href=".">My Blog</a><br>
            <a href=".">News Feed</a><br>
            <a href=".">Settings</a>
        </nav>
    </div>

    <div class="panel" id="centerfeed">
        <table>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>content</th>
            </tr>
        </table>
<?php
$conn = mysqli_connect("localhost","root","db1");
echo "Hello";
/*

if (#conn -> connect_error){
    die("Connection failed:". $conn -> connect_error);
}
$sql = "SELECT id, username, content, likes FROM newsfeed ORDER BY likes";
$conn -> query(#sql);

if ($result -> num_rows > 0){
    while(#row = $result -> fetch_assoc()){
        echo "<tr><td>". $row["id"] . "</td><td>". $row["username"]. "</td><td>". $row[content] ."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 result";
}
$conn -> close();
*/
echo "Hello";
?>
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
