<?php
include("config.php");
session_start();
$username=$_SESSION['login_user'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }

   $sql = "SELECT * FROM board ORDER BY num;";
   $result = mysqli_query($db,$sql);

   //   echo $_SESSION['login_user']" Welcome!";
//   $sql="select * from board;";
 //  $user_email=$_SESSION['login_email'];
 //  $sql = "insert into board values({$user_name},{$user_email},);";
   ?>
<html>
<head> <div style="text-align:center"><strong>BOARD</strong> <div style="text-align:center"></head>
<body>
   </br>
   </br>
    <?php echo "Welcome!   "?><b><?php echo $username ?></b>  <?php echo  "    Nice meet you :) "; ?>
   <br>
   <br>
   <br>
   <br>   
   <button><a href="document.php">Management_Document </a></button>
   <br>
   <br>
   <br>
   <div style="text-align:left">
   <?php
   while($row = mysqli_fetch_array($result)) 
                        echo "<li>".htmlspecialchars($row['0'])." | ".htmlspecialchars($row['1'])." | ".htmlspecialchars($row['2'])." | ".htmlspecialchars($row['3'])." | ".htmlspecialchars($row['4'])."</li>";           
?>
   </div style="text-align:left">
   <br>
   <br>
   <br>
   <br>
   <br>
   <div style="text-align:right"><button><a href="logout.php">LOGOUT </a></button>
   </div>
   <div>
      your profile photos
</div>
      <div style="text-align:right"><button><a href="picture.php">PICTURE MANAGEMENT </a></button>
      </div>
      <br/>
      <br>
      <br>
      <br>
<?php
   $sql = "SELECT * FROM user_picture where uid='$username';";
   $result = mysqli_query($db,$sql);
   
   $count = mysqli_num_rows($result);
   if($count==0){
      echo "there is no picture. Please upload";
   }
   else {
      
      for($i=0;$i<$count;$i++){
      $row=mysqli_fetch_array($result);
      echo "<img src='{$row[5]}' width='200' height='200'/>"."<br>";
      echo "Title : ".$row[2]."<br>";
      echo "Description : ".$row[3]."<br>";
      echo "Date : ".$row[6]."<br>";
      echo "<br>";
      

      }
   }
   ?>

      <div>

</body>
</html>