$(function()
{
	//client side validation
	//E-Mail
	 $('#reg-form input[name="email"]').keyup(function(){

		function isValidEmailAddress(email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,20})?$/;
		return emailReg.test( email );
		}

		var email = $(this).val();

		if(!isValidEmailAddress(email)){
			$(".err-mail").html("Please provide a valid E-Mail.");
		}
		//Require Email
		else if(email == 0 ){
			$('.err-mail').html("E-Mail is required.");
		}
		else{
			$(".err-mail").html('');
		}
	});
	
	//Password
	$('input[name="pass"]').keyup(function(){
		var pass = $(this).val().length;
		//Require Pass
		if(pass == 0 ){
			$('.err-pass').html("Password is required.");
		}
		else if(pass < 6){
			$(".err-pass").html("Password must contain at least 6 characters.");
		}
		else{
			$(".err-pass").html('');
		}
	});
	//Check Password match
	$('input[name="repass"]').keyup(function(){
		var repass = $(this).val().length;
		var passv = $("input[name='pass']").val();
		//Require Pass
		if(repass == 0 ){
			$('.err-repass').html("Please confirm your Password.");
		}
		else if($('input[name="repass"]').val() != passv){
			$(".err-repass").html("Passwords dont match.");
		}
		else{
			$(".err-repass").html('');
		}
	});

	//First Name
	$('input[name="first_name"]').keyup(function(){
		var first_name = $(this).val().length;
		//Require Name
		if (first_name == 0){
			$('.err-firstname').html("First name is required");
		}
		else if(first_name < 3) {
			$('.err-firstname').html("First name must contain at least 3 characters.");
		}
		else {
			$('.err-firstname').html("");
		}
	});

	//Last Name
	$('input[name="last_name"]').keyup(function(){
		var last_name = $(this).val().length;
		//Require Name
		if (last_name == 0){
			$('.err-lastname').html("Last name is required");
		}
		else if(last_name < 3) {
			$('.err-lastname').html("Last name must contain at least 3 characters.");
		}
		else {
			$('.err-lastname').html("");
		}
	});



	//on registration submit
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