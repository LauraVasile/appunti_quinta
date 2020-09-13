<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body class="text-center">
      <form action="menu_utente.php" method="post" class="form-login w-25 mx-auto">
          <h1 class="mt-5">Login form</h1>
          <label class="sr-only" for="username" style="width: 80px;">Username</label>
          <input class="form-control mt-4" type="text" value="" name="username" placeholder="username">
          <label class="sr-only" for="pwd" style="width: 80px;">Password</label>
          <input class="form-control mt-2" type="password" value="" name="password" placeholder="password">
          <button class="btn btn-primary mt-4">Login</button>
          <p class="mt-5">In questo caso fornirò anche le credenziali per l'accesso:</br>
        utente: vladbadea______password: vlad</br>
        utente: nicolebertelli_____password: nicole</p>
      </form>
</body>
</html>