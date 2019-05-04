<?php 
session_start();
$username=$_SESSION['login_user'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
   ?>

<!DOCTYPE html>
<html>
    <head>
    </head>   
    <body>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <p>TITLE : <input type="text" name="title" ></p>
            <p>DESCRIPTION : <input type="text" name="description"></p>
            <p>PLACE : <input type="text" name="place"></p>
            <p>picture path : <input type="file" name="p_path" id="p_path"></p>
            <p><input type="submit" name="submit" value="add"/></p>            
        </form>
    </body>
</html>