<?php

//$mailName = 'visualMed';
//$subject_ = 'VisualMed';
//$address_  = "andrelopez012@gmail.com";
//$mailContent = '
//<h2>test img</h2>
//<img src="https://i.ibb.co/gR0VdFW/visual.jpg" alt="visual" border="0" width="100%">
//<p>pass</p>';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';


$mail = new PHPMailer(true);

try {
	//Server settings
	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	$mail->Host       = 'mail.privateemail.com';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'dor.contacto@visualmed.online';
	$mail->Password   = 'D0r.C0ntact02020';
	$mail->SMTPSecure = 'SSL';
	$mail->Port       =  587;

	//si existe adjunto
	//if ($ad) {
	//	//añadimos texto al nombre original del archivo
	//	$dir_subida = 'fichero_';
	//	//nombre del fichero creado -> fichero_nombreArchivo.pdf
	//	$fichero_ok = $dir_subida . basename($ad);
	//	//y lo subimos a la misma carpeta
	//	move_uploaded_file($_FILES['adjunto']['tmp_name'], $fichero_ok);
	//}

	//Recipients
	$mail->setFrom('dor.contacto@visualmed.online', 'GECOW2.0');
	$subject  = $subject_;
	$address  = $address_;
	$mail->addAddress($address, $subject);
	$mail->addAddress('andrelopez012@gmail.com', 'andre');
	

	// Attachments
	//$mail->addAttachment('../asset/img/mail/visual.jpg' , 'error.jpg');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	// Content
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body    = $mailContent;
	$mail->CharSet = 'UTF-8';

	$mail->send();
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
