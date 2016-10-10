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

	$("#TextType").on("change", function(){
		if($(this).val() == "dynamic"){
			$("#summernote + div, #summernote").addClass("display-none");
			$(".summernote").removeClass("display-none");
		}else{
			$("#summernote + div, #summernote").removeClass("display-none");
			$(".summernote").addClass("display-none");
		}
	});

	$('#summernote').summernote({
		  height: 400, 
		   toolbar: [
		    [ 'format', ['style']],
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    // ['fontsize', ['fontsize']],
		    // ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['misc', ['undo', 'redo', 'codeview']],
		    // ['height', ['height']]
		    ['insert' ,['picture', 'table']]
		  ],
		  maximumFileSize : 20000,
		  callbacks : {
		  	onInit : function(){
		  		if($("#TextType").val() == "dynamic"){
		  			$("#summernote + div, #summernote").addClass("display-none");
		  			$(".summernote").removeClass("display-none");
		  		}
		  	}
		  }
	});
	if($("#summernote").length > 0){
		var val = $("form").find("textarea.summernote").val();
		$('#summernote').summernote('code', val);
	}

	$("form").submit(function(e){
		if($(this).find("#summernote").length > 0 && !$("#summernote").hasClass("display-none")){
			var text = $(this).find("#summernote").summernote('code');
			$(this).find("textarea.summernote").val(text);
		}
		return true;
	});



});