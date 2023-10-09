<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function phpMailer($email, $first_name, $last_name){
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
        $mail->addAddress($email, $first_name, $last_name);

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
$sql=mysqli_query($conn,"SELECT * FROM register where Email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists";
	exit;
}
else(isset($_POST['save']));
{
        $query="INSERT INTO register(First_Name, Last_Name, Date_nac, Email, Password) VALUES ('$first_name', '$last_name', '$date_nac', '$email', 'md5($pass)')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: login.php?status=success");
        phpMailer($email, $first_name, $last_name);

}
?>