$(function()
{	//on registration submit
	$('#reg-sub').click(function(event){
		//set defaults
		$("#reg-err").html('');
		$("#reg-suc").html('');
		//prevent default submit
		event.preventDefault();
		//post inputs via ajax
		$.post('./inc/scripts/register.php',$('#reg-form').serialize(),function(response)
		{
			if (response['status'] == true)
			{
				$("#reg-suc").html(response['msg']);
				$("#reg-suc").show();
			}
			else
			{
				var error = '';
				$.each(response['msg'],function(index,val){
					error += val+" | ";
					});
				$("#reg-err").html(error);
				$("#reg-err").show();	
			}
		},'json');
	});

});