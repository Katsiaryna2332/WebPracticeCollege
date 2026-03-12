<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		$data_file = "C:/OSPanel/home/romanova_katya_27/data.txt";
		copy($data_file, $data_file."copy.txt") or die("Нe могу создать копию $data_file");
	?>
</body>
</html>