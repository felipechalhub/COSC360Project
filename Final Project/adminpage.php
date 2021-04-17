<?php
include 'db.php';

if ($db->connect_error) {
    die("Connection failed");
} else {
    session_start();
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin page</title>
        <link rel="stylesheet" href="Styling/adminpage.css" type="text/css">
    </head>

    <body>
        <header>
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
      <?php
        if(isset($_POST['search'])){
          $searchKey = $_POST['search'];
          $sql = "SELECT * FROM users2 WHERE username LIKE '%$searchKey%'";
        } else {
            $sql = "SELECT * FROM users2";
            $searchKey = "";
        }

        $result = mysqli_query($db,$sql);

        ?>
      <div class="seachBar">
        <form action="" method="POST">
          <input type="text" placeholder="Search.." name="search" value="<?php echo $searchKey; ?>">
          <button type="submit"><i class="fastSearch"></i></button>
        </form>
      </div>

      <div class="showUser">
        <table>
        <tr>
          <th>Username</th>
          <th>Posts</th>
          <th>Comments</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_object($result)) {}?>
        <tr>
          <td><?php echo $row->username ?></td>
          <td><?php echo $row->blogContent ?></td>
          <td><?php echo $row->commentContent ?></td>
        </tr>
        </table>
      </div>



    </body>