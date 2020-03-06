<?php
    $queryBands = "SELECT * FROM `bands` ORDER BY RAND() LIMIT 6";
    $execBands = $pdo->query($queryBands);    
    $dataBands = $execBands -> fetchAll();

    $queryAlbums = "SELECT `bands`.`name`, `albums`.`title`, `albums`.`year` FROM `albums`
                    LEFT JOIN `songs` ON `songs`.`album_id` = `albums`.`id`
                    LEFT JOIN `bands` ON `songs`.`band_id` = `bands`.`id`
                    ORDER BY RAND() LIMIT 6";
    $execAlbums = $pdo->query($queryAlbums);    
    $dataAlbums = $execAlbums -> fetchAll();
?>

<div class="home">
    <div class="home-bands">

        <?php foreach($dataBands as $row){ ?>
            <div class="home-bands-card">
                <h3><?php echo($row['name']); ?></h3>
                <p><?php echo($row['formed']); ?></p>
            </div>
        <?php }?>

    </div>

    <div class="home-albums">

        <?php foreach($dataAlbums as $row){ ?>
            <div class="home-albums-card">
                <h3>Band name: <?php echo($row['name']); ?></h3>
                <h3><?php echo($row['title']); ?></h3>
                <p><?php echo($row['year']); ?></p>
            </div>
        <?php }?>

    </div>
</div>