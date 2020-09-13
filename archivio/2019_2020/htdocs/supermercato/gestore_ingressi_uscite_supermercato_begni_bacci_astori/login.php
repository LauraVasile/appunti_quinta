<!DOCTYPE html>
<html lang="it">

<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Login</title>
 
</head>

<?php
session_start();
if (isset($_SESSION["utente"])) {
  var_dump($_SESSION["utente"]);
  header("Location: ingressi_uscite.php");
  return;
}
?>

<body>

  <header class="sticky">
    <a href="ingressi_uscite.php" class="button">Home</a>
    <a href="statistiche.php" class="button">Statistiche</a>
  </header>
  <br/>
      <div class="form-wrap">
        <form action="ingressi_uscite.php" method="post">
            <h1>Login</h1>
              <label for="username" style="width: 80px;">Username</label>
              <input type="text" value="" name="username" placeholder="Username">
              <label for="pwd" style="width: 80px;">Password</label>
              <input type="password" value="" name="password" placeholder="Password">
              <input type="submit" value="Login"> 
        </form>
      </div>

</body>

</html>