<?php 
include 'db.php';

if ($db->connect_error) {
    die("Connection failed");
} else {
    session_start();
}
if(isset($_POST['fname']) && isset($_POST['password'])) { 

    $adminname = $_POST['fname'];
    $adminpass = $_POST['password'];
    // $adminpass = md5($adminpass);
    $sql= "SELECT * FROM users where username='$adminname' AND pw='$adminpass'";
    $result = mysqli_query($db, $sql);
    
    // if(mysqli_num_rows($result) == 1){ 
        // $row = mysqli_fetch_assoc($result);
        if($adminname === 'admin123' && $adminpass === 'admin123!') { 
            echo "Logged in! Link to Admin Page";
            header("location:adminpage.php");
        }
        else{ 
            echo"Incorrect Username or password!";
        }

    // }
    // else { 

    //     echo "Something went wrong";
    //     exit();
    // }

}


?>