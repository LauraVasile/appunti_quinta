<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/dark.min.css">
    <link rel="stylesheet" href="./style/login.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <h1>Insideout</h1>
    <p>Pagina di accesso che permette di loggarsi all'interno della piattaforma per il monitoraggio del flusso di clienti all'interno di un punto vendia.</p>
    <form method="post" action="home.php">
        <div id="div_login">
            <h2>Login</h2>
            <div>
                <input type="text" class="textbox" id="username" name="username" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="password" name="password" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Accedi"/>
            </div>
        </div>
    </form>
</div>

</body>
</html>
