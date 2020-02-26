<?php
$query = $mysqli -> query("SELECT * FROM `bands` ORDER BY RAND() LIMIT 10");
$result = $mysqli -> query($query);

if ($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["lastname"] . "<br>";
    }
} else {
    echo "0 results";
}

?>
