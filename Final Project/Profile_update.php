<?php
 include "db.php";
 if ($db->connect_error) {
     die("Connection failed");
 } else {
 session_start();
 }
//  include "Connection.php";
 if(isset($_POST['edit']))
 {
    $username=$_SESSION['username'];
    // $firstname=$_POST['firstname'];
    // $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password = $_POST['pword'];
    $image = $_POST['image'];
    $profilepic=$_FILES['image'];
    move_uploaded_file($profilepic['tmp_name'],"Assets/".$profilepic['name']);


    $select= "SELECT * from user where username='$username'";
    $sql = mysqli_query($db,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['username'];
    
    if($res === $username)
    {
        
        echo $res;
        echo $username;
       $update = "UPDATE user set  userEmail='$email', userPassword = md5('$password'), userImage='$profilepic[name]'  where username='$username'";
       $sql2=mysqli_query($db,$update);
if($sql2)
       { 
        //echo "<script type='text/javascript'>alert('Profile Editted');</script>";
           header('location:Dashboard.php');
           //echo "<script type='text/javascript'>alert('Profile Editted');</script>";
       }
       else
       {
          echo "blank1";
        //    header('location:Profile_edit_form.php');
           //echo "<script type='text/javascript'>alert('Profile Editted');</script>";
          // $_SESSION['message'] = 'success';
           //echo  $_SESSION['message'];
       }
    }
    else
    {
        echo "blank";
        // header('location:Profile_edit_form.php');
        
    }
    
 }

 
?>
