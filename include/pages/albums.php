<?php
    $slug = basename($requestUri);
    $slugStrip = str_replace("-", " ", $slug);

    $queryBands = "SELECT * FROM `bands` ORDER BY `bands`.`name`";
    $execBands = $pdo->query($queryBands);
    $dataBands = $execBands -> fetchAll();

    $queryAlbums = "SELECT *
                    FROM `albums`
                    LEFT JOIN `bands` ON `albums`.`band_id` = `bands`.`id`
                    GROUP BY `albums`.`title`
                    ORDER BY `bands`.`name`";
    $execAlbums = $pdo->query($queryAlbums);    
    $dataAlbums = $execAlbums -> fetchAll();
?>

<div class="content">
    <?php if($slug == 'albums'){
        foreach($dataBands as $rowBands){?>
            <h3 class="article-title"><?php echo $rowBands['name'] ?></h3>
            <div class="container">
                <div class="article">
            <?php foreach($dataAlbums as $row) {
                if($row['name'] == $rowBands['name']){?>
                    <div class="article-card">
                        <a href="<?php echo $path . '/bands/' . $row['slug'] . '/' . $row['album_slug']; ?>" class="band-img" style="background-image: url(<?php echo $row['image'] ?>)"></a>
                        <h3><?php echo($row['title']); ?></h3>
                        <p><?php echo($row['year']); ?></p>
                    </div>        
            <?php }} ?>
                </div>
            </div>
    <?php } } else {?>
        <h3 class="article-title"><?php echo $slugStrip; ?></h3>
        <div class="container">
            <div class="article">
            <?php foreach($dataAlbums as $rowAlbums) {
                if($slug == $rowAlbums['slug']){?>
                <div class="article-card">
                    <a href="<?php echo $path . '/bands/' . $rowAlbums['slug'] . '/' . $rowAlbums['album_slug']; ?>" class="band-img" style="background-image: url(<?php echo $rowAlbums['image'] ?>)"></a>
                    <h3><?php echo($rowAlbums['title']); ?></h3>
                    <p><?php echo($rowAlbums['year']); ?></p>
                </div> 
        <?php }}} ?>
        </div>
    </div>
</div>