$(function()
{
	$('#login-sub').click(function(event){
		event.preventDefault();

		$.post('./inc/scripts/login.php',$('#login-form').serialize(),function(response){

			if (response['status'] == true){
				location.href = "cars.php";
			}else{
				var error = '';
				$.each(response['msg'],function(index,val){
					error += val+" | ";
					});
				$("#login-err").html(error);
				$("#login-err").show();	
				$(this).prop('disabled',false);
			}
		},'json');
	});
});