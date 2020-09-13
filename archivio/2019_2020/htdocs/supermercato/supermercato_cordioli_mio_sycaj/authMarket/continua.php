<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">

    <title>Continua</title>
</head>
<body>
    <header class="sticky">
        <a href="index.php" role="button">Home</a>
        <a href="logout.php" role="button">Logout</a>
    </header>
    <p>Per aggiungere ingressi premere il pulsante <strong>add</strong>, per rimuovere premere il pulsante <strong>remove</strong></p>
         <div class="container">
         <div class="row">
             <div class="col-sm">
             <?php
             function add(){
                require_once('config.php');
                 $sql = "SELECT ID,ingressi FROM monitoraggio WHERE ID = (SELECT MAX(ID) FROM monitoraggio)";
                 $stmt = $pdo->query($sql);
                 $row = $stmt -> fetch();
 
                 $id = $row['ID'];
                 $ingressi = $row['ingressi'];
                 $INGRESSI = $ingressi + 1;
 
                 $sql = "UPDATE monitoraggio SET ingressi = :ingressi WHERE ID = :id";
                 $stmt = $pdo ->prepare($sql);
                 $stmt->execute(
                 [
                     "ingressi" => $INGRESSI,
                     "id" => $id
                 ]
                 );
             }
             ?>
             <?php
             function remove(){
                require_once('config.php');
                 $sql = "SELECT ID,uscite FROM monitoraggio WHERE ID = (SELECT MAX(ID) FROM monitoraggio)";
                 $stmt = $pdo->query($sql);
                 $row = $stmt -> fetch();
 
                 $id = $row['ID'];
                 $uscite = $row['uscite'];
                 $USCITE = $uscite + 1;
 
                 $sql = "UPDATE monitoraggio SET uscite = :uscite WHERE ID = :id";
                 $stmt = $pdo ->prepare($sql);
                 $stmt->execute(
                 [
                     "uscite" => $USCITE,
                     "id" => $id
                 ]
                 );
             }
             ?>
             <?php
             function visualizza(){
                require_once('config.php');
                 $sql = "SELECT ingressi,uscite FROM monitoraggio WHERE ID = (SELECT MAX(ID) FROM monitoraggio)";
                 $stmt = $pdo->query($sql);
                 $row = $stmt -> fetch();
                 $uscite = $row['uscite'];
                 $ingressi = $row['ingressi'];
                 $persone = $ingressi - $uscite;
                 echo "<p>".$persone." persone sono all'interno del supermercato</p>";
             }
             ?>
             <?php if(array_key_exists('buttonAdd', $_POST)) { 
                 add(); 
             } 
             ?>
             <?php if(array_key_exists('buttonRemove', $_POST)) { 
                 remove(); 
             } 
             ?>
             <?php if(array_key_exists('buttonVisualizza', $_POST)) { 
                 visualizza(); 
             } 
             ?>
         <form method="post"> 
             <input type="submit" name="buttonAdd" class="button" value="add" />
             <input type="submit" name="buttonRemove" class="button" value="remove" />
             <input type="submit" name="buttonVisualizza" class="button" value="visualizza" />  
         </form>
     </div>
   </div>
 </div>
 <hr>
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <footer class = "sticky">
  <p> © 2020 - 2021 | Powered by Francesco Mio - Paolo Cordioli - Claudio Sycaj</p>
</footer>
</body>
</html>