<?php 

if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) {
    $userID = $_SESSION['loggedUserId'];

    $queryBands = "SELECT 'band_id' FROM favorites WHERE user_id = '$userID'";
    $queryAlbums = "SELECT 'album_id' FROM favorites WHERE user_id = '$userID'";
    $querySongs = "SELECT 'song_id' FROM favorites WHERE user_id = '$userID'";

    #group execute
}

?>