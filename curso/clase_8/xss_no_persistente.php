<?php
	if($_POST["valor_xss"]){
		echo htmlspecialchars($_POST["valor_xss"]);
	}
?>
<form method="POST" name="xss">	
	<input type="text" name="valor_xss">
	<input type="submit" name="enviar" value="Enviar">
</form>