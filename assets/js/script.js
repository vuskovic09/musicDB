$(document).ready(function(){

    $('.favorite').click(function(){
        if($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }

        var type = $(this).attr('data-type');
        var uID = $(this).attr('data-user')
        console.log(type);
        console.log(uID);

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
            data: {type, uID    },
            cache: false,
            success: function(data){
                alert(data);
            }
        });
    });

})