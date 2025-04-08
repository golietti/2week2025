<!DOCTYPE html>
<html>
<head>
    <title>Conversor</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos sean recibidos
    $Importe = isset($_POST['Valor']) ? $_POST['Valor'] : null;
    $Radio1 = isset($_POST['Radio1']) ? $_POST['Radio1'] : null;

    if ($Importe === null || !is_numeric($Importe)) {
        echo "Por favor, ingrese un valor válido para convertir.";
    } elseif ($Radio1 === null) {
        echo "Por favor, seleccione una moneda de destino.";
    } else {
        switch ($Radio1) {
            case "Dolar":
                $Dolar = $Importe * 8;
                echo "El valor convertido en dólares es: " . $Dolar;
                break;

            case "Peso Chileno":
                $PesoChileno = $Importe * 68.35;
                echo "El valor convertido en pesos chilenos es: " . $PesoChileno;
                break;

            case "Euros":
                $Euros = $Importe * 10.30;
                echo "El valor convertido en euros es: " . $Euros;
                break;

            case "Pesos Argentinos":
                $PesosArgentinos = $Importe * 1;
                echo "El valor convertido en pesos argentinos es: " . $PesosArgentinos;
                break;

            default:
                echo "Moneda no válida.";
        }
    }
}
?>

