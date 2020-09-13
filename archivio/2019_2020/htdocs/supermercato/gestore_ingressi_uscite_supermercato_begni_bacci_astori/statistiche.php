<?php
include("fusioncharts/fusioncharts.php");

$host = 'localhost';
$db   = 'ingressi_uscite_supermercato';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$stmt = $pdo->query(
    "SELECT hour(dataOra) AS ora,
    COUNT(*)/((SELECT DATEDIFF(
                (SELECT dataOra
                FROM ingresso
                ORDER BY id DESC
                LIMIT 1),
                (SELECT dataOra 
                FROM ingresso 
                WHERE id = 1))
                ) + 1) AS n_ingressi_medi
    FROM ingresso
    GROUP BY hour(dataOra)"
);

$arrChartData = array();
while ($row = $stmt->fetch()) {
    array_push($arrChartData, [strval($row["ora"]), $row["n_ingressi_medi"]]);
}

$stmt = $pdo->query("SELECT TRUNCATE(AVG(TIMESTAMPDIFF(MINUTE, ingresso.dataOra, uscita.dataOra)),0) AS permanenza_media
                    FROM ingresso, uscita
                    WHERE ingresso.id = uscita.id");
$permanenza_media = $stmt->fetch()["permanenza_media"];
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Statistiche</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
</head>

<body>
    <header class="sticky">
        <a href="ingressi_uscite.php" class="button">Home</a>
        <a href="statistiche.php" class="button">Statistiche</a>
        <a href="logout.php" class="button">Logout</a>
    </header>
    <?php
    // Chart Configuration stored in Associative Array
    $arrChartConfig = array(
        "chart" => array(
            "caption" => "Numero medio degli ingressi nel supermercato per ora",
            "xAxisName" => "Ora",
            "yAxisName" => "Numero ingressi",
            "theme" => "fusion"
        )
    );
    $arrLabelValueData = array();
    // Pushing labels and values
    for ($i = 0; $i < count($arrChartData); $i++) {
        array_push($arrLabelValueData, array(
            "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1]
        ));
    }
    $arrChartConfig["data"] = $arrLabelValueData;
    // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
    $jsonEncodedData = json_encode($arrChartConfig);


    $Chart = new FusionCharts("column2d", "MyFirstChart", "700", "400", "chart-container", "json", $jsonEncodedData);
    $Chart->render();
    ?>
    <center>
       <div id="permanenza">PERMANENZA MEDIA: <?php echo $permanenza_media ?> MINUTI</div>
    </center>
    <div id="chart-container">Chart will render here!</div>
</body>

</html>