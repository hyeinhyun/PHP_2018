<?php 
   include("config.php");
session_start();
$username=$_SESSION['login_user'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
   $id=mysqli_real_escape_string($db,$_GET['id']);
   $sql= "SELECT * FROM board WHERE num='{$id}'";
   $result=mysqli_query($db,$sql);
   $topic = mysqli_fetch_array($result);
   ?>

<!DOCTYPE html>
<html>
    <head>
    </head>   
    <body>
        <form action="./document.php?mode=modify" method="POST">
          <input type="hidden" name="id" value="<?=$topic['num']?>" />
            <p>TITLE : <input type="text" name="title" value="<?=htmlspecialchars($topic['title'])?>"></p>
            <p>BODY: <textarea name="content" cols="30" rows="10"><?=htmlspecialchars($topic['content'])?> </textarea></p>
            <p><input type="submit" value="submit" /></p>            
        </form>
    </body>
</html>