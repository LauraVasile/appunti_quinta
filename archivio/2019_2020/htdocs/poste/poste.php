<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calcolo del valore</title>
</head>
<body>
    <h1>Calcolo del preventivo di spedizione</h1>
    <?php
        $peso = $_POST["peso"];
        $tipo = $_POST["tipo"];
        $valido = true;
        if ($peso > 2000)
            $valido = false;
        else if ($tipo == "rettangolare")
        {
            $lunghezza = $_POST["lunghezza"];
            $altezza = $_POST["altezza"];
            $spessore = $_POST["spessore"];
            if ($lunghezza >= 14 && $lunghezza <= 23.5 &&
                $altezza >= 9 && $altezza <= 12 &&
                $spessore >= 0.15 && $spessore <= 5 &&
                $peso <= 50)
                {
                    $formato = "Piccolo standard";
                    $fascia = 0;
                }
            else if ($lunghezza >= 14 && $lunghezza <= 35.3 &&
                    $altezza >= 9 && $altezza <= 25 &&
                    $spessore >= 0.15 && $spessore <= 25)
                    {
                        $formato = "Medio standard";
                        $fascia = 0;
                    }
            else if ($lunghezza <= 35.3 &&
                    $altezza <= 25 &&
                    $spessore >= 25 && $spessore <= 50)
                    {
                        $formato = "Extra standard";
                        $fascia = 1;
                    }
            else
                $valido = false;
        }
        else if ($tipo == "altro")
        {
            $dimensione = $_POST["dimensione"];
            if ($dimensione >= 10 && $dimensione <= 90)
            {
                $formato = "Non standard";
                $fascia = 1;
            }
            else
                $valido = false;
        }
        else
        {
            $lunghezzaCilindro = $_POST["lunghezzaCilindro"];
            $diametro = $_POST["diametro"];
            $totale = $lunghezzaCilindro + $diametro*2;
            if ($totale >= 17 && $totale <= 104)
            {
                $formato = "Non standard cilindrico";
                $fascia = 1;
            }
            else
                $valido = false;
        }
        $prezzi = [
            [2.80, 4],
            [5.50, 6.50],
            [7, 8]
        ];
        if ($valido)
        {
            if ($peso <= 100)
                $costo = $prezzi[0][$fascia];
            else if ($peso <= 500)
                $costo = $prezzi[1][$fascia];
            else
                $costo = $prezzi[2][$fascia];
            echo "<p>La spedizione del tuo pacco di formato '" . $formato . "' costerà " . $costo . " euro.</p>";
        }
        else
            echo "<p>Impossibile spedire il pacco perchè sono presenti dei problemi (peso eccessivo, dimensioni non corrette)</p>";

    ?>
</body>
</html>
