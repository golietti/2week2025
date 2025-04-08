<html>
<head>
  <title>Suma y Resta</title>
</head>
<body bgcolor="F3C327">
<?php 
/* GUARDO EL VALOR DEL IMPORTE A FINANCIAR EN UNA VARIABLE */
$importe = $_REQUEST['valor1'];

/* UTILIZAMOS UN SWITCH PARA REALIZAR EL CÁLCULO SEGÚN EL NÚMERO DE CUOTAS */
switch ($_REQUEST['radio1']) {
    case 10:
        /* CALCULO PARA 10 CUOTAS */
        $calculo = $importe * 1.10; // Interés de 10%
        echo "El total a pagar en 10 (diez) cuotas por cuota es: " . ($calculo / 10) . "<br>";
        echo "El total a pagar en 10 (diez) cuotas es: " . $calculo . "<br>";
        break;
    
    case 12:
        /* CALCULO PARA 12 CUOTAS */
        $calculo = $importe * 1.12; // Interés de 12%
        echo "El total a pagar en 12 (doce) cuotas por cuota es: " . ($calculo / 12) . "<br>";
        echo "El total a pagar en 12 (doce) cuotas es: " . $calculo . "<br>";
        break;

    default:
        echo "Seleccione un número válido de cuotas (10 o 12).<br>";
        break;
}
?>
</body>
</html>
