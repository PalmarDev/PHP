<?php
// Verificar si se ha iniciado sesión
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
        <p class=""><b>Bienvenido</b> <?php echo $_SESSION["nombre"] ?> <?php echo $_SESSION["apellido"] ?></p>
        <h1 class="text-bold text-[32px]"><b>Productos Disponibles</b></h1>
    </section>
    <section class="flex flex-row items-center justify-center my-[15px]">
        <form method="GET" action="">
            <input class="border-2 border-[black] rounded-xl pl-2" type="text" name="buscar" id="buscar" placeholder="Buscar Producto">
            <button class="border-2 border-[black] text-[white] bg-[black] rounded-lg" type="submit">Buscar</button>
        </form>
    </section>
    <section class="grid grid-cols-3 w-[80%] ml-[10%] mr-[10%] h-[100%] mt-[5%]">
    <?php
// Conexión a la base de datos MySQL
$url = 'localhost';
$username = 'root';
$password = '';
$dbname = 'proyecto';
$conn = mysqli_connect($url, $username, $password, $dbname);

// Verificar si se ha enviado una solicitud de búsqueda
if (isset($_GET['buscar'])) {
    // Obtener los términos de búsqueda ingresados por el usuario
    $terminos = $_GET['buscar'];

    // Construir la consulta SQL
    $sql = "SELECT * FROM productos WHERE nombre LIKE '%$terminos%' OR categoria LIKE '%$terminos%'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conn, $sql);

    // Mostrar los resultados
    while ($fila = mysqli_fetch_array($resultado)) {
        echo '<div class="flex flex-col items-center justify-between w-[60%] h-[90%] border-[1px] border-blue-900 m-[10px] ">';
        echo '<h2 class="text-xl font-bold">' . $fila['nombre'] . '</h2>';
        echo '<p class="text-gray-600">' . $fila['categoria'] . '</p>';
        echo '<p class="text-gray-600">' . $fila['tipo_producto'] . '</p>';
        echo '<p class="text-gray-600">' . $fila['unidades_disponibles'] . '</p>';
        echo '</div>';
    }

    // Cerrar el resultado y la conexión a la base de datos
    mysqli_free_result($resultado);
    mysqli_close($conn);
}
?>
</section>
    <section class="grid grid-cols-3 w-[80%] ml-[10%] mr-[10%] h-[100%] mt-[5%]">
            <?php
    // Conexión a la base de datos MySQL
    $url='localhost';
    $username='root';
    $password='';
    $conn = mysqli_connect($url,$username,$password,"proyecto");
    
    // Obtener el número total de productos
    $sql = "SELECT COUNT(*) AS total FROM productos";
    $resultado = mysqli_query($conn, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $total_productos = $fila['total'];
    
    // Calcular el número total de páginas
    $total_paginas = ceil($total_productos / 12);
    
    // Obtener el número de página actual
    if (isset($_GET['pagina'])) {
        $pagina_actual = $_GET['pagina'];
    } else {
        $pagina_actual = 1;
    }
    
    // Calcular el índice del primer producto en la página actual
    $primer_producto = ($pagina_actual - 1) * 12;
    
    // Consulta SQL para recuperar los datos de la tabla de productos
    $sql = "SELECT * FROM productos LIMIT $primer_producto, 12";
    $resultado = mysqli_query($conn, $sql);
    
    // Mostrar los datos de los productos
    while ($fila = mysqli_fetch_array($resultado)) {
        echo '<div class="flex flex-col items-center justify-between w-[60%] h-[90%] border-[1px] border-blue-900 m-[10px] ">';
        echo '<h2 class="text-xl font-bold">' . $fila['nombre'] . '</h2>';
        echo '<p class="text-gray-600">' . $fila['categoria'] . '</p>';
        echo '<p class="text-gray-600">' . $fila['tipo_producto'] . '</p>';
        echo '<p class="text-gray-600">' . $fila['unidades_disponibles'] . '</p>';
        echo '</div>';
    }
    
    // Mostrar botón de "siguiente página" si hay más páginas disponibles
    if ($pagina_actual < $total_paginas) {
        echo '<a href="mostrar_a.php?pagina=' . ($pagina_actual + 1) . '">Siguiente página</a>';
        #revisar ancla
    }
    
    // Cerrar conexión a la base de datos MySQL
    mysqli_close($conn);
    ?>
</section>
</body>
</html>
