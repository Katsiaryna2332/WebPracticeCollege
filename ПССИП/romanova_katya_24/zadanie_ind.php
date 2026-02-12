<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
        $k = 12;
        $n = 3; 
        $mode = 2;   
        $colors = ["#fa4949ff", "#f6f632ff", "#38d938ff"];
        echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; text-align:center;'>";
        echo "<tr><th>Номер</th>";

        if ($mode == 1) {
            echo "<th>Число</th></tr>";
        } else {
            for ($j = 1; $j <= $n; $j++) {
                echo "<th>Число $j</th>";
            }
            echo "</tr>";
        }

        for ($i = 1; $i <= $k; $i++) {
            $bgColor = $colors[($i - 1) % 3];
            $gray = intval(255 * ($i - 1) / ($k - 1));
            $fontColor = "rgb($gray, $gray, $gray)";
            echo "<tr style='background:$bgColor; color:$fontColor;'>";
            echo "<td>$i</td>";
            if ($mode == 1) {
                echo "<td>" . rand(1, 100) . "</td>";
            } else {
                for ($j = 1; $j <= $n; $j++) {
                    echo "<td>" . rand(1, 100) . "</td>";
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    ?>
</body>
</html>