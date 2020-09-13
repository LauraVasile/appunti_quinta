<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Login - Controllo accessi</title>
    <link rel="stylesheet" href="mini-default.min.css">
</head>

<body>
    <header class="sticky">
        <a href="home.php" role="button">Home</a>
        <a href="accessi.php" role="button">Login</a>
    </header>
    <br />
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm-12 col-md-8 col-lg-6">
                <form action="home.php" method="post">
                    <fieldset>
                        <legend>Login</legend>
                        <div class="input-group fluid">
                            <label for="username" style="width: 110px;">Username</label>
                            <input type="text" value="" name="username" placeholder="Username">
                        </div>
                        <div class="input-group fluid">
                            <label for="pwd" style="width: 110px;">Password</label>
                            <input type="password" value="" name="password" placeholder="Password">
                        </div>
                        <div class="input-group fluid">
                            <button class="primary">Login</button>
                        </div>
                    </fieldset>
                    <p>If you have forgot your credentials, please contact the system amministrator.</p>
                </form>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
</body>

</html>