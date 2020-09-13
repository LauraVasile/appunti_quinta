<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Prova di autenticazione</title>
   
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
<body>
<header class="topnav">
  <a href="index.php" role="button">Home</a>
  <a href="registrati.php" role="button">Registrati</a>
</header>

      <form action="recuperologin.php" method="post">
      <div class="bg-contact3" style="background-image: url('images/bg-02.jpeg');">
		<div class="container-contact3">
			<div class="wrap-contact3">
				<form class="contact3-form validate-form">
					<span class="contact3-form-title">
						Accesso
					</span>

					
	<div class="wrap-input3 validate-input" data-validate = "Message is required">
            <textarea class="input3" name="username" placeholder="username"></textarea>
						<span class="focus-input3"></span>
          </div>
          
          <div class="wrap-input3 validate-input" data-validate = "Message is required">
            <textarea class="input3" name="password" placeholder="password"></textarea>
						<span class="focus-input3"></span>
					</div>

					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn" class="primary">
            Login
						</button>
					</div>
				</form>
			</div>
		</div>
  </div>
</form>
<footer>
    <p>Lorenco Malaj - Hussain Shakir - Mattia Scarpari</p>
</footer>
</body>
</html>