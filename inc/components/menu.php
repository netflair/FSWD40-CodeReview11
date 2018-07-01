<nav>
    <ul>
        <span>car rental</span>
        <form id="login-form" method="post">
        <?php if(!empty($_SESSION['user_id'])){ ?>
        <li><a href="offices.php">Offices</a></li>
        <li><a href="cars.php">Cars</a></li>
        <?php if($_SESSION['role']=='admin'){ ?>
        <li><a href="admin.php">Admin</a></li> 
        <?php } ?>
        <?php } else { ?>
        <li><input type="text" name="email" placeholder="email"></li>
        <li><input type="password" name="user_pass" placeholder="password"></li>
        <li><input class="sub-button" id="login-sub" type="submit" name="log-sub" value="Login"></li><?php } ?>
        <?php if(!empty($_SESSION['user_id'])){ ?>
        <li class="logout"><a href="inc/scripts/logout.php">LogOut</a></li>
        <?php } ?>
        <div id="login-err"></div>
        <div id="login-suc"></div>
        </form>
    </ul>
</nav>