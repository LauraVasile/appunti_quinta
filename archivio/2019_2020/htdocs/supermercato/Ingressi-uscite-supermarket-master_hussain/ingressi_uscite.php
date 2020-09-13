<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <title>Document</title>
</head>
<body>
<header class="topnav">
    <a href="logout.php" role="button">Logout</a>
</header>
<p>add per aggiungere,remove per rimuovere</p>
<div class="bg-contact3" style="background-image: url('images/bg-02.jpeg');">
		<div class="container-contact3">
			<div class="wrap-contact3">
             <?php
             function add(){
                require_once('config.php');
                 $sql = "SELECT ID,ingressi FROM controllo WHERE ID = (SELECT MAX(ID) FROM controllo)";
                 $stmt = $pdo->query($sql);
                 $row = $stmt -> fetch();
 
                 $id = $row['ID'];
                 $ingressi = $row['ingressi'];
                 $add_ingressi = $ingressi + 1;
 
                 $sql = "UPDATE controllo SET ingressi = :ingressi WHERE ID = :id";
                 $stmt = $pdo ->prepare($sql);
                 $stmt->execute(
                 [
                     "ingressi" => $add_ingressi,
                     "id" => $id
                 ]
                 );
             }
?>
<?php
    function remove(){
        require_once('config.php');
                 $sql = "SELECT ID,uscite FROM controllo WHERE ID = (SELECT MAX(ID) FROM controllo)";
                 $stmt = $pdo->query($sql);
                 $row = $stmt -> fetch();
 
                 $id = $row['ID'];
                 $uscite = $row['uscite'];
                 $add_uscite = $uscite + 1;
 
                 $sql = "UPDATE controllo SET uscite = :uscite WHERE ID = :id";
                 $stmt = $pdo ->prepare($sql);
                 $stmt->execute(
                 [
                     "uscite" => $add_uscite,
                     "id" => $id
                 ]
                 );
             }
             ?>
             <?php
             function visualizza(){
                require_once('config.php');
                 $sql = "SELECT ingressi,uscite FROM controllo WHERE ID = (SELECT MAX(ID) FROM controllo)";
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

         <form class="contact3-form validate-form">
         <div class="container-contact3-form-btn">
						<button class="contact3-form-btn">
             <input type="submit" name="buttonAdd" class="button" value="add" />
             </button>
          </div>

          <form class="contact3-form validate-form">
         <div class="container-contact3-form-btn">
						<button class="contact3-form-btn">
             <input type="submit" name="buttonRemove" class="button" value="remove" />
             </button>
          </div>

          <form class="contact3-form validate-form">
         <div class="container-contact3-form-btn">
						<button class="contact3-form-btn">
             <input type="submit" name="buttonVisualizza" class="button" value="visualizza" />
             </button>
          </div>
         </form>
     </div>
   </div>
 </div>
            </div>
            </div>
 <hr>
</body>
</html>