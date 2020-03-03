<?php
    $slug = basename($requestUri);

    $queryAlbums = "SELECT `bands`.`slug`, `albums`.`title`, `albums`.`year`, `bands`.`name`
                    FROM `albums`
                    LEFT JOIN `songs` ON `songs`.`album_id` = `albums`.`id`
                    LEFT JOIN `bands` ON `songs`.`band_id` = `bands`.`id`
                    GROUP BY `albums`.`title`
                    ORDER BY `albums`.`year`";
    $execAlbums = $pdo->query($queryAlbums);    
    $dataAlbums = $execAlbums -> fetchAll();

    foreach($dataAlbums as $row){
        if($slug == $row['slug']){
            echo "-Title: " . $row['title'] . " -Released: " . $row['year'] . "</br>";
        }
    }
?>

albums
