<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    extract($_POST);
    include 'database.php';

    // Consulta SQL utilizando el nombre de usuario
    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario='$usuario'");
    $row = mysqli_fetch_array($sql);
    if (is_array($row)) {
        // Verificar la contraseña desencriptada con password_verify()
        if (password_verify($contraseña, $row['contraseña'])) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["usuario"] = $row['usuario'];
            $_SESSION["nombre"] = $row['nombre'];
            $_SESSION["apellido"] = $row['apellido'];
            $_SESSION["role"] = $row['role'];
            header("Location: home.php");
            exit();
        } else {
            echo "Invalid usuario id/contraseña";
        }
    } else {
        echo "Invalid usuario id/contraseña";
    }
}
?>
