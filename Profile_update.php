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
    $select= "select * from users1 where username='$username'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['username'];
    if($res === $username)
    {
   
       $update = "update users1 set firstname = '$firstname', lastname ='$lastname', email='$email', password='$password' where username='$username'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           
           header('location:Dashboard.php');
       }
       else
       {
          
           header('location:Profile_edit_form.php');
       }
    }
    else
    {
        
        header('location:Profile_edit_form.php');
    }
 }
?>