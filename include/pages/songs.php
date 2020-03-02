<?php
$query = $mysqli->query("SELECT * FROM `songs` ORDER BY RAND() LIMIT 6");

while($row = $query -> fetch_assoc()) {
    echo "<br> id: ". $row["id"]. " - Name: ". $row["title"]. "<br>";
}

?>
