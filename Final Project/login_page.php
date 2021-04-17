<?php include 'db.php';
if ($db->connect_error) {
    die("Connection failed");
} else {
    session_start();
}
if(isset($_POST['fname']) && isset($_POST['fpassword'])) { 

    // function validate($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }
    $uname = $_POST['fname'];
    $pass = $_POST['fpassword'];
    $pass = md5($pass);
    $sql= "SELECT * FROM user where username='$uname' AND userPassword='$pass'";
    $result = mysqli_query($db, $sql);
    
    if(mysqli_num_rows($result) === 1){ 
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $uname && $row['userPassword'] === $pass) {
            $_SESSION['username']=$uname; 
            header("Location: Dashboard.php");
            // echo "Logged in!";
        }
        else{ 
            echo "Incorrect Username or password!";
        }

    }
    else { 

        header("Location: login.html");
        exit();
    }

}


?>