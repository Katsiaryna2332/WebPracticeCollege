<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
        $bag_a = 21;
        $bag_b = 34;
        $bag_h = 6;

        $item_c = 15;
        $item_d = 40;
        $item_h = 15;

        if ($bag_a >= $bag_b && $bag_a >= $bag_h) {
            $bag1 = $bag_a;
            if ($bag_b >= $bag_h) {
                $bag2 = $bag_b;
                $bag3 = $bag_h;
            } else {
                $bag2 = $bag_h;
                $bag3 = $bag_b;
            }
        } elseif ($bag_b >= $bag_a && $bag_b >= $bag_h) {
            $bag1 = $bag_b;
            if ($bag_a >= $bag_h) {
                $bag2 = $bag_a;
                $bag3 = $bag_h;
            } else {
                $bag2 = $bag_h;
                $bag3 = $bag_a;
            }
        } else {
            $bag1 = $bag_h;
            if ($bag_a >= $bag_b) {
                $bag2 = $bag_a;
                $bag3 = $bag_b;
            } else {
                $bag2 = $bag_b;
                $bag3 = $bag_a;
            }
        }
        if ($item_c >= $item_d && $item_c >= $item_h) {
            $item1 = $item_c;
            if ($item_d >= $item_h) {
                $item2 = $item_d;
                $item3 = $item_h;
            } else {
                $item2 = $item_h;
                $item3 = $item_d;
            }
        } elseif ($item_d >= $item_c && $item_d >= $item_h) {
            $item1 = $item_d;
            if ($item_c >= $item_h) {
                $item2 = $item_c;
                $item3 = $item_h;
            } else {
                $item2 = $item_h;
                $item3 = $item_c;
            }
        } else {
            $item1 = $item_h;
            if ($item_c >= $item_d) {
                $item2 = $item_c;
                $item3 = $item_d;
            } else {
                $item2 = $item_d;
                $item3 = $item_c;
            }
        }
        if ($item1 <= $bag1 && $item2 <= $bag2 && $item3 <= $bag3) {
            echo "ТОВАР {$item_c}x{$item_d}x{$item_h} Помещается в сумку {$bag_a}x{$bag_b}x{$bag_h}";
        } else {
            echo "ТОВАР {$item_c}x{$item_d}x{$item_h} не помещается в сумку {$bag_a}x{$bag_b}x{$bag_h}";
        }
    ?>
</body>
</html>