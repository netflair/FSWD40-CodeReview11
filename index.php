<?php $title = 'Welcome'; 
session_start();
//if not logged in = redirect
if(!empty($_SESSION['user_id'])){
    header('location: cars.php');	
}

?>
<?php include('inc/components/head.php'); ?>

    <section id="reg">
        <h1>Register to get access to our fine selection of cars.</h1>
        <form id="reg-form" method="post">
            <input type="text" name="email" placeholder="Enter your E-Mail">
            <span class="err-mail"></span>
            <input type="password" name="pass" placeholder="Enter your password.">
            <span class="err-pass"></span>
            <input type="password" name="repass" placeholder="Confirm your password.">
            <span class="err-repass"></span>
            <input type="text" name="first_name" placeholder="Enter your first name.">
            <span class="err-firstname"></span>
            <input type="text" name="last_name" placeholder="Enter your last name.">
            <span class="err-lastname"></span>
            <input class="sub-button" id="reg-sub" type="submit" name="reg-sub" value="Register">
        </form>
        <div id="reg-err">bad</div>
        <div id="reg-suc">good</div>
    </section>

<script src="js/registration.js"></script>
<script src="js/login.js"></script>
<?php include('inc/components/footer.php'); ?>
