<?php
	session_start();
	include 'database.php';
	$id= $_SESSION["id"];
	$sql=mysqli_query($conn,"SELECT * FROM usuarios where id='$id' ");
	$row  = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="flex flex-row justify-between items-center px-[60px] py-[20px] border-[1px] border-blue-900 bg-[black]">
        <div class="text-[25px] text-[blue]">
        <h1>Tienda</h1>
        </div>
        <div class="text-[white]">
            <a class="px-[15px] hover:text-[blue]" href="home.php">Inicio</a>
            <a class="px-[15px] hover:text-[blue]" href="mostrar_a.php">Productos</a>
            <a class="px-[15px] hover:text-[blue]" href="crearProducto.php">Crear Producto</a>
            <a class="px-[15px] hover:text-[blue]" href="modificar.php?id=<?php echo $row['id']; ?>">Editar</a>
            <a class="px-[15px] hover:text-[blue]" href="logout.php">Cerrar Sesion</a>
        </div>
    </nav>
    <section class="text-center text-[24px]">
    <p class=""><br><b>Bienvenido</b> <?php echo $_SESSION["nombre"] ?> <?php echo $_SESSION["apellido"] ?></p>
    </section>
</body>
</html>