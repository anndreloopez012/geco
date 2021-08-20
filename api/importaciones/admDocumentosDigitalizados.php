<?php 
function processFiles(){
    global $arrFechaIniDiaInt, $username;
	if ( isset($_POST["hidPostFiles"]) && ( $_POST["hidPostFiles"] == "Y" ) ){
		header("Content-Type: text/html; charset=iso-8859-1");
		$strIdImage = isset($_POST["strFileId"]) ? $_POST["strFileId"]: "";
        $strNombre =  isset($_POST["strNombre"]) ? $_POST["strNombre"]: "";
                        
        if ( !empty($strIdImage) ){
            if( isset($_FILES[$strIdImage]) ){
                if( $_FILES[$strIdImage]["error"] == UPLOAD_ERR_OK ){

                    
                    $strFile = isset( $_FILES[$strIdImage]["name"] ) ? $_FILES[$strIdImage]["name"] : "" ;
                    $strFile = str_replace(array("/"," ","%",";", "'", "´"), "", $strFile);
                    $strFile = str_replace(array("á","é","í","ó","ú","ñ","à","è","ì","ò","ù","Á","É","Í","Ó","Ú","Ñ","À","È","Ì","Ò","Ù"),
                                            array("a","e","i","o","u","n","a","e","i","o","u","A","E","I","O","U","N","A","E","I","O","U"),
                                            $strFile);


                    if ( !empty($strFile) ){
                        $strCuenta = str_replace('.pdf','',$strFile);
                        $dir = "../../asset/img/docs-pdf";
                        @chmod($dir, 0777);
                        $strPath = str_replace("\\","/",$dir);

                        
                        $strQuery = "INSERT INTO DOCUMENTS (NIU, CODICLIE, NOMDOC, FECHA, OWNER, EXTENCION) VALUES (0, '{$strCuenta}', '{$strNombre}', '{$arrFechaIniDiaInt}', '{$username}', 'PDF')";
                        //print $strQuery;
                        $query = ibase_prepare($strQuery);
                        if ( ibase_execute($query)) {
                            
                            $rs = ibase_query("SELECT NIU FROM DOCUMENTS ORDER BY NIU DESC ROWS 1");
                            if ($row = ibase_fetch_row($rs)) {
                                $idRow = trim($row[0]);
                            }
                            $intIdRegistro = isset($idRow) ? $idRow  : 0;
                            
                            $strPathAndFile = $strPath."/".$intIdRegistro."-".$strFile;

                                            
                            if( !empty($strPathAndFile) && file_exists($strPathAndFile) )
                                unlink($strPathAndFile);

                            move_uploaded_file($_FILES[$strIdImage]["tmp_name"], $strPathAndFile);
                            @chmod($strPathAndFile, 0777);
                                
                        }

                        
                        
                    }

                }
            }

        }


		die();
	}

}

function runAjax(){
    processFiles();

} 

runAjax();
?>