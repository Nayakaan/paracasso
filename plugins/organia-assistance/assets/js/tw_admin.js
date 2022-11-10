jQuery(document).ready(function($) {
    $('#wpwrap').on('click', '.abis_social', function(e) {
        if($(this).prop("checked") == true){
            $(this).parents("p").siblings(".all_socials").fadeIn('slow');
        }
        else if($(this).prop("checked") == false){
            $(this).parents("p").siblings(".all_socials").fadeOut('slow');
        }
    });
    $('#wpwrap').on('click', '.fl_uplogos', function(e) {
        e.preventDefault();
        var $this = $(this);

        var custom_uploader = wp.media({
            title: 'Logo Image',
            button: {
                text: 'Insert Logo'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.logourls').val(attachment.url);

            })
            .open();
    });
    $('#wpwrap').on('click', '.fl_uplogos2', function(e) {
        e.preventDefault();
        var $this = $(this);

        var custom_uploader = wp.media({
            title: 'Logo Image',
            button: {
                text: 'Insert Logo'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.logourls2').val(attachment.url);

            })
            .open();
    });
    
    $('#wpwrap').on('click', '.comon_uploader', function(e) {
        e.preventDefault();
        var $this = $(this);
        

        var custom_uploader = wp.media({
            title: 'Upload Files',
            button: {
                text: 'Upload Files'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $this.siblings('input.comon_linkholder').val(attachment.url);
                $this.siblings('input.comon_idholder').val(attachment.id);
            })
            .open();
    });
    
    $('#wpwrap').on('click', '.file_linkeds', function(e) {
        e.preventDefault();
        var $this = $(this);
        

        var custom_uploader = wp.media({
            title: 'Upload Files',
            button: {
                text: 'Upload Files'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $this.siblings('input.fl_links').val(attachment.url);
                $this.siblings('input.fl_ids').val(attachment.id);
            })
            .open();
    });
    
    $(document).on('click', '.uploder_btn', function(e) {
        e.preventDefault();
        var $this = $(this);
        var custom_uploader = wp.media({
            title: 'Upload Image',
            button: {
                text: 'Upload Image'
            },
            multiple: false
        })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $this.siblings('.uploaded_image_url').val(attachment.url).trigger('change');
                $this.siblings('.uploaded_image_id').val(attachment.id);
            })
            .open();
    });
    
    var myplugin_media_upload;
    $('#wpwrap').on('click', '.upload_gallery_images', function(e) {
        e.preventDefault();
        var $this = $(this);

        // If the uploader object has already been created, reopen the dialog
        if( myplugin_media_upload ) {
            myplugin_media_upload.open();
            return;
        }
        myplugin_media_upload = wp.media.frames.file_frame = wp.media({
            title: 'Gallery Image',
            button: {text: 'Upload Images'},
            multiple: true 
        });
        myplugin_media_upload.on( 'select', function(){
            var attachments = myplugin_media_upload.state().get('selection').map( function( attachment ) {
                attachment.toJSON();
                return attachment;
            });

            

            var i;
            var ids = [];
            var htmls = '';
            for (i = 0; i < attachments.length; ++i) {
                ids.push(attachments[i].id);
                htmls += '<img src="' + attachments[i].attributes.url + '" alt="">';
            }
            $this.next('.gallery_images').val(ids.join(","));
            $this.prev('.gallery_holders').addClass('show').html(htmls);
            
            var $form = $this.parent('.widget-content').parent('form');
            $('input[type="submit"]', $form).removeAttr('disabled');
        });
        
        myplugin_media_upload.on('open', function(){
            var selection = myplugin_media_upload.state().get('selection');
            var selecteds = $this.siblings('.gallery_images').val();
            if(selecteds != ''){
                selecteds = selecteds.split(',');
                if(selecteds.length > 0){
                    $.each( selecteds, function( key, value ) {
                        selection.add(wp.media.attachment(value));
                    });
                }
            }
        });
    });
    
    $('.clear_gallery_images').click(function(e){
        e.preventDefault();
        var $this = $(this);
        $this.siblings('.gallery_images').val('');
        $this.siblings('.gallery_holders').removeClass('show').html('');
            
        var $form = $this.parent('.widget-content').parent('form');
        $('input[type="submit"]', $form).removeAttr('disabled');
    });

    $(document).on('click', '.useravatar_upload', function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Custom Image',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.user_logo').fadeIn('slow').attr('src', attachment.url);
            $('.user_avater_url').val(attachment.url);
            $('#user_av_ID').val(attachment.id);
        })
        .open();
    });
});
