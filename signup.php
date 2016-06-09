<?php
include("config.php");

      session_start();
      $errorFailedSignup = "";
      $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "INSERT INTO admin (username,passcode) VALUES('$myusername','$mypassword')";


      if(mysqli_query($db,$sql))
      {
         ?>
         <script>alert('Thank you for registering with Grey Box Software Solutions');</script>

         <?php
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }
      else 
      {
         $error = "Error registering. Please try again and contact system administrator if problem persists";
      }
     
      //$sql = "SELECT ID FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      //$result = mysqli_query($db,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      //$count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      //if($count == 1) {
        // session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
         
         //header("location: welcome.php");
      //}else {
         //$error = "Your Login Name or Password is invalid";
      }
   
?>



<html>
   
   <head>
      <title>Signup Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Signup</b></div>
				
            <div style = "margin:30px">

            <h1>Welcome to Grey Box Software Solutions. Fill out the form below to gain exclusive access to some of our sites most richest content! </h1> 
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Enter you Password  :</label><input type = "password" name = "password" class = "box"/><br /><br />
                  <label>Re enter your password :</label><input type = "password" name = "confirmpassword" class = "box" /><br/><br />
                  <input type = "submit" value = " Sign Up Now! "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>