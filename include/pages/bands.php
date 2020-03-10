<?php
    $query = "SELECT * FROM `bands` ORDER BY `name`";
    $exec = $pdo->query($query);    
    $data = $exec -> fetchAll();

    foreach($data as $row){
        echo "-Name: " . $row['name'] . " -Formed: " . $row['formed'] . "</br>";
    }
?>
