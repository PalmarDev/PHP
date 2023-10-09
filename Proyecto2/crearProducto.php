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
    <section class="w-[80%] ml-[10%] mr-[10%] h-[60%] pt-[5%]">
    <div class=" ml-[90px] text-[26px]">
        <h1><i> Crea un Producto </i></h1>
    </div>
    <form class="border-[1px] border-blue-700 w-[35%]" action="crearProducto_a.php" method="post">
    <div class="flex flex-col justify-center bg-[black] text-slate-100">
        <div class="py-2 text-[16px]">
        <label class="ml-[10px]" for="nombre">Nombre del Producto</label>
        <input class="text-[black] rounded-lg ml-[10px] border-[1px] border-blue-900" type="text" name="nombre" id="nombre" placeholder="Nombre del producto">
        </div>
        <div class="py-2 text-[16px]">
        <label class="ml-[10px]" for="descripcion">Categoria</label>
        <input class="text-[black] rounded-lg ml-[95px] border-[1px] border-blue-900" type="text" name="categoria" id="categoria" placeholder="Categoria del producto">
        </div>
        <div class="py-2 text-[16px]">
        <label class="ml-[10px]" for="tipo-producto">Tipo de Producto</label>
        <select class="text-[black] rounded-lg ml-[40px] border-[1px] border-blue-900" name="tipo_producto" id="">
            <option>Selecciona una opcion</option>
            <option value="fisico">Fisico</option>
            <option value="digital">Digital</option>
        </select>
        </div>
        <div class="py-2 text-[16px]">
        <label class="ml-[10px]" for="usuario">Su Usuario</label>
        <input class="text-[black] rounded-lg ml-[85px] border-[1px] border-blue-900" type="text" name="usuario_id" id="usuario" placeholder="Su usuario" value="<?php echo $row['id']; ?>" readonly>
        </div>
        <div class="py-2 text-[16px]">
        <label class="ml-[10px]" for="unidades_disponibles">Unidades Disponibles</label>
        <input class="text-[black] rounded-lg ml-[10px] border-[1px] border-blue-900" type="text" name="unidades_disponibles" id="unidades_disponibles" placeholder="Unidades disponibles">
        </div>
        <button class="rounded-lg my-6 border-[1px] border-blue-900" type="submit" name="crear">Crear Producto</button>
    </div>
    </form>
    </section>
</body>
</html>