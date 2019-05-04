<?php
function my_rand(){
	$a=rand(10000,99999);
	
	return $a;
} ?>
<?php
if (isset($_POST['user'])){ 
	if($_POST['user']==$_POST['num']){echo "<script> alert ('welcome!') </script>"; 
}
	else {echo "<script> alert ('wrong!') </script>";}

}

?>
<html>
<head> </head>
<body>
<?php $a=my_rand();
echo $a?>
<br>
<form action = "captcha.php" method = "post">
				
    <label>User:</label><input type = "text" name = "user" class = "box"/><br><br>
    <input type="hidden" name="num" value="<?=$a?>" />
    <input type = "submit" name = "submit" value = " submit "/>
    </form>
               
</body>
</html>
