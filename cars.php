<?php
session_start();

$title = "Cars";

if(empty($_SESSION['user_id'])){
    header('location: index.php');	
}
include_once('inc/conf/config.php');
$title = 'Welcome';
include('inc/components/head.php'); 

//query for selectbox
$statement = $db_con->query('SELECT * FROM cars JOIN locations ON locations.loc_id = cars.fk_location ');
?>

    <form id="filterform" method="post" name="filterform">
        <select id="filter" name="filter">
                    <option value="all">Locations (All)</option>
                    <?php foreach ($statement as $row){ ?>
                    <option value = "<?php echo $row['loc_id']; ?>" ><?php echo $row['address']; ?></option>
                    <?php } ?>
        </select>
    </form>
<div id="show"></div>


    <section id="cars">
    <?php
    //default output without any filter
        $statement = $db_con->query("SELECT * FROM cars 
                                    JOIN locations ON locations.loc_id = cars.fk_location ");

        foreach ($statement as $row){ ?>
           
           <div class="card">
               <div class="img">
                <img src=" <?php echo $row['image'] ?> ">
                <h1><?php echo $row['type'] ?></h1>
               </div>
               <div class="details">
                   <h1><?php echo $row['brand'] . " " . $row['model'] ?></h1>
                   <span><i class="far fa-arrow-alt-circle-right"></i>SEATS: <?php echo $row['passengers'] ?></span>
                   <span><i class="far fa-arrow-alt-circle-right"></i>DOORS: <?php echo $row['doors'] ?></span>
                   <br>
                   <span><i class="far fa-arrow-alt-circle-right"></i>TRANSMISSION: <?php echo $row['transmission'] ?></span>
                   <br>
                   <span><i class="fas fa-euro-sign"></i>per day: <h2><?php echo $row['price_day'] ?></h2></span><hr>
                   <span class="rent">Rent now</span>
               </div>
           </div>

       <?php } ?>
    </section>

<script src="js/filter.js"></script>
<?php include('inc/components/footer.php'); ?>