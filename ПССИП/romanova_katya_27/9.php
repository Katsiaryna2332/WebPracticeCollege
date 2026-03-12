<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		$fh = fopen("f12.html", "r");
		$allowed_tags = "<br>";
		while (($line = fgets($fh, 2048)) !== false) {
			echo strip_tags($line, $allowed_tags);
		}
		fclose($fh);
	?>
</body>
</html>