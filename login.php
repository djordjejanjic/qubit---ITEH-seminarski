<?php
session_start();
include "konekcija.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Qubit | The Big Questions</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda|Squada+One|VT323&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3 style="color:white; font-size:40px; font-family: 'VT323', monospace!important;">Qubit | The Big Questions</h3>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username" style="color:white!important; padding-left:160px!important; font-size:20px; font-family:'Coda', cursive;">Username</label>
                                <input type="text" placeholder="username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password" style="color:white!important; padding-left:160px!important; font-size:20px; font-family:'Coda', cursive;">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            </div>

                            <button type="submit" name="login" class="btn-primary-login"style="color: #fff; background-color: #252148!important; border-color: #19476f!important; font-size:25px; display:block; margin:auto; font-family: 'VT323', monospace;">Uloguj se</button>
                            <a class="btn-primary-login" href="registracija.php" style="margin-top:10px!important; font-family: 'VT323', monospace; font-size:20px">Registruj se</a>
                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display:none;">
                            <strong>Dati korisnik ne postoji!</strong>
                                Proveri tačnost unetih podataka.
                            </div>
                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>
    
    <?php
    
        if(isset($_POST["login"]))
        {
            $brojac = 0;
            $res=mysqli_query($link, "SELECT * FROM registracija WHERE username='$_POST[username]' && password = '$_POST[password]'");
            $brojac = mysqli_num_rows($res);
        
    
    if($brojac == 0)
    {
        ?>
        <script type="text/javascript">
            document.getElementById("failure").style.display="block";
        </script>
        <?php
    } else {

        $_SESSION["username"]=$_POST["username"];

        ?>
        <script type="text/javascript">
            
            window.location="izaberi_oblast.php";
            
        </script>
        <?php
        
        }
    }
    
    
    ?>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>


</body>

</html>