<?php
 
 session_start();
 include "Connection.php";
 if(isset($_POST['edit']))
 {
    $username=$_SESSION['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password = $_POST['pword'];
    //$image = $_POST['image'];
    $profilepic=$_FILES['image'];
    move_uploaded_file($profilepic['tmp_name'],"photos/".$profilepic['name']);


    $select= "select * from users2 where username='$username'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['username'];
    
    if($res === $username)
    {
        
   
       $update = "update users2 set firstName = '$firstname', lastName ='$lastname', email='$email', password='$password', profilepic='$profilepic[name]' where username='$username'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
        //echo "<script type='text/javascript'>alert('Profile Editted');</script>";
           header('location:Dashboard.php');
           //echo "<script type='text/javascript'>alert('Profile Editted');</script>";
       }
       else
       {
          
           header('location:Profile_edit_form.php');
           //echo "<script type='text/javascript'>alert('Profile Editted');</script>";
          // $_SESSION['message'] = 'success';
           //echo  $_SESSION['message'];
       }
    }
    else
    {
        
        header('location:Profile_edit_form.php');
    }
    
 }
 
?>
