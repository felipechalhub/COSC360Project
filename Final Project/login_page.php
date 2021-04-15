<?php include 'db.php';
if ($conn->connect_error) {     
    die("Connection failed"); 
} 
else {        
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
    $sql= "SELECT * FROM users where username='$uname' AND pw='$pass'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) === 1){ 
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $uname && $row['pw'] === $pass) { 
            echo "Logged in!";
        }
        else{ 
            alert("Incorrect Username or password!");
        }

    }
    else { 

        header("Location: login.html");
        exit();
    }

}


?>