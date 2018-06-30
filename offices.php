<?php
session_start();
$title = "Offices";
if(empty($_SESSION['user_id'])){
    header('location: index.php');	
}

include_once('inc/conf/config.php');

include('inc/components/head.php'); ?>

    <section id="offices">
        <h1>Our offices</h1>
    <?php
        $statement = $db_con->query('SELECT * FROM offices JOIN locations ON locations.loc_id = offices.fk_loc');
        foreach ($statement as $row){ 
            echo $row['address'];
            echo "<br>";
        }
    ?>
    </section>


<?php include('inc/components/footer.php'); ?>