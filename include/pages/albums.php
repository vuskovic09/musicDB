<?php
    $slug = basename($requestUri);

    $queryAlbums = "SELECT *
                    FROM `albums`
                    LEFT JOIN `bands` ON `albums`.`band_id` = `bands`.`id`
                    GROUP BY `albums`.`title`
                    ORDER BY `albums`.`year`";
    $execAlbums = $pdo->query($queryAlbums);    
    $dataAlbums = $execAlbums -> fetchAll();
?>

<div class="band-albums">

    <?php foreach($dataAlbums as $row){ 
            if($slug == $row['slug']){?>
                <div class="home-albums-card">
                    <a href="<?php echo $path . '/bands/' . $row['slug'] . '/' . $row['album_slug']; ?>" class="band-img" style="background-image: url(<?php echo $row['image'] ?>)"></a>
                    <h3><?php echo($row['title']); ?></h3>
                    <p><?php echo($row['year']); ?></p>
                </div>
    <?php } }?>

    </div>