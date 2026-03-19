<?php 
    try { 
    mysqli_report(MYSQLI_REPORT_ERROR |  
    MYSQLI_REPORT_STRICT); 
    $mysqli = new mysqli("localhost", "root", "",  
    "guestbookR"); 
    $sql = 'SELECT COUNT(*) FROM message'; 
    $result = $mysqli->query($sql); 
    $n = $result->fetch_row()[0]; 
    echo "$n строк<br>"; 
    $k = 0; 
    $m = 5; 
    $sql = "SELECT id, name, message_text, message_date 
    FROM message ORDER BY id DESC LIMIT $k, $m"; 
    $result = $mysqli->query($sql); 
    $data = $result->fetch_all(MYSQLI_ASSOC); 
    foreach ($data as $row) { 
        echo $row['id'] . '. ' . $row['name'] . ' - ' . 
        $row['message_text'] . ' (' .  
        $row['message_date'] . ')<br>'; 
    } 
    } catch(Throwable $e) { 
        echo $e->getMessage(); 
    }
?>