<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="home.css">
<title>Hello World</title>
</head>
<body>
<div id="logo"><h1>STARK INDUSTRIES</h1></div>
    <section class="stark-login">
    <form action="home.php" method="post" enctype="multipart/form-data">
            <?php
				session_start();
				include 'database.php';
				$ID= $_SESSION["ID"];
				$sql=mysqli_query($conn,"SELECT * FROM register where ID='$ID' ");
				$row  = mysqli_fetch_array($sql);
            ?>
		<p class=""><br><b>Welcome</b> <?php echo $_SESSION["First_Name"] ?> <?php echo $_SESSION["Last_Name"] ?></p>
        <div class="">Want to Leave the Page? <br><a href="logout.php">Logout</a></div>
        <div class="">You Want to Edit your Information? <br><a href="modificar.php?ID=<?php echo $row['ID']; ?>">Editar</a></div>
    </form>
    </section>
    <section>
    </section>
</body>
</html>