Dropzone.autoDiscover = false;
$(function() {
	var myDropzone = new Dropzone(".dropzone");
	myDropzone.on("queuecomplete", function() {
		window.location.href = urlRedirectToIndex;
	});
});