<?php 
    try { 
    $mysqli = new mysqli("localhost", "root", "",  
    "guestbookR"); 
    if ($mysqli->connect_errno) { 
        throw new Exception($mysqli->connect_error); 
    } 
    $sql = 'SELECT * FROM message'; 
    if (!($result = $mysqli->query($sql))) { 
        throw new Exception($mysqli->error); 
    } 
    $data = $result->fetch_all(MYSQLI_ASSOC); 
    $result->free(); 
    foreach ($data as $row) { 
        echo $row['id'] . '. ' . $row['name'] . ' - ' .  
        $row['message_text'] . ' (' .  
        $row['message_date'] . ')<br/>'; 
    } 
    $mysqli->close(); 
    } catch(Exception $e) { 
        echo $e->getMessage(); 
    }
?>