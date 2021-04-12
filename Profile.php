
<!DOCTYPE html>
<html>
    <head>
        <title>Profile Page</title>
        <script src = "https://code.jquery.com/jquery-3.1.1.js"> </script>
        <script type="text/javascript" src="profile.js"></script>

        
    </head>
    <body>
    <?php
    
include "Connection.php";
include "Includes.php";
//include "Loginform.php"



?>
        <h1 style="text-align:center;">Profile</h1>
       
        <form action="Profile_update.php" method="post">
            <link href="ProfileStyles.css" rel="stylesheet" type="text/css">
            <div id = "profileForm">
               
              
                <p><img src="https://twirpz.files.wordpress.com/2015/06/twitter-avi-gender-balanced-figure.png?w=640" id="output" width="100" height ="100"  /></p>
                <p><input type="file"  accept=".jpg, .png" name="image" id="file"  onchange="loadFile(event)" ></p>
                
    
           

            First Name: <input type = "text" name = "firstname" value = <?php $query = "SELECT * FROM users1 WHERE username = '".$_SESSION['username']."'";  $result = mysqli_query($conn,$query); while($row = mysqli_fetch_assoc($result)){  echo $row['firstname'] ;    }  ?>><br>  
            Last Name : <input type = "text" name = "lastname" value = <?php $query = "SELECT * FROM users1 WHERE username = '".$_SESSION['username']."'";  $result = mysqli_query($conn,$query); while($row = mysqli_fetch_assoc($result)){  echo $row['lastname'] ;    }  ?>><br>   
            Email: <input type="email" name="email" value = <?php $query = "SELECT * FROM users1 WHERE username = '".$_SESSION['username']."'";  $result = mysqli_query($conn,$query); while($row = mysqli_fetch_assoc($result)){  echo $row['email'] ;    }  ?>><br>     
            Password: <input type = "text" name = "pword" value = <?php $query = "SELECT * FROM users1 WHERE username = '".$_SESSION['username']."'";  $result = mysqli_query($conn,$query); while($row = mysqli_fetch_assoc($result)){  echo $row['password'] ;    }  ?>><br>  

           
            
            <input type="submit" name="edit">

           

        </div> 
         </form>

    </body>
</html>
