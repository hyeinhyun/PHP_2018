<?php
include("config.php");
session_start();
$username=$_SESSION['login_user'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
<?php
       if(isset($_GET['mode'])){
switch($_GET['mode']){
    
    case 'delete':
        $id=mysqli_real_escape_string($db,$_POST['id']);
        $sql ="DELETE FROM user_picture WHERE num=".$id;
        $result= mysqli_query($db,$sql);
        header("Location: picture.php"); 
        break;
    case 'modify':
        $id=mysqli_real_escape_string($db,$_POST['id']);
        $title=mysqli_real_escape_string($db,$_POST['title']);
        $description=mysqli_real_escape_string($db,$_POST['description']);
        $place=mysqli_real_escape_string($db,$_POST['place']);
    
        $sql ="UPDATE user_picture SET title = '{$title}',description='{$description}',place='{$place}' where num=".$id;
        $result= mysqli_query($db,$sql);
        header("Location: picture.php"); 
        break;} }
?>
<?php
$sql="SELECT * FROM user_picture WHERE uid='{$username}'";
$result = mysqli_query($db,$sql);
 
if(!empty($_GET['id'])) {
	$id=mysqli_real_escape_string($db,$_GET['id']);
	$sql_b= "SELECT * FROM user_picture WHERE num='{$id}'";
	$result_b = mysqli_query($db,$sql_b);
}
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <style type="text/css">
            body {
                font-size: 0.8em;
                font-family: dotum;
                line-height: 1.6em;
            }
            header {
                border-bottom: 1px solid #ccc;
                padding: 20px 0;
            }
            nav {
                float: left;
                margin-right: 20px;
                min-height: 1000px;
                min-width:150px;
                border-right: 1px solid #ccc;
            }
            nav ul {
                list-style: none;
                padding-left: 0;
                padding-right: 20px;
            }
            article {
                float: left;
            }
            .description{
                width:500px;
            }
        </style>
    </head>
   
    <body id="body">
        <div>
            <nav>
                <ul>
                    <?php
                    while($row = mysqli_fetch_array($result)) {
                        echo "<li><a href=\"?id={$row['num']}\">".htmlspecialchars($row['title'])."</a></li>";                        }
                    ?>
                </ul>
                <ul>
                  <li><a href="p_input.php">add</a></li>
                </ul>
            </nav>
                </div>
        <div>
        <?php
        if(!empty($_GET['id'])) {
        	$row_b=mysqli_fetch_array($result_b);
        while($row_b){
		echo "<img src='{$row_b[5]}' width='200' height='200'/>"."<br>";
        echo "Title : ".$row_b[2]."<br>";
        echo "Description : ".$row_b[3]."<br>";
        echo "Date : ".$row_b[6]."<br>";
        echo "<br>"; break;}
		?>
		<form action="./picture.php?mode=delete" method= "POST" >
			<input type="hidden" name="id" value="<?=$row_b['num']?>" />
			<input type="submit" value="Delete" />
			</form>
		<a href="p_modify.php?id=<?=$row_b['num']?>">modify</a>
		<?php
		
		}
		?>
		</div>
	<br>
   <br>
   <br>
   <br>
   <br>
   <div style="text-align:right"><button><a href="logout.php">LOGOUT </a>
   </button>
   <div style="text-align:right"><button><a href="success.php">go to board </a></button>
    </body>
</html>