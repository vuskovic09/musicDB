<?php
    $query = "SELECT * FROM musicdb.bands ORDER BY RAND() LIMIT 6";
    $exec = $pdo->query($query);    
    $data = $exec -> fetchAll();

    foreach($data as $row){
        echo "-Name: " . $row['name'] . "-Formed: " . $row['formed'] . "</br>";
    }


// $query = $pdo->query("SELECT * FROM `bands` ORDER BY RAND() LIMIT 6");

// while($row = $query -> fetch()) {
//     echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . "- Year: " . $row["formed"] . "<br>";
// }

?>
Bands
