<?php session_name("310proj1"); ?>
<?php session_start(); ?>

<?php  

    $pageTitle = 'Sign In';
    include '../Header and Footer/Project1Header.php';
?>

<?php
        include "../Header and Footer/Project1Nav.php";
?>




<div class="container-fluid wasabi-container">
<div class="col-md-2 hidden-sm hidden-xs sidebar"></div>
<div class="col-md-8 content">

<!-- Authentication section -->
<?php $date = date('m/d/Y h:i:s a', time()); ?>
<?php $loginSuccess = false ?>
<?php if (isset($_POST['user']) && isset($_POST['pwd'])) {
    $usernm = filter_var($_POST['user'], FILTER_SANITIZE_STRING); 
    
    //Credentials #1: ct310
    if ($usernm == "ct310"){
        $hash = md5($_POST['pwd']);
        if ($hash == "3aaec86181ee6974b99d893b4c1eb5b5") {
            $loginSuccess = true;
            $_SESSION['username'] = $usernm;
            $_SESSION['loginTime'] = $date;
        }
        else {
            echo '<font color=red>' . "Login Failure:" . '</font>' . " Wrong password for: " . $usernm . '<br>';
            echo $date . "\n";
        }
    }
    //Credentials #2: Courtney
    elseif ($usernm == "cschulze") {
        $hash = md5($_POST['pwd']);
            if ($hash == "6266eecd3b1b4f7133fddd911b615218") {
                $loginSuccess = true;
                $_SESSION['username'] = $usernm;
                $_SESSION['loginTime'] = $date;
            }
            else {
               echo '<font color=red>' . "Login Failure:" . '</font>' . " Wrong password for: " . $usernm . '<br>';
                echo $date . "\n";
            }
    }
    
    //Credentials #3: Katie
    elseif ($usernm == "kdmnance"){
            $hash = md5($_POST['pwd']);
            if ($hash == "67d6ff28e7bec383dfd972e89965f62f") {
                $loginSuccess = true;
                $_SESSION['username'] = $usernm;
                $_SESSION['loginTime'] = $date;
            }
            else {
               echo '<font color=red>' . "Login Failure:" . '</font>' . " Wrong password for: " . $usernm . '<br>';
                echo $date . "\n";
            }
    }
    else {
        echo '<font color=red>' . "Login Failure:" . '</font>' . " Wrong username<br />";
        echo $date . "\n";
    }
}
?>
        
<?php if ($loginSuccess) {
       $_SESSION['wasabi-messages'] = array();
       $_SESSION['lemongrass-messages'] = array();
       $_SESSION['capers-messages'] = array();
    header("Location: ./Login.php");
}
?>
<!-- End authentication section -->

    <!--If not signed in -->
    <?php if (!isset($_SESSION['username'])) : ?>
        <h2>Sign in</h2>
        <form action="Login.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" aria-describedby="username" name="user">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" aria-describedby="pass" name="pwd">
            </div>
            <button class="btn btn-default" role="button" type="submit">Sign in</button>
        </form>
    
    <!--Direct them to log out if they are signed in -->
    <?php else : ?>
        <?php 
            echo '<p>' . "You are currently signed in as '" . $_SESSION['username'] . "'" . '</p>';
        ?>
        <div class="logout"><p><a href="Logout.php">Logout</a></p></div>
    <?php endif; ?>
</div>

<div class="col md-2 hidden-sm hidden-xs sidebar"></div>
</div>
<?php
        include "../Header and Footer/Project1Footer.php";
?>
