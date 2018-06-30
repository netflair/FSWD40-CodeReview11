<?php
include_once('../conf/config.php');

if(isset($_POST['filter'])){
  echo $_POST['filter'];
}


if(isset($_POST['selected'])){
    $selected = "WHERE cars.fk_location =" . $_POST['selected'];    
}

if ($_POST['selected'] == "all"){
    $selected = "";    
}

        $statement = $db_con->query("SELECT * FROM cars 
                                    JOIN locations ON locations.loc_id = cars.fk_location 
                                     $selected");
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

       <?php }

?>

