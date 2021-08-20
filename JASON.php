<?PHP
$pais = "2";
$canal = "1";
$sucursal = "194";
$folio = "36700";
$numTel = "56897412";
$idCamp = "53";
$idTarea = "0";
$numEmp = "12354 usuario";
$token = "CobZa2018";
$idOrigen = "2";
$canalOrigen = "11";
$fecha = date("d-m-Y");
$hora = date("H:i:s");
$tipoCliente = "0";

$arrInfo["pais"] = utf8_encode($pais);
$arrInfo["canal"] = utf8_encode($canal);
$arrInfo["sucursal"] = utf8_encode($sucursal);
$arrInfo["folio"] = utf8_encode($folio);
$arrInfo["numTel"] = utf8_encode($numTel);
$arrInfo["idCamp"] = utf8_encode($idCamp);
$arrInfo["idTarea"] = utf8_encode($idTarea);
$arrInfo["numEmp"] = utf8_encode($numEmp);
$arrInfo["token"] = utf8_encode($token);
$arrInfo["idOrigen"] = utf8_encode($idOrigen);
$arrInfo["canalOrigen"] = utf8_encode($canalOrigen);
$arrInfo["fecha"] = utf8_encode($fecha);
$arrInfo["fecha"] = utf8_encode($fecha);
$arrInfo["hora"] = utf8_encode($hora);
$arrInfo["tipoCliente"] = utf8_encode($tipoCliente);

$json = json_encode($arrInfo);
$data = $json;

function encrypt($data, $key)
{
    return strtoupper(bin2hex(openssl_encrypt($data, 'aes-128-ecb', $key, OPENSSL_PKCS1_PADDING)));
}

$key = '[B@nc0Azt3c@2017';
$strEncript =  encrypt($data, $key);

print_r($strEncript);
print_r('<br>');
//
print_r($data);
//print_r($strEncript);
