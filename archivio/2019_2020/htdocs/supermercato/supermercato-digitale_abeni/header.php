<?php if ($utente_autenticato): ?>
    <a href="clienti.php" role="button">Segna i clienti</a>
    <a href="statistiche.php" role="button">Statistiche</a>
    <a href="logout.php" role="button">Logout</a>
<?php else: ?>
    <a href="login.php" role="button">Login</a>
<?php endif; ?>