<?php
 include 'db.php';
if ($db->connect_error) {
    die("Connection failed");
} else {
    session_start();
}
$msg ="";
if(isset($_POST['fname']) && isset($_POST['fpassword']) && isset($_POST['femail']) && isset($_POST['fpassword1'])) { 

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['fname']);
    $pass = validate($_POST['fpassword']);
    $mail = validate($_POST['femail']);
    $confirm = validate($_POST['fpassword1']);
    $profilepic=$_FILES['profilepic'];
    move_uploaded_file($profilepic['tmp_name'],"Assets/".$profilepic['name']);


    if(empty($uname)) { 
        header("Location: signup.php?error=Username was not entered!");
        exit();
    }
    else if(empty($pass) || empty($confirm)){ 
        header("Location: signup.php?error=Password was not entered!");
        exit();
    }
    else if(empty($mail)){ 
        header("Location: signup.php?error=Email was not entered!");
        exit();
    }
    else if($pass !== $confirm) { 
        header("Location: signup.php?error=Passwords do not match!");
        exit();
    }
    else {
    $pass = md5($pass);
    $sql= "SELECT * FROM user where username='$uname'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        header("Location: signup.php?error=The username you entered has already been taken!");
        exit();
    } 
    $sql3 = "SELECT * FROM user where userEmail='$mail'";
    $result3 = mysqli_query($db,$sql3);
    if(mysqli_num_rows($result3) > 0) { 
        header("Location: signup.php?error=The email you entered is used already.");
        exit();
    }
    else { 
        $sql2 = "INSERT INTO user(username,userEmail,userPassword, userImage) VALUES('$uname','$mail','$pass', '$profilepic[name]')";
        $result2 = mysqli_query($db, $sql2);
        if($result2) {
            header("Location: signup.php?success=Account was made successfully!");
            sleep(3);
            header("Location: login.html");
            exit();
        }
        else {
            header("Location: signup.php?error=Error occured!");
            exit();
        }
    }
    // if(move_uploaded_file($_FILES['userImage']['tmp_name'], $target)) { 
    //     $msg = "Image uploaded successfully!";
    // }
    // else { 
    //     $msg = "Upload error!";
    // }


}
}
