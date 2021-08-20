<script>
var strUrlPost = "documentosDigitalizados.php"
var jsonObjUpload_Files = {};
var intLimiteFileSize  = 26214400
function fntSetUpload_Files(){
	jsonObjUpload_Files = {};
	jsonObjUpload_Files['status'] = 'Edit';        
	jsonObjUpload_Files['selected-file'] = false; 
	jsonObjUpload_Files['object'] = $("#divFileUpload").uploadFile({
		url:strUrlPost,
		fileName: "flFile",
		maxFileCount: 100,
		maxFileSize:intLimiteFileSize,      
		showProgress: true,
		showFileSize: true,
		showPreview: true,
		multiple: true,
		allowedTypes:"pdf",
		acceptFiles:'.pdf',
		autoSubmit:false,
		previewHeight: "40px",
		previewWidth: "auto",
		dragdropWidth: 'auto',
		statusBarWidth: 'auto',
		dynamicFormData: function(){
			var strNm = $(this)[0].fileName;
            var data = {}
            strNm = strNm.replace('[','')
            strNm = strNm.replace(']','')
            var data ={ 
				hidPostFiles: 'Y', 
                strFileId: strNm,
                strNombre:$('[name=txtNombreTipo]').val() 				
			};
			return data;        
		},
		onSuccess:function(files,data,xhr,pd){
			jsonObjUpload_Files['status'] = 'Ok-Uploaded';
			$('#loading-screen').hide();			
			
			
		},
		onSelect:function(files){
			jsonObjUpload_Files['status'] = 'Not-Uploaded';                              
			jsonObjUpload_Files['selected-file'] = true;   
			return true; 
		},
		onCancel: function(files,pd){
			jsonObjUpload_Files['status'] = 'Edit';
			jsonObjUpload_Files['selected-file'] = true; 
			 
		},
		onAbort: function(files,pd){
			jsonObjUpload_Files['status'] = 'Edit';
            jsonObjUpload_Files['selected-file'] = true;
            $('#loading-screen').hide();                          
		},
		onErrorType: function(files,status,errMsg,pd){
			 jsonObjUpload_Files['status'] = 'Edit';
			 jsonObjUpload_Files['selected-file'] = true;
             jsonObjUpload_Files['object'].cancelAll();
             
		}
		
	});  
}

function fntSendPost_Files(){
	var objflFile = getDocumentLayer("flFile");
	var strFileId = objflFile.id;
	var objFileImagen = document.getElementById( strFileId );
	var arrArchivosImagen = objFileImagen.files;
	
	if(window.XMLHttpRequest) {
		var objAjax = new XMLHttpRequest();
	}
	else if(window.ActiveXObject) {
		var objAjax = new ActiveXObject("Microsoft.XMLHTTP");
	}



	var objFormData = new FormData();
    objFormData.append("hidPostFiles", "Y");
    strFileId = strFileId.replace('[','')
    strFileId = strFileId.replace(']','')
	objFormData.append("strFileId", strFileId);
    objFormData.append("strNombre", $('#txtNombreTipo').val() );
    objFormData.append(strFileId, arrArchivosImagen[0]);
    $('#loading-screen').show()
    objAjax.open("POST", strUrlPost, false);
	objAjax.onload = function(Event){
		if( objAjax.status == 200 ){
            $('#loading-screen').hide()
			var strResult = objAjax.responseText;
			
		}
	};
	objAjax.send(objFormData);
	
}

function fntSubmit(){
    var boolError = false;
    var objtxtNombre = document.getElementById("txtNombreTipo");
	var strNombre = objtxtNombre.value;
	objtxtNombre.style.background = "";
	if ( strNombre == "" ){
		objtxtNombre.style.background = "#FFC0C0";
		boolError = true;
	}
    if ( !boolError ){
		if ( jsonObjUpload_Files['object'] && jsonObjUpload_Files['status']  ){
			if( jsonObjUpload_Files['status'] == 'Not-Uploaded' ){
				if( jsonObjUpload_Files['selected-file'] == true ){
                    $('#loading-screen').show();
					jsonObjUpload_Files['object'].startUpload();                                 
				}
				
			}else if( jsonObjUpload_Files['status'] == 'Edit'  ){
				fntSendPost_Files();                            
			}
		}   

		
	}

}

$(function(){
    fntSetUpload_Files()
})
</script>