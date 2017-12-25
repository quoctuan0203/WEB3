<h4>Chào bạn <?php echo $_SESSION['email']; ?></h4>
<form method="post" action="index.php"><input type="submit" name="thoat" value="Thoát"></form>
<?php
	if(isset($_POST['thoat']))
	{
		unset($_SESSION['email']);
	}
?>