<?php
   include("config.php");
   session_start();
   $error = "";
   if(!isset($_POST['Login'])){
      $_SESSION['s_count']=3;
   }
  
   if(isset($_POST['Login'])) {
      // username and password sent from form       
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $sql = "SELECT * FROM user WHERE uid = '$myusername' and pwd = '$mypassword';";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      $row=mysqli_fetch_array($result);
      $user_email=$row['email'];
      //echo $user_email;

      if($count==1){
         $_SESSION['login_user'] = $myusername;  
        // $_SESSION['login_email'] = $user_email;       
         header("location: .\success.php");
      }
      else {
         if($_SESSION['s_count']>0){
         $error = "Your Login Name or Password is invalid";
         $_SESSION['s_count']--;
         $oppo=$_SESSION['s_count'];
         echo "<script> alert ('you have $oppo opportunity!') </script>";
         }
         else
            login_lock();


      }      
   }
function login_lock(){
   if(!isset($_SESSION['start'])){
   $_SESSION['start']=time();
   $_SESSION['expire']=time()+30;
   echo "<script> alert ('Wrong:< Wait 10 seconds for re-login') </script>";
   }
   else{
      if(time()>$_SESSION['expire']){
         session_unset();
         $_SESSION['s_count']=3;
         echo "<script> alert ('Try re-login') </script>";
      }
      else echo "<script> alert ('wait for a second!') </script>";
}}

?>


<html>
   
   <head>
      <title>Login Page</title>
      
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
         box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            
            <div style = "margin:30px">
               
               <form action = "login.php" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br><br>
                  <label>Password  :</label><input type = "password" name = "password" class = "box"/><br><br >
                  <input type = "submit" name = "Login" value = " Login "/>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?=$error?></div>
               
            </div>
            
         </div>
         
      </div>
      <div style="text-align:right"><button><a href="user.php">Join with us! </a></button>
      </div>
      
   </body>
</html>