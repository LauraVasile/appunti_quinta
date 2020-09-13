<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="styles.css">
<!--===============================================================================================-->
</head>
<?php require_once('config.php') ?>
<body>
<header class="topnav">
        <a href="logout.php" role="button">Logout</a>
</header>
<?php
$giorno = $_POST['giorno'];
    $ingressi = 0;
    $uscite = 0;
    $sql = "INSERT INTO controllo(giorno,ingressi,uscite)VALUES(:giorno,:ingressi,:uscite)";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute(
    [
        "giorno" => $giorno,
        "ingressi" => $ingressi,
        "uscite" => $uscite
    ]
    );
    ?>
    <div class="bg-contact3" style="background-image: url('images/bg-02.jpeg');">
		<div class="container-contact3">
			<div class="wrap-contact3">
				<form class="contact3-form validate-form">
					<span class="contact3-form-title">
                    Gestisci ingressi e uscite
					</span>
                    <div class="container-contact3-form-btn">
						<button class="contact3-form-btn">
                        <a href="ingressi_uscite.php" role="button">Inizia la gestione</a>
						</button>
          </div>
                    </form>
			</div>
		</div>
	</div> <hr>
    
</body>
</html>