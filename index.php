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
            <input type="password" name="pass" placeholder="Enter your password.">
            <input type="password" name="repass" placeholder="Confirm your password.">
            <input type="text" name="first_name" placeholder="Enter your first name.">
            <input type="text" name="last_name" placeholder="Enter your last name.">
            <a href="#" id="reg-sub" type="submit" name="reg-sub">Register</a>
        </form>
        <div id="reg-err">bad</div>
        <div id="reg-suc">good</div>
    </section>

<script src="js/registration.js"></script>
<script src="js/login.js"></script>
<?php include('inc/components/footer.php'); ?>
