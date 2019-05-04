<?php
include("config.php");
session_start();
$username=$_SESSION['login_user'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
<?php
// picture.php?mode=insert
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["p_path"]["name"]);
move_uploaded_file($_FILES["p_path"]["tmp_name"], $target_file);


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
		$title=mysqli_real_escape_string($db,$_POST['title']);
        $description=mysqli_real_escape_string($db,$_POST['description']);
        $place=mysqli_real_escape_string($db,$_POST['place']);
        $p_path=mysqli_real_escape_string($db,$target_file);
        $sql ="INSERT INTO user_picture VALUES ("
        ."null,"."'{$username}',". "'{$title}',"."'{$description}',"."'{$place}',"."'{$p_path}',"."now())";
        $result= mysqli_query($db,$sql);
    header("location:picture.php");
    
}
else echo"woron";

?>
