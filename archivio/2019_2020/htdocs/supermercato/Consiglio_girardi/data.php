<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/dark.min.css">
    <link rel="stylesheet" href="./style/home.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <title>Parametri di ricerca</title>
  </head>
  <body>

  <ul class='navbar'>
    <li><a href="./home.php">Home</a></li>
    <li><a href="./data.php">Grafico</a></li>
    <li><a href="./logout.php">Logout</a></li>
  </ul>

  <p>
  <form type='get' action='./data.php'>
    <label for="datePicker">Periodo:</label>
    <input type="date" id="datePicker" name="datePicker">
    <input type='submit'>
  </form>
  </p>

    <?php
    include './auth.php';
    
    if(array_key_exists('utente',$_SESSION)){
      if (!isset($_GET['datePicker'])) {
        $day = Date("Y-m-d");
      } else {$day = $_GET['datePicker'];}

      $sql = "SELECT azione, log FROM registro_azioni WHERE log BETWEEN :start AND :end ORDER BY log";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['start' => ($day . " 00:00:00"), 'end' => ($day . " 23:59:59")]);
      $storico = array();

      while ($row = $stmt->fetch()) {
        // echo "<p>" . $row['azione'] . $row['log'] . '</p>';
        $element = array(
          'azione' => $row['azione'],
          'timestamp' => substr($row['log'],11,5)
        );
        array_push($storico, $element);
      }
    }
    ?>
    <script type="text/javascript">
    window.sitescriptdata={};
    window.sitescriptdata.storico = (<?php echo json_encode($storico,JSON_HEX_TAG); ?>)
    </script>
    
    <div class="container"><canvas id='chart'></canvas></div>
    <script src='./utils/plotChart.js'></script>
  </body>
</html>
