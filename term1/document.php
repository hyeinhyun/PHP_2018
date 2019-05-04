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
    case 'insert':
        $title=mysqli_real_escape_string($db,$_POST['title']);
        $content=mysqli_real_escape_string($db,$_POST['content']);
        $sql ="INSERT INTO board VALUES ("
        ."null,"."'{$username}',". "'{$title}',"."'{$content}',"."now())";
        $result= mysqli_query($db,$sql);
        header("Location: document.php"); 
        break;
    case 'delete':
        $id=mysqli_real_escape_string($db,$_POST['id']);
        $sql ="DELETE FROM board WHERE num=".$id;
        $result= mysqli_query($db,$sql);
        header("Location: document.php"); 
        break;
    case 'modify':
        $id=mysqli_real_escape_string($db,$_POST['id']);
        $title=mysqli_real_escape_string($db,$_POST['title']);
        $content=mysqli_real_escape_string($db,$_POST['content']);
        $sql ="UPDATE board SET title = '{$title}',content='{$content}' where num=".$id;
        $result= mysqli_query($db,$sql);
        header("Location: document.php"); 
        break;} }
?>
<?php
$sql="SELECT * FROM board WHERE uid='{$username}'";
$result = mysqli_query($db,$sql);
 
if(!empty($_GET['id'])) {
	$id=mysqli_real_escape_string($db,$_GET['id']);
	$sql_b= "SELECT * FROM board WHERE num='{$id}'";
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
                    <li><a href="input.php">add</a></li>
                </ul>
            </nav>
                </div>
        <div>
        <?php
        if(!empty($_GET['id'])) {
        	$row_b=mysqli_fetch_array($result_b);
        while($row_b){
		echo "<strong>"."no."."</strong>".$row_b["num"]."<br>"."<strong>"."user : "."</strong>".$row_b["uid"]."<br>"."<strong>"."title : "."</strong>".$row_b["title"]."<br>"."<strong>"."content : "."</strong>".$row_b["content"]."<br>"."<strong>"."date :"."</strong>".$row_b["date"]."<br>"; break;}
		echo "<br>";
		echo "<br>";
		echo "<br>";
		?>
		<form action="./document.php?mode=delete" method= "POST" >
			<input type="hidden" name="id" value="<?=$row_b['num']?>" />
			<input type="submit" value="Delete" />
			</form>
		<a href="modify.php?id=<?=$row_b['num']?>">modify</a>
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