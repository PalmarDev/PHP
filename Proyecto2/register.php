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
            <a class="px-[15px] hover:text-[blue]" href="index.php">Inicio</a>
            <a class="px-[15px] hover:text-[blue]" href="register.php">Registro</a>
            <a class="px-[15px] hover:text-[blue]" href="login.php">Iniciar Sesion</a>
        </div>
    </nav>

    <section>
        <div>
            <h1>Registro</h1>
            <form action="register_a.php" method="post">
                <div>
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre">
                </div>
                <div>
                    <label for="">Apellido</label>
                    <input type="text" name="apellido" placeholder="Apellido">
                </div>
                <div>
                    <label for="">Usuario</label>
                    <input type="text" name="usuario" placeholder="Usuario">
                </div>
                <div>
                    <label for="">Contraseña</label>
                    <input type="password" name="contraseña" placeholder="Contraseña">
                </div>
                <div>
                    <label for="">Confirmar Contraseña</label>
                    <input type="password" name="confirmar_contraseña" placeholder="Confirmar Contraseña">
                </div>
                <div>
                    <label for="">Correo</label>
                    <input type="email" name="correo" placeholder="Correo">
                </div>
                <button type="submit" name="register">Registrarse</button>
            </form>
        </div>
    </section>
</body>
</html>