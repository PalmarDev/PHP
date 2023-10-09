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
        <div class="flex flex-col justify-center items-center">
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-[30px]">Iniciar Sesion</h1>
                <form action="login_a.php" method="post" enctype="multipart/form-data">
                    <input class="border-[1px] border-blue-900" type="text" name="usuario" placeholder="Usuario">
                    <input class="border-[1px] border-blue-900" type="password" name="contraseña" placeholder="Contraseña">
                    <button class="border-[1px] border-blue-900" type="submit" name="login">Iniciar Sesion</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>