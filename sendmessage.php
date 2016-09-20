<?php
	ob_start();
	$f1 = fopen("messages2.txt", "a");
	extract($_GET);
	fwrite($f1, $text);
	echo "$text";
	ob_flush();
	flush();	
?>