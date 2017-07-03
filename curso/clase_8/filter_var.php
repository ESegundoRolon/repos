<?php
	$email = "dasdas";
	$status = filter_var($email,FILTER_VALIDATE_EMAIL);
	var_dump($status);

	$email = "leangilutn@gmail.com";
	$status = filter_var($email,FILTER_VALIDATE_EMAIL);
	var_dump($status);


	$magic_quotes = "'OR '1'='1";
	$status = filter_var($magic_quotes,FILTER_SANITIZE_MAGIC_QUOTES);
	var_dump($status);

?>