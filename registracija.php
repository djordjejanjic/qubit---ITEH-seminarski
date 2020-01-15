<?php
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
    <link href="https://fonts.googleapis.com/css?family=Coda|Squada+One|VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
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
			<div class="text-center custom-login">
				<h3 style="margin-bottom: 30px; color:white; font-size:40px; font-family: 'VT323', monospace!important;">Registuj se i odgovori na velika pitanja!</h3>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label style="color:white!important; padding-left:185px!important; font-size:20px; font-family:'Coda', cursive;">Ime</label>
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label style="color:white!important; padding-left:165px!important; font-size:20px; font-family:'Coda', cursive;">Prezime</label>
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label style="color:white!important; padding-left:140px!important; font-size:20px; font-family:'Coda', cursive;">Korisničko ime</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                <label style="color:white!important; padding-left:180px!important; font-size:20px; font-family:'Coda', cursive;">Šifra</label>
                                <input type="password"  name="password"class="form-control">
                            </div>
                                <div class="form-group col-lg-12">
                                    <label style="color:white!important; padding-left:178px!important; font-size:20px; font-family:'Coda', cursive;">Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                
                              </div>
                            <div class="text-center" style="margin-top: 20px;">
                                <button type="submit" name="submit1" class="btn-primary-login" style="color: #fff; background-color: #252148!important; padding-right:10px; font-family: 'VT323', monospace; border-color: #19476f!important; font-size:20px;">Registruj se</button>
                                <a href="login.php" class="nazad" style="color: #252148; background-color: white!important; width: 115px; padding-right:10px; border:2px solid; margin-top:10px!important; border-color: #19476f!important; font-family: 'VT323', monospace; font-size:20px;">
                                Nazad
                                </a>
                            </div>
                            <div class="alert alert-success" id="success" style="margin-top: 20px; font-size: 20px; display:none; font-family: 'VT323', monospace">
                            <strong>Uspešna registracija!</strong>
                                Registrovali ste se za Qubit!
                            </div>
                            <div class="alert alert-danger" id="failure" style="margin-top: 20px; font-size: 20px; display:none; font-family: 'VT323', monospace">
                            <strong>Korisnik već postoji!</strong>
                                Neuspešna registracija.
                            </div>
                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>
    
    <?php
        if(isset($_POST["submit1"]))
        {
            $brojac = 0;
            $res=mysqli_query($link, "select * from registracija where username='$_POST[username]'") or die(mysqli_error($link));
            $brojac = mysqli_num_rows($res);
            
            if($brojac > 0)
            {
                ?>
                <script type = "text/javascript">
                   document.getElementById("success").style.display="none"; document.getElementById("failure").style.display="block";
                </script>
                <?php
            } else {
                
                mysqli_query($link, "insert into registracija values(NULL, '$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]')") or die(mysqli_error($link));
                ?>
                <script type = "text/javascript">
                   document.getElementById("failure").style.display="none"; document.getElementById("success").style.display="block";
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
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>