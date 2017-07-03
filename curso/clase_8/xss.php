<?php 
if(isset($_POST['comentario']))
{
	//echo $_POST['comentario'];
	//echo "<script>alert('hackeado')</script>";
	echo htmlspecialchars($_POST['comentario']);
}
?>
<form action="" method ="post">
	<input type = "text" name = "comentario" value =""/>
	<input type = "submit" name = "enviar" value ="Enviar"/>
</form>