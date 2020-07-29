<?php
    $slug = basename($requestUri);
    $slugStrip = str_replace("-", " ", $slug);

    $querySongs = "SELECT `bands`.`name`, `albums`.`title` as 'albumTitle', `albums`.`year`, `albums`.`album_slug`, `songs`.`title`
                    FROM `albums`
                    LEFT JOIN `bands` ON `albums`.`band_id` = `bands`.`id`
                    LEFT JOIN `songs` ON `songs`.`album_id` = `albums`.`id`
                    WHERE `songs`.`album_id` = `albums`.`id`
                    ORDER BY `songs`.`title`";

    $execSongs = $pdo->query($querySongs);
    $dataSongs = $execSongs -> fetchAll();
?>

<div class="content">
    <h3 class="article-title"><?php echo $slugStrip; ?></h3>
    <div class="container">
        <table class="songTable">
            
            <?php if($slug == 'songs'){?>
            <thead> 
                <tr> 
                    <th>Band Name</th> 
                    <th>Album Title</th> 
                    <th>Song Name</th>
                </tr> 
            </thead>
            <tbody>
            <?php foreach($dataSongs as $rowSongs) {?>
                <tr>
                    <td><?php echo($rowSongs['name']) ?></td>
                    <td><?php echo($rowSongs['albumTitle']) ?></td>
                    <td><?php echo($rowSongs['title']) ?></td>
                </tr>
            <?php } } else {?>
            <thead> 
                <tr>  
                    <th>Song Name</th>
                </tr> 
            </thead>
            <tbody>
            <?php foreach($dataSongs as $rowSongs) {
            if ($rowSongs['album_slug'] == $slug){
            ?>
                <tr>
                    <td><?php echo($rowSongs['title']) ?></td>
                </tr>
            <?php }}} ?>
            </tbody>
        </table>
    </div>
</div>