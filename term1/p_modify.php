<?php 
   include("config.php");
session_start();
$username=$_SESSION['login_user'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
   $id=mysqli_real_escape_string($db,$_GET['id']);
   $sql= "SELECT * FROM user_picture WHERE num='{$id}'";
   $result=mysqli_query($db,$sql);
   $topic = mysqli_fetch_array($result);
   ?>

<!DOCTYPE html>
<html>
    <head>
    </head>   
    <body>
        <form action="./picture.php?mode=modify" method="POST">
          <input type="hidden" name="id" value="<?=$topic['num']?>" />
            <p>TITLE : <input type="text" name="title" value="<?=htmlspecialchars($topic['title'])?>"></p>
            <p>DESCRIPTION : <input type="text" name="description" value="<?=htmlspecialchars($topic['description'])?>"></p>
            <p>PLACE : <input type="text" name="place" value="<?=htmlspecialchars($topic['place'])?>"></p>

            <p><input type="submit" value="submit" /></p>            
        </form>
    </body>
</html>