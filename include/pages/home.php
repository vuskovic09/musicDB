<?php
    $queryBands = "SELECT * FROM `bands` ORDER BY RAND() LIMIT 6";
    $execBands = $pdo->query($queryBands);    
    $dataBands = $execBands -> fetchAll();

    foreach($dataBands as $row){
        echo "-Name: " . $row['name'] . " -Formed: " . $row['formed'] . "</br>";
    }

    echo "</br></br>";

    $queryAlbums = "SELECT `bands`.`name`, `albums`.`title`, `albums`.`year` FROM `albums`
                    LEFT JOIN `songs` ON `songs`.`album_id` = `albums`.`id`
                    LEFT JOIN `bands` ON `songs`.`band_id` = `bands`.`id`
                    ORDER BY RAND() LIMIT 6";
    $execAlbums = $pdo->query($queryAlbums);    
    $dataAlbums = $execAlbums -> fetchAll();

    foreach($dataAlbums as $row){
        echo "-Band Name: " . $row['name'] . " -Title: " . $row['title'] . " -Released: " . $row['year'] . "</br>";
    }
?>
home