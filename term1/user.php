<?php
   include("config.php");
   if(isset($_GET['mode'])){
   switch($_GET['mode']){
    case 'join':
        $uid=mysqli_real_escape_string($db,$_POST['username']);
        $pwd=mysqli_real_escape_string($db,$_POST['password']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $phonenum=mysqli_real_escape_string($db,$_POST['phonenum']);
        $sql ="INSERT INTO user VALUES ("."'{$uid}',". "'{$pwd}',"."'{$email}',"."'{$phonenum}',"."now())";
        $result= mysqli_query($db,$sql);
        echo "<script> alert ('welcome!') </script>";
        break;
    case 'out':
        $uid=mysqli_real_escape_string($db,$_POST['username']);
        $pwd=mysqli_real_escape_string($db,$_POST['password']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $phonenum=mysqli_real_escape_string($db,$_POST['phonenum']);
        $sql ="DELETE FROM user WHERE uid="."'{$uid}'and "."pwd="."'{$pwd}'and "."email="."'{$email}'and "."phone_num="."'{$phonenum}'";
        $result= mysqli_query($db,$sql);
        echo "<script> alert ('Bye :<') </script>"; 
        break;
    case 'find':
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $phonenum=mysqli_real_escape_string($db,$_POST['phonenum']);
        $sql ="SELECT * FROM user WHERE email="."'{$email}'and "."phone_num="."'{$phonenum}'";
        $result= mysqli_query($db,$sql);
        $row=mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        if($count==1){
        $uid= $row['uid'];
        $pwd= $row['pwd'];
        echo "<script> alert ('your id is $uid, and your password is $pwd.') </script>";}
        else echo "<script> alert ('There is no user who has that email or phone number') </script>";
    case 'update':
        $uid=mysqli_real_escape_string($db,$_POST['username']);
        $pwd=mysqli_real_escape_string($db,$_POST['password']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $phonenum=mysqli_real_escape_string($db,$_POST['phonenum']);
        $sql ="SELECT * FROM user WHERE uid="."'{$uid}'and "."pwd="."'{$pwd}'";
        $result= mysqli_query($db,$sql);
        $row=mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        if($count==1){
        $sql ="UPDATE user SET email="."'{$email}', "."phone_num="."'{$phonenum}'"."WHERE uid="."'{$uid}'and "."pwd="."'{$pwd}'";
        $result=mysqli_query($db,$sql);
        echo "<script> alert ('now your email is $email, and your phone number is $phonenum.') </script>";}
        else echo "<script> alert ('There is no user who has that id or phone pwd') </script>";}}
        ?>


<html>
   
   <head>
      <title>JOIN&OUT</title>
      
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>JOIN</b></div>
            
            <div style = "margin:30px">
               
               <form action = "./user.php?mode=join" method = "post">
                  <label>UserID  :</label><input type = "text" name = "username" class = "box"/><br><br>
                  <label>Password  :</label><input type = "text" name = "password" class = "box"/><br><br >
                  <label>email  :</label><input type = "email" name = "email" class = "box"/><br><br>
                  <label>phonenum  :</label><input type = "text" name = "phonenum" class = "box"/><br><br >
                  <input type = "submit" value = " Join! "/>
               </form>
               
            </div>
            
         </div>
         
      </div>
            <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>OUT</b></div>
            
            <div style = "margin:30px">
               
               <form action = "./user.php?mode=out" method = "post">
                  <label>UserID  :</label><input type = "text" name = "username" class = "box"/><br><br>
                  <label>Password  :</label><input type = "text" name = "password" class = "box"/><br><br >
                  <label>email  :</label><input type = "email" name = "email" class = "box"/><br><br>
                  <label>phonenum  :</label><input type = "text" name = "phonenum" class = "box"/><br><br >
                  <input type = "submit" value = " BYE:< "/>
               </form>
               
            </div>
            <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>FIND</b></div>
            
            <div style = "margin:30px">
               
               <form action = "./user.php?mode=find" method = "post">
                  <label>email  :</label><input type = "email" name = "email" class = "box"/><br><br>
                  <label>phonenum  :</label><input type = "text" name = "phonenum" class = "box"/><br><br >
                  <input type = "submit" value = " FIND ME :) "/>
               </form>
         </div>
         <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>UPDATE</b></div>
            
            <div style = "margin:30px">
               
               <form action = "./user.php?mode=update" method = "post">
                  <label>UserID  :</label><input type = "text" name = "username" class = "box"/><br><br>
                  <label>Password  :</label><input type = "text" name = "password" class = "box"/><br><br >
                  <label>email  :</label><input type = "email" name = "email" class = "box"/><br><br>
                  <label>phonenum  :</label><input type = "text" name = "phonenum" class = "box"/><br><br >
                  <input type = "submit" value = " Update info "/>
               </form>
      </div>
   </div>

      <br>
   <br>
   <br>
   <br>
   <br>
   <div style="text-align:right"><button><a href="login.php">go to home </a></button>
   </body>
</html>