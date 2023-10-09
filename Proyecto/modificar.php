<?php
session_start();
include 'database.php';
$usuario = $_SESSION["ID"];

//generar la consulta para extraer los datos
$ID = $_GET['ID'];
$m = "SELECT * FROM register WHERE ID='$ID'";
$modificar = $conn->query($m);
$dato = $modificar->fetch_array();
if(isset($_POST['save'])){
//recuperar los datos que se encuentran en cada uno de los inputs
$ID = $_POST['ID'];
$nombre = $conn->real_escape_string($_POST['mfirst_name']);
$apellido = $conn->real_escape_string($_POST['mlast_name']);
$fecha_nacimiento = $conn->real_escape_string($_POST['mdate_nac']);
$password = $conn->real_escape_string($_POST['mpass']);
$password = $conn->real_escape_string($_POST['mcpass']);
// realizar la consulta para modificar los datos
$actualiza = "UPDATE register SET First_Name = '$nombre', Last_Name = '$apellido', Date_nac = '$fecha_nacimiento', Password = 'md5($password)' WHERE ID = '$ID' ";
$actualizar = $conn->query($actualiza);
header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="modificar.css">
<title>Hello World</title>
</head>
<body>
<div id="logo">
    <h1><i> EDIT YOUR INFO </i></h1>
</div>
<section class="stark-login">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	<div id="fade-box">
    <input type="hidden" name="ID" value="<?php echo $dato['ID']; ?>">
	<input type="text" name="mfirst_name" placeholder="First Name" value="<?php echo $dato['First_Name'] ?>" required="required">
	<input type="text" name="mlast_name" placeholder="Last Name" value="<?php echo $dato['Last_Name'] ?>" required="required">
    <input type="date" name="mdate_nac" placeholder="Date" value="<?php echo $dato['Date_nac'] ?>" required="required">
    <input type="password" name="mpass" placeholder="Password" required="required">
    <input type="password" name="mcpass" placeholder="Confirm Password" required="required">
    <div class="">Want to Leave the Edit? <br><a href="home.php">Home</a></div>
    <button type="submit" name="save">EDIT</button>
    </div>
    </form>
    </section>
</body>
</html>