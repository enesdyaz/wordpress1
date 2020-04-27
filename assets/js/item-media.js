(function () {

    // media init
var media = wp.media({
    title: 'title1234',
    button: {
        text: 'button1234'
    },
    multiple: 'toggle'
});

// add event -> open the window of the media
document.querySelector('.image-button').addEventListener('click', function(){
    media.open();
    console.log('open');
});


//  images are saved to attachment
media.on('select', function(){
    var attachment =  media.state().get('selection').toJSON();
    var image_id = [];
    var extra_url = [];

    for(var i=0;i<attachment.length;i++){
        var image_url = ' <img src=" '+ attachment[i].sizes.thumbnail.url +'" />  ';
        document.querySelector('.image-show').innerHTML += image_url;

     
        image_id.push(attachment[i].id);  
        extra_url.push(attachment[i].sizes.medium.url);  
    }

    document.querySelector('.image-id').value = image_id;
    document.querySelector('.image-url').value = extra_url;

});


// showing the images in WP-admin
if(document.querySelector('.image-id').value){
    var media_id = (document.querySelector('.image-id').value).split(',');
    media_id.forEach(myfunction);

    function myfunction(item){
        wp.media.attachment(item).fetch().then(function(attachment){
            var image_url = ' <img src=" '+ attachment.sizes.thumbnail.url +'" />  ';
            var extra_url = attachment.sizes.medium.url;
            document.querySelector('.image-show').innerHTML += image_url;
            
        });
        
    }


}




}());  // function end

