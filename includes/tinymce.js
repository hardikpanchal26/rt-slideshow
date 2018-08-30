tinymce.PluginManager.add('button', function(editor, url) {

	var obj = JSON.parse(list);
	
	// Add a button that opens a window
	editor.addButton('button', {
		text: ' rt Slideshow',
		icon: 'icon dashicons-images-alt',
		onclick: function() {
			// Open window
			editor.windowManager.open({
				title: 'Select rt Slideshow',
				body: [
					{
						type   : 'listbox',
						name   : 'rtslide',
						label  : 'rt Slideshow',
						values : obj,
					}
				],
				onsubmit: function(e) {
					// Insert content when the window form is submitted
					editor.insertContent('[rtslideshow ' + e.data.rtslide + ']');
				}
			});
		}
	});
});
