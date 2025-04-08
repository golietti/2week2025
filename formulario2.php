PHP para manejar el registro
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apellido = trim($_POST['apellido']);
    $nombre = trim($_POST['nombre']);
    $fechaAsistencia = isset($_POST['fechaAsistencia']) ? implode(", ", $_POST['fechaAsistencia']) : "";
    $correo = trim($_POST['correo']);
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $redesSociales = trim($_POST['redesSociales']);
    $perfil = $_POST['perfil'];
    $actividades = isset($_POST['actividad']) ? implode(", ", $_POST['actividad']) : "";

    if (!$apellido || !$nombre || !$correo || !$fechaNacimiento || !$perfil || !$actividades) {
        die("Todos los campos obligatorios deben completarse.");
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("El correo ingresado no es válido.");
    }

    $archivo = 'inscripciones.txt';
    $datosGuardados = file_exists($archivo) ? file($archivo, FILE_IGNORE_NEW_LINES) : [];

    foreach ($datosGuardados as $linea) {
        $datos = json_decode($linea, true);
        if ($datos['correo'] === $correo) {
            die("El correo ya está registrado.");
        }
    }

    $nuevoRegistro = json_encode(["apellidos" => $apellido, "nombres" => $nombre, "fechaAsistencia" => $fechaAsistencia, "correo" => $correo, "fechaNacimiento" => $fechaNacimiento, "redesSociales" => $redesSociales, "perfil" => $perfil, "actividades" => $actividades]);
    file_put_contents($archivo, $nuevoRegistro . "\n", FILE_APPEND);

    echo "\n Inscripción exitosa.";
}
?>
