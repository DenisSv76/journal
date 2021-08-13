$(document ).ready(function() {
	$("#add_text").click(function() {
		var N_text=parseInt($("#list_new_text").find("textarea").last().attr("id").split("_")[1])+1;
		$("#list_new_text").append('<li><textarea></textarea></li>');
		var new_text=$("#list_new_text").find("textarea").last();
		new_text.attr("id","text_"+N_text);
		new_text.attr("name","text_"+N_text);
		new_text.attr("rows","5");
		new_text.attr("cols","45");
	});
	
	$("#dell_text").click(function() {
		if (parseInt($("#list_new_text").find("textarea").last().attr("id").split("_")[1])>1) {
			$("#list_new_text").find("textarea").last().remove();
			$("#list_new_text").find("li").last().remove();
		} else {
			alert("Нечего удалять");
		}

	  	
	});
});

