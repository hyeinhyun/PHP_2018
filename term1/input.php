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
        <form action="./document.php?mode=insert" method="POST">
            <p>TITLE : <input type="text" name="title"></p>
            <p>BODY: <textarea name="content" cols="30" rows="10"></textarea></p>
            <p><input type="submit" value="add"/></p>            
        </form>
    </body>
</html>
