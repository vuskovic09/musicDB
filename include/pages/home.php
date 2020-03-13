<?php
    $queryBands = "SELECT * FROM `bands` ORDER BY RAND() LIMIT 6";
    $execBands = $pdo->query($queryBands);    
    $dataBands = $execBands -> fetchAll();

    $queryAlbums = "SELECT *, albums.id as albumID FROM `albums`
                    LEFT JOIN `bands` ON `albums`.`band_id` = `bands`.`id`
                    ORDER BY RAND() LIMIT 6";
    $execAlbums = $pdo->query($queryAlbums);    
    $dataAlbums = $execAlbums -> fetchAll();
?>

<div class="content">

    <h1 class="article-title">Top Bands</h1>

    <div class="container">
        <div class="home-bands">
            <?php foreach($dataBands as $row){ ?>
                <div class="home-bands-card">

                    <?php  if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) { ?>
                    <span class="favorite" data-type="band" data-band="<?php echo $row['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg></span>
                    <?php } ?>

                    <a href="<?php echo $path . '/bands/' . $row['slug']; ?>" class="band-img" style="background-image: url(<?php echo $row['photo'] ?>)"></a>
                    <h3><?php echo($row['name']); ?></h3>
                    <p><?php echo($row['formed']); ?></p>
                </div>
            <?php }?>

        </div>
    </div>

    <h1 class="article-title">Top Albums</h1>

    <div class="container">

    <div class="home-albums">

        <?php foreach($dataAlbums as $row){ ?>
            <div class="home-albums-card">

                <?php  if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) { ?>
                <span class="favorite" data-type="album" data-album="<?php echo $row['albumID'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg></span>
                <?php } ?>

                <a href="<?php echo $path . '/bands/' . $row['slug'] . '/' . $row['album_slug']; ?>" class="band-img" style="background-image: url(<?php echo $row['image'] ?>)"></a>
                <h3><?php echo($row['name']); ?></h3>
                <h3><?php echo($row['title']); ?></h3>
                <p><?php echo($row['year']); ?></p>
            </div>
        <?php }?>

        </div>
    </div>
</div>