<?php
session_start();
include_once('inc/conf/config.php');
$title = "Admin";

//if not logged in = redirect
if(empty($_SESSION['user_id'])){
    header('location: index.php');	
}
//if logged in but not admin = redirect
if($_SESSION['role']!=='admin'){
    header('location: index.php');
}

include('inc/components/head.php'); ?>

    <section id="loc-list">
    <article>
        <table>
            <thead>
                <tr>
                    <th>Adress</th>
                    <th>Number of cars</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $statement = $db_con->query('SELECT address, COUNT(*) as count FROM cars
                                                JOIN locations ON locations.loc_id = cars.fk_location
                                                GROUP BY fk_location ORDER BY count DESC');
                    foreach ($statement as $row){ 
                        echo "<tr>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['count'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </article>
    <aside>
        <div id="map"></div>
    </aside>
    </section>
<?php 
$statement = $db_con->query("SELECT * FROM locations");

        foreach ($statement as $row){ ?>
           <?php echo $row['latitude'] ?><br>
           <?php echo $row['longitude'] ?><hr>
       <?php } ?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAB0_EdfzAKsKwi6d8wJzyiz2stZ7qflgE&callback=initMap"></script>
<script type="text/javascript">
function initialize() {


    var mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(48.1735831, 16.3520282),
        mapTypeId: google.maps.MapTypeId.MAP
    };
    var map = new google.maps.Map(document.getElementById("map"),
        mapOptions);


    var icons = {
    parking: {
    icon: './img/caricon.png'
    },
    info: {
    icon: './img/officeicon.png'
    }
    };


    //marker position
   

    //create markers
    features.forEach(function(feature) {
            var marker = new google.maps.Marker({
                position: feature.position,
                icon: icons[feature.type].icon,
                map: map
            });
            });
                }
                google.maps.event.addDomListener(window, 'resize', initialize);
                google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php include('inc/components/footer.php'); ?>