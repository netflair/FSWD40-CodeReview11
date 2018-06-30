<?php
	include_once('../conf/config.php');
    //define vars
	$error  = array();
	$response = array();
	$success = "";

    //validation
    #email
    if(empty($_POST['email'])){
        $error[] = "Email field is required";	
    }
    #password
    if(empty($_POST['user_pass'])){
        $error[] = "Password field is required";	
    }
    #email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false && $_POST['email']!= "" ) {
    
    } else{
        $error[] = "Enter Valid Email address";
    }

    //if there is an error, set response to error and status = false | encode to json
    if(count($error)>0){
        $response['msg']    = $error;
        $response['status'] = false;	
        echo json_encode($response);
        exit;
    }

    //check if combination matches
    $statement = $db_con->prepare("select * from users where user_mail = :email AND user_pass = :user_pass" );
    //submit to database
    $statement->execute(array(':email' => $_POST['email'],'user_pass' => md5($_POST['user_pass'])));
    //get matching rows
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    //when row found set session; redirect to offices.php; set status = true; encode message 
    if(count($row)>0){
        session_start();
        $_SESSION['user_id'] = $row[0]['user_id'];
        $_SESSION['role'] = $row[0]['user_role'];
        $response['redirect'] = "offices.php";
        $response['status'] = true;	
        echo json_encode($response);
        exit;	
    } 
    //if no row was found encode error msg to json; set status = false
    else{
        $error[] = "Email and password does not match";
        $response['msg'] = $error;
        $response['status'] = false;	
        echo json_encode($response);
        exit;	
    } 
?>