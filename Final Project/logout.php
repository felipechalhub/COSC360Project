<?php
include "db.php";
ob_start();
session_start();
if(isset($_SESSION['uname']))
{
     unset($_SESSION['uname']);
     //  redirect to Loginform.php /
     header("Location: login.html");
}
else
{
          // unset($_SESSION['uname']);

     // redirect to Loginform.php */
     header("Location: login.html");
}
?>