<?php
	ob_start();
	header("Content-type:text/event-stream");
	
	$data = array();
	$flag = 0;
	while(true)
	{
		clearstatcache();
		$f1 = fopen("messages2.txt", "r+");
		if(filesize("messages2.txt") > 0)
		{
			$text =  fread($f1, filesize("messages2.txt"));
			fclose($f1);
			file_put_contents("messages2.txt", "");
			if($text != "")
			{
				echo "event:myevent\n";
				echo "data:$text\n\n";
				//Here the last line ends with a \n\n.. like up there.. otherwise end with \n onlyn
				ob_flush();
				flush();
				$count++;
			}
		}
		sleep(1);
	}

?>