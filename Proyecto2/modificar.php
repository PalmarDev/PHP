<?php
session_start();
include 'database.php';
$usuario = $_SESSION["id"];

//generar la consulta para extraer los datos
$id = $_GET['id'];
$m = "SELECT * FROM usuarios WHERE id='$id'";
$modificar = $conn->query($m);
$dato = $modificar->fetch_array();

if(isset($_POST['save'])){
    //recuperar los datos que se encuentran en cada uno de los inputs
    $id = $_POST['id'];
    $nombre = $conn->real_escape_string($_POST['mnombre']);
    $apellido = $conn->real_escape_string($_POST['mapellido']);
    $usuario = $conn->real_escape_string($_POST['musuario']);
    $contraseña = $conn->real_escape_string($_POST['mcontraseña']);
    $confirmar_contraseña = $conn->real_escape_string($_POST['mccontraseña']);
    $correo = $conn->real_escape_string($_POST['mcorreo']);

    // Verificar que las contraseñas coincidan antes de encriptar
    if ($contraseña === $confirmar_contraseña) {
        // Encriptar la contraseña utilizando password_hash
        $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

        // realizar la consulta para modificar los datos
        $actualiza = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', usuario = '$usuario', contraseña = '$contraseña_encriptada', correo='$correo' WHERE id = '$id' ";
        $actualizar = $conn->query($actualiza);
        header("location:home.php");
        exit();
    } else {
        echo "Las contraseñas no coinciden.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hello World</title>
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
    <section class="w-[80%] ml-[10%] mr-[10%] h-[60%] pt-[5%]">
    <div class=" ml-[70px] text-[26px]">
        <h1><i> Edita tu informacion </i></h1>
    </div>
    <form class="border-[1px] border-blue-700 w-[35%]" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	<div class="flex flex-col">
    <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
    <div class="py-2 text-[16px]">
    <label class="px-[10px]" for="nombre"> Nombre</label>
	<input class="ml-[105px] text-[16px] border-[1px] border-blue-700 " type="text" name="mnombre" placeholder="Nombre" value="<?php echo $dato['nombre'] ?>" required="required">
	</div>
    <div class="py-2 text-[16px]">
    <label class="px-[10px]" for="apellido"> Apellido</label>
    <input class="ml-[105px] text-[16px] border-[1px] border-blue-700" type="text" name="mapellido" placeholder="Apellido" value="<?php echo $dato['apellido'] ?>" required="required">
    </div>
    <div class="py-2 text-[16px]">
    <label class="px-[10px]" for="usuario"> Usuario</label>
    <input class="ml-[110px] text-[16px] border-[1px] border-blue-700" type="text" name="musuario" placeholder="Usuario" value="<?php echo $dato['usuario'] ?>" required="required">
    </div>
    <div class="py-2 text-[16px]">
    <label class="px-[10px]" for="contraseña"> Contraseña</label>
    <input class="ml-[85px] text-[16px] border-[1px] border-blue-700" type="password" name="mcontraseña" placeholder="Contraseña" required="required">
    </div>
    <div class="py-2 text-[16px]">
    <label class="px-[10px]" for="confirmar_contraseña"> Confirmar Contraseña</label>
    <input class="ml-[10px] text-[16px] border-[1px] border-blue-700" type="password" name="mccontraseña" placeholder="Confirma Contraseña" required="required">
    </div>
    <div class="py-2 text-[16px]">
    <label class="px-[10px]" for="correo"> Correo</label>
    <input class="ml-[115px] text-[16px] border-[1px] border-blue-700" type="email" name="mcorreo" placeholder="Email" value="<?php echo $dato['correo'] ?>" required="required">
    </div>
    <div class="ml-[130px] py-2">
    <button class="bg-[black] text-[white] border-[1px] border-blue-700 rounded-md px-2" type="submit" name="save">Actualizar</button>
    </div>
</div>
<div class="ml-[100px] text-[16px] py-2"> 
<p> No quieres editar? <a class="bg-[black] text-[white] border-[1px] border-blue-700 rounded-md px-2" href="home.php">Home</a></p>
</div>
    </form>
    </section>
</body>
</html>
