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
        
        $(".del_newentry").click(function() {
            $id=$(this).attr("data-id");
            document.location.href = 'http://journalara.test/delnewentry/id_del_entry/'+$id;
            /*$tr_del=$("#list_new_entry tr[data-id='"+$id+"']");
            $tr_del.detach();*/
            alert('response'); 
                        
               
            /*$.ajax({
                type: 'GET',
                url: '/delnewentry',
                data:{
                        id_del_entry: $id
                      },
                
                success: function (data) {
                    if (data.result) {
                        alert(data.result);
                        $tr_del=$("#list_new_entry tr[data-id='"+$id+"']");
                        $tr_del.detach();
                    } else {
                        alert(111);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert(xhr.responseText);
                }
            });*/
        });
        
        
});

