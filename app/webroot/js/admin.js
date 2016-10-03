$(document).ready(function(){
	$("#file-manager").click(function(){
		if($("#file-manager-iframe").length > 0){
			$(this).html("Open File Manager");
			$("#file-manager-iframe").remove();
			$("#container").removeClass("file-manager-on");
		}else{
			$(this).html("Close File Manager");
			$("#container").addClass("file-manager-on");
			$("<iframe>").attr("id", "file-manager-iframe").attr("src", "/file-manager/").appendTo($("body"));
		}
	});

	$('#summernote').summernote({
		  height: 600, 
		   toolbar: [
		    [ 'format', ['style']],
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    // ['fontsize', ['fontsize']],
		    // ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['misc', ['undo', 'redo']]
		    // ['height', ['height']]
		  ]
	});
	if($("#summernote").length > 0){

		var val = $("form").find("textarea.summernote").val();
		console.log(val);
		$('#summernote').summernote('code', val);
	}

	$("form").submit(function(e){
		if($(this).find("#summernote").length > 0){
			var text = $(this).find("#summernote").summernote('code');
			$(this).find("textarea.summernote").val(text);
		}
		return true;
	});

});