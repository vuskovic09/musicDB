$(document).ready(function(){

    $('.favorite').click(function(){
        var type = $(this).attr('data-type');
        console.log(type);

        if(type == "band") {
            var bandID = $(this).attr('data-band');
            console.log(bandID);
        } else {
            var albumID = $(this).attr('data-album');
            console.log(albumID);
        };

        $.ajax({
            url: 'services/update.php',
            type: 'POST',
            data: {user_id: $_SESSION['user_id'], liked: true, url_slug: $(location).attr('href')},
            cache: false,
            success: function(data){
                alert(data);
            }
        });
    });

})