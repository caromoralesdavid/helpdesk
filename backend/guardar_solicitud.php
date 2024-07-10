<?php
require_once './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $solicitado_por = $_POST['solicitado_por'];
    $correo = $_POST['correo'];
    $ubicacion = $_POST['ubicacion'];
    $equipo_dispositivo = $_POST['equipo_dispositivo'];
    $fecha_falla = $_POST['fecha_falla'];
    $situacion_encontrada = $_POST['situacion_encontrada'];
    $causas = $_POST['causas'];

    $conn = getDBConnection();

    $sql = "INSERT INTO solicitud_soporte (solicitado_por, correo, ubicacion, equipo_dispositivo, fecha_falla, situacion_encontrada, causas)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssss", $solicitado_por, $correo, $ubicacion, $equipo_dispositivo, $fecha_falla, $situacion_encontrada, $causas);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../index.html?success=true");
            exit();
        } else {
            echo "Error: No se pudo guardar la solicitud. " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: No se pudo preparar la consulta. " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
