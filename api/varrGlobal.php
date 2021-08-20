<?php
$conectar = conectar();
/////////////////////////// VARIABLES DE SESION ASIGANADAS //////////////////////////////////////////////////////////////////////////////////////
$username = $_SESSION["USUARIO"];

/////////////////////////// VARIABLES encript//////////////////////////////////////////////////////////////////////////////////////

//$arrInfo["datos"] = utf8_encode($pais);
//$json = json_encode($arrInfo);
//$data = $json;
//$strEncript =  encrypt($data, $key);

function encrypt($data, $key)
{
    return strtoupper(bin2hex(openssl_encrypt($data, 'aes-128-ecb', $key, OPENSSL_PKCS1_PADDING)));
}

function decrypt($data, $key)
{
    return openssl_decrypt(hex2bin(($data)), 'aes-128-ecb', $key, OPENSSL_PKCS1_PADDING);
}


////////////////////////////////////// FECHA DEL INICIO DE DIA /////////////////////////////////////////////////////////////////////////////////
$arrFechaIniDia = array();
$stmt = "SELECT CAST(0 AS NUMERIC(1,0)) AS NIU, FECHA FROM IF000001";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrFechaIniDia[$rTMP["NIU"]]["FECHA"]             = $rTMP["FECHA"];
}

if (is_array($arrFechaIniDia) && (count($arrFechaIniDia) > 0)) {
    reset($arrFechaIniDia);
    foreach ($arrFechaIniDia as $rTMP['key'] => $rTMP['value']) {

        $arrFechaIniDiaInt = $rTMP["value"]['FECHA'];
    }
}
////////////////////////////////////// Filter input and all /////////////////////////////////////////////////////////////////////////////////

function rem_special_caract($strString, $boolCodigo = false)
{
    $strReturn = "";

    if ($boolCodigo) {

        $strReturn = str_replace('- ', '', $strString);
        $strReturn = str_replace(' -', '', $strReturn);
        $strReturn = str_replace('-', '', $strReturn);
        $strReturn = str_replace('_', '', $strReturn);
        $strReturn = str_replace(' ', '-', $strReturn);
        $strReturn = str_replace(array("/", " ", "%", ";", ":", "?", "¿", "!", "¡", "(", ")", "&", "%", "$", "#", "\\", "+", "*", "\"", "\'", ",", ".", "~", "{", "}", "[", "]", ">", "<", "!", "¡", "#", "\"", "¨", "°", "|", "'"), "", $strReturn);
        $strReturn = str_replace(
            array("´", "á", "é", "í", "ó", "ú", "ñ", "à", "è", "ì", "ò", "ù", "Á", "É", "Í", "Ó", "Ú", "Ñ", "À", "È", "Ì", "Ò", "Ù", "ä", "ë", "ï", "ö", "ü", "Ä", "Ë", "Ï", "Ö", "Ü", "`", "à", "è", "ì", "ò", "ù", "À", "È", "Ì", "Ò", "Ù", "^", "â", "ê", "î", "ô", "û", "Â", "Ê", "Î", "Ô", "Û", "ç", "Ç"),
            array("", "a", "e", "i", "o", "u", "n", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "c", "C"),
            $strReturn
        );
    } else {

        $strReturn = str_replace(array("/", "%", ";", "'"), "", $strString);
        $strReturn = str_replace(
            array("´", "á", "é", "í", "ó", "ú", "ñ", "à", "è", "ì", "ò", "ù", "Á", "É", "Í", "Ó", "Ú", "Ñ", "À", "È", "Ì", "Ò", "Ù", "ä", "ë", "ï", "ö", "ü", "Ä", "Ë", "Ï", "Ö", "Ü", "`", "à", "è", "ì", "ò", "ù", "À", "È", "Ì", "Ò", "Ù", "^", "â", "ê", "î", "ô", "û", "Â", "Ê", "Î", "Ô", "Û", "ç", "Ç", "Ã³", "Ã¡", "Ã", "*"),
            array("", "a", "e", "i", "o", "u", "n", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "c", "C", "o", "a", "i", "."),
            $strReturn
        );
    }

    return $strReturn;
}


?>
