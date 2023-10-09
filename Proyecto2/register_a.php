<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function phpMailer($correo, $nombre, $apellido){
    require_once('vendor/PHPMailer/src/Exception.php');
    require_once('vendor/PHPMailer/src/PHPMailer.php');
    require_once('vendor/PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);

    try{
        //Servidor
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'in-v3.mailjet.com';
        $mail->SMTPAuth = true;
        $mail->Username = '21a0b1a990c644de39c61159ccd54030';
        $mail->Password = '0bfe733f676596257c7257480101d0eb';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Usuario
        $mail->setFrom('admin@palmardev.com', 'palmardev.com');
        $mail->addAddress($correo, $nombre, $apellido);

        //Contenido
        $mail->isHTML(true);
        $mail->Subject = 'Bienvenido a palmardev.com';
        $mail->Body = 'Gracias por registrarte. Ahora ya eres parte de una gran <b>comunidad</b>.';
        $mail->AltBody = 'Gracias por registrarte. Ahora ya eres parte de una gran comunidad.';

        $mail->send();
    }catch (Exception $e){
        echo 'El mensaje no pudo ser enviado: '. $mail->ErrorInfo;
    }

}

extract($_POST);
include("database.php");
$sql=mysqli_query($conn,"SELECT * FROM usuarios where correo='$correo'");
if(mysqli_num_rows($sql)>0)
{
    echo "correo Id Already Exists";
    exit;
}
else(isset($_POST['save']));
{
        // Encriptar la contraseña utilizando password_hash()
        $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

        $query="INSERT INTO usuarios(nombre, apellido, usuario, contraseña, correo ) VALUES ('$nombre', '$apellido', '$usuario', '$contraseña_encriptada', '$correo')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: login.php?status=success");
        phpMailer($correo, $nombre, $apellido);
}

?>