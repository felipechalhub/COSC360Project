

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
//include "getImage.php";
//include "Loginform.php"


           


?>
<p><a style= "color:white;" href = "Dashboard.php">Home  </a> -->Edit Profile</p>
        <h1 style="text-align:center;">Profile</h1>
       
        <form action="Profile_update.php" method="post" enctype="multipart/form-data">
            <link href="ProfileStyles.css" rel="stylesheet" type="text/css">
            <div id = "profileForm">
               
              
                <!--<p><img src="https://twirpz.files.wordpress.com/2015/06/twitter-avi-gender-balanced-figure.png?w=640" id="output" width="100" height ="100"  /></p> -->
                <?php
                   // $sql = "SELECT * FROM users2 WHERE username = '".$_SESSION['username']."'";
                    //$sth = $conn->query($sql);
                    //$result=mysqli_fetch_assoc($sth);
                    $sql = "SELECT * FROM users2 WHERE username = '".$_SESSION['username']."'";
                    $sth = $conn->query($sql);
                    $result=mysqli_fetch_assoc($sth);
                    $profpic = $result['profilepic'];
                    $imgUrl = "photos/$profpic";
                    echo '<img src="'.$imgUrl.'" id="output" height="100" width="100">' ;

           ?>
                <p><?php echo $profpic ?>
                <p>Change Profile Picture: <input type="file"  accept=".jpg, .png" name="image" id="file"  onchange="loadFile(event)" ></p>
               


               <?php  ?>

    
           
                


            First Name: <input type = "text" name = "firstname" value = <?php $query = "SELECT * FROM users2 WHERE username = '".$_SESSION['username']."'";  $result = mysqli_query($conn,$query); while($row = mysqli_fetch_assoc($result)){  echo $row['firstName'] ;    }  ?>><br>  
            Last Name : <input type = "text" name = "lastname" value = <?php $query = "SELECT * FROM users2 WHERE username = '".$_SESSION['username']."'";  $result = mysqli_query($conn,$query); while($row = mysqli_fetch_assoc($result)){  echo $row['lastName'] ;    }  ?>><br>   
            Email: <input type="email" name="email" value = <?php $query = "SELECT * FROM users2 WHERE username = '".$_SESSION['username']."'";  $result = mysqli_query($conn,$query); while($row = mysqli_fetch_assoc($result)){  echo $row['email'] ;    }  ?>><br>     
            Password: <input type = "text" name = "pword" value = <?php $query = "SELECT * FROM users2 WHERE username = '".$_SESSION['username']."'";  $result = mysqli_query($conn,$query); while($row = mysqli_fetch_assoc($result)){  echo $row['password'] ;    }  ?>><br>  
            

           <?php 

/*$sql = "SELECT profilepic FROM user2 WHERE username = '".$_SESSION['username']."'";  
$sth = $conn->query($sql);
$result = mysqli_query($conn,$sql);  
 $row = mysqli_fetch_assoc($sth); 
   mysqli_close($conn);   
    header("Content-type: image/png");   
    echo $row['profilepic']; */
   
    ?>
            
            
<?php
         /*  $sql = "SELECT * FROM users2 WHERE username = '".$_SESSION['username']."'";
          $sth = $conn->query($sql);
         

           $result=mysqli_fetch_assoc($sth);
           

           $imgUrl = "photos/$profpic";
           echo $imgUrl;
          
            echo '<img src="'.$imgUrl.'" height="100" width="100">' ; */
        



           

        
         

           ?>
            
            <input type="submit" name="edit">

           

        </div> 
         </form>

    </body>
</html>
