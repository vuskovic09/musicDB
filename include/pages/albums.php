<?php
    $query = "SELECT * FROM musicdb.albums ORDER BY RAND() LIMIT 6";
    $exec = $pdo->query($query);    
    $data = $exec -> fetchAll();

    foreach($data as $row){
        echo "-Title: " . $row['title'] . "-Year: " . $row['year'] . "</br>";
    }
?>
