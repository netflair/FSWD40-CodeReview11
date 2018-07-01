<?php
	include_once('../conf/config.php');

    //define vars
	$error  = array();
	$response = array();
	$success = "";
	$email = $_POST['email'];

    //validation
	#first name
	if(empty($_POST['first_name'])){
		$error[] = "First Name is required";	
	}
	#last name
	if(empty($_POST['last_name'])){
		$error[] = "Last Name is required";	
	}
	#email
	if(empty($_POST['email'])){
		$error[] = "Email is required";	
	}
	
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false && $_POST['email']!= "" ) {
	
	} else {
		$error[] = "Enter Valid Email address";
		}

	//querry for mail check 
	$query = $db_con->prepare( 'SELECT user_mail FROM users WHERE user_mail = :email' );
	$query->bindParam(':email', $email);
	$query->execute();
	//check if mail already exists
	if($query->rowCount() > 0) {
		$error[] = "Email already in use";
	}
	#password
	if(empty($_POST['pass'])){
		$error[] = "Password is required";	
	}
	#password match
	if($_POST['pass'] != $_POST['repass'] ){
		$error[] = "Passwords dont match";	
	}

	//if there is an error, set response to error and status = false | encode to json
	if(count($error)>0){
		$response['msg']    = $error;
		$response['status'] = false;	
		echo json_encode($response);
		exit;
	}

	//hash password
	$pass = md5($_POST['pass']);
	//query to insert into db
	$sql = "INSERT INTO users (first_name,last_name , user_mail , user_pass, user_role )
			VALUES(:first_name,:last_name,:email,:pass, 'client')";		   
	$run = $db_con->prepare($sql);
	//bind inputs to :placeholders for query, make it of type string
	$run->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);  
	$run->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR); 
	$run->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
	$run->bindParam(':pass',$pass, PDO::PARAM_STR); 
	$run->execute(); 	
	//success msg, status = true
	$response['msg']    = "Account created successfully. You can now login on top of the page.";
	$response['status'] = true;	
	echo json_encode($response);
	exit;	 
?>