<?php
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["nombre"]);
    unset($_SESSION["apellido"]);
    unset($_SESSION["usuario"]);
    header("Location:login.php");
?>