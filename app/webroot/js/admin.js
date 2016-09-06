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
});