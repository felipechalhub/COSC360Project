<?php include 'db.php';
if ($conn->connect_error) {     
    die("Connection failed"); 
} 
else {        
    session_start();
}
if(isset($_POST['fname']) && isset($_POST['password'])) { 

    $adminname = $_POST['fname'];
    $adminpass = $_POST['password'];
    $adminpass = md5($adminpass);
    $sql= "SELECT * FROM users where username='$adminname' AND pw='$adminpass'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) === 1){ 
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $adminname && $row['pw'] === $adminpass) { 
            echo "Logged in! Link to Admin Page";
        }
        else{ 
            alert("Incorrect Username or password!");
        }

    }
    else { 

        echo "Something went wrong";
        exit();
    }

}


?>