
<?php
$op = isset($_POST['op']) ? $_POST['op'] : null;
if ($op === null) {
    die("No se ha recibido la opción de votación.");
}

$existe = 0;
$archivo = fopen('result.dat', 'a+') or die("No puedo abrir archivo");
$archivo2 = fopen('result.tmp', 'w+') or die("No puedo abrir archivo temporal de trabajo");

$votos = 0;

while (!feof($archivo) && $existe == 0) {
    $linea = fgets($archivo);
    $datos = explode("|", $linea);
    $seek = (int)$datos[0];
    $count_vote = (int)$datos[1];
    
    if ($seek == $op) {
        $count_vote++;
        $existe = 1;
    }
    $votos += $count_vote;  // Sumar votos totales
}

if ($existe == 0) {
    fclose($archivo);
    $archivo = fopen('result.dat', 'a') or die("No puedo abrir archivo");
    $count_vote = 1;
    fputs($archivo, $op . "|" . $count_vote . "\n");
    $votos++;  // Si no existe, agregamos un voto para este ID
} else {
    fclose($archivo);
    $archivo = fopen('result.dat', 'r+') or die("No puedo abrir archivo");

    while (!feof($archivo)) {
        $linea = fgets($archivo);
        $datos = explode("|", $linea);
        $seek = (int)$datos[0];

        if ($seek == $op) {
            fputs($archivo2, $op . "|" . $count_vote . "\n");
        } else {
            fputs($archivo2, $linea);
        }
    }
}

fclose($archivo);
fclose($archivo2);

if ($existe == 1) {
    unlink("result.dat");
    rename("result.tmp", "result.dat");
}

echo "<a href=javascript:history.back(-1);>Se ha realizado la actualización, ¿desea volver?</a>";
echo "<B><U>RESULTADOS ENCUESTA</B></U>";
echo "<br><br>";
echo "Total Votos: <b>$votos</b>";
echo "<br><br>";
echo "<a href=javascript:history.back(-1);>Volver</a>";
?>

