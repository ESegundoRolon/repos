<?php
	$contenido = "<script> alert('entre') </script>";
	$contenido = strip_tags($contenido);
	file_put_contents("xss_content.txt", $contenido);


	$content = file_get_contents("xss_content.txt");
	echo $content;
?>