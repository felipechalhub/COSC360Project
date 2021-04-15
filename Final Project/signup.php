<!DOCTYPE html> 
<html>
<head> 
<title> Registration </title>
<link rel="stylesheet" href="signup-styling.css">
</head>

<body> 
<div class="topnav-right">
    <a href="#">Home</a>
    <a href="signup.html" class="active-page">Sign up</a>
    <a href="login.html"> Sign in</a>
</div><br><br><br><br>

<div id="logonamediv">
    <center><img src="logo_200x200.png"></center>
</div>
<h2 id="logintext"> Register user </h2>
    
<form action="register_user.php" method="POST"> 
<div class="container">
<?php if(isset($_GET['error'])){ ?>
<center><p class="error"><?php echo $_GET['error']; ?></p><center>
<?php } ?>
<?php if(isset($_GET['success'])){ ?>
<center><p class="success"><?php echo $_GET['success']; ?></p><center>
<?php } ?>
<input type="email" id="email" name="femail" placeholder="Enter Email" required><br><br>
<input type="text" id="fusername" name="fname" placeholder="Enter username" required><br><br>
<input type="password" id="fpassword" name="fpassword" placeholder="Enter Password" required><br><br>
<input type="password" id="fpassword1" name="fpassword1" placeholder="Confirm Password" required><br><br>
<center><label><input type="checkbox" value="" required>Accept Terms of Service</label></center>
<center><input type="file" id="image" required></center>
<input type="submit" value="Submit" id="submit">
<center><p>Already a have an account? <a href="login.html">Login here</a></p></center>


    
</div>
</form>
    
</body>

</html>