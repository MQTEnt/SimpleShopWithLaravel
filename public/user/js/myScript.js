$(document).ready(function(){
	$('.btnUpdate').click(function(){
		var rowId=$(this).attr('rowId');
		var qty=$(this).parent().parent().find("#qty").children().val();
		var token=$("input[name='_token'").val();
		//Ajax
		$.ajax({
			url: 'cart/update',
			type: 'GET',
			cache: false,
			data: {"_token":token, "rowId":rowId, "qty":qty},
			success: function(data)
			{
				if(data=='success')
				{
					//Alert if you want
				}
			}
		});
	});
});
