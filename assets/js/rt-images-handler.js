
// rt Images Handler Script.
$(document).ready( function() {

  // Media model object.
  var frame;

  $('#add_images').on('click', function(event) {
    
    event.preventDefault();
    
    // If the media frame already exists, reopen it.
    if (frame) {
      frame.open();
      return;
    }
    
    // Else create a new media frame
    frame = wp.media({
      title: 'Select or Upload Images',
      button: {
        text: 'Select Images'
      },
      library: {
        type: 'image'
      },
      multiple: 'toggle'  // true, false, 'add', 'toggle'
    });

    // On click of Select Images
    frame.on('select', function() {
      
      // Get media attachment details from the frame state.
      var attachments = frame.state().get('selection').map( 
        function(attachment) {
          attachment.toJSON();
          return attachment;
        });

      for (i = 0 ; i < attachments.length ; i++) {
      	
        // Append an image to the image container by adding html.  
        $(".images_container").append( 
          '<li class="ui-state-default">'                               +
            '<div class="image_container">'                             +
              '<img src="' + attachments[i].attributes.url + '" />'                         +
              '<span class="close" ><i class="fa fa-close"></i></span>' +
              '<input type="hidden" name=images[] value="'              +
              attachments[i].id + '"/>'                                 +
              '</div>'                                                  +
          '</li>'
        );
      } 
    }); 
    
    // Open the wp_media modal.
    frame.open();
  });

  // Enable dragging and dropping.
  $('#sortable').sortable();
  $("#sortable").disableSelection();
  
  // Remove image on clicking cclose.
  $(document).on('click', '.close', function() {
    $(this).closest('li').remove();
  });

});	
