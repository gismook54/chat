$(document).ready(function() {
	
    var textito = "";
               var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

               for( var i=0; i < 10; i++ )
                   textito += possible.charAt(Math.floor(Math.random() * possible.length));
                 
                console.log(textito);
    
	// enable fileupload plugin
	$('input[name="files"]').fileuploader({
        captions: 'es',
        limit: 1,
        
        onSelect: function(item) {
            if (!item.html.find('.fileuploader-action-start').length)
                item.html.find('.fileuploader-action-remove').before('<button type="button" class="fileuploader-action fileuploader-action-start" title="Upload"><i class="fileuploader-icon-upload"></i></button>');
                
        },
		upload: {
            url: 'fo/php/ajax_upload_file.php',
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            start: false,
            synchron: true,
            chunk: 10,
            beforeSend: function(item) {
				//var input = ;
               
                
                var input = textito;
				
				// set the POST field
				if(input.length)
					item.upload.data.custom_name = textito;
				
				// reset input value
				input ="";
			},
            onSuccess: function(result, item) {
                var data = {};
				
				if (result && result.files)
                    data = result;
                else
					data.hasWarnings = true;
				
				// get the new file name
                if(data.isSuccess && data.files[0]) {
                    item.name = data.files[0].name;
                    item.html.find('.column-title div').animate({opacity: 0}, 400);
                }
                
                item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');
                setTimeout(function() {
					item.html.find('.column-title div').attr('title', item.name).text(item.name).animate({opacity: 1}, 400);
                    item.html.find('.progress-bar2').fadeOut(400);
                }, 400);
            },
            onError: function(item) {
				var progressBar = item.html.find('.progress-bar2');
				
				// make HTML changes
				if(progressBar.length > 0) {
					progressBar.find('span').html(0 + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
					item.html.find('.progress-bar2').fadeOut(400);
				}
                
                item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
                    '<button type="button" class="fileuploader-action fileuploader-action-retry" title="Retry"><i class="fileuploader-icon-retry"></i></button>'
                ) : null;
            },
            onProgress: function(data, item) {
                var progressBar = item.html.find('.progress-bar2');
				
				// make HTML changes
                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('span').html(data.percentage + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            },
            onComplete: null,
        },
		onRemove: function(item) {
			// send POST request
			$.post('./php/ajax_remove_file.php', {
				file: item.name
			});
		}
	});
	
});