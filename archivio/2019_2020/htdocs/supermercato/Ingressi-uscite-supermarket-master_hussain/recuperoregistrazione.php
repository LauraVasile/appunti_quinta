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
  <a href="index.php" role="button">Home</a>
  <a href="accedi.php" role="button">Accedi</a>
</header>
<div class="bg-contact3" style="background-image: url('images/bg-02.jpeg');">
		<div class="container-contact3">
			<div class="wrap-contact3">
				<form class="contact3-form validate-form">
					<span class="contact3-form-title">
                    Registrazione effettuata con successo!
					</span>

                    </form>
			</div>
		</div>
	</div>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($password,PASSWORD_DEFAULT);
$sql = "INSERT INTO impiegato(username,password) VALUES (:username,:password)";
$stmt = $pdo ->prepare($sql);
$stmt->execute(
    [
        "username" => $username,
        "password" => $password
    ]
);
?>
    </body>
</html>