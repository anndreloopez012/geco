
<?php
$subject = $Modulo."-".$Orden;

$message = "
<html>
<head>
</head style='background-color: coral;'>
<body>
<p>$titulo</p></br></br>
<table>
<tr>
<td>$lugar</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <dor.servicios@visualmed.online>' . "\r\n";
//$headers .= 'Cc: <monterrosow@yahoo.com> ' . "\r\n";

mail($to,$subject,$message,$headers);
?>