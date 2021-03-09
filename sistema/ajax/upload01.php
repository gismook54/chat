<?php
require('extras/Uploader.php');



// Directory where we're storing uploaded images
// Remember to set correct permissions or it won't work
//$upload_dir = 's_files/';
$valid_extensions = array('gif', 'png', 'jpeg', 'jpg', 'mp4', 'mpg', 'mpeg', 'mp3', 'doc', 'docx', 'xls', 'xlsx', 'm4v', 'mov', 'ppt', 'pptx', 'pdf', 'wav', 'wma', 'asf', 'zip');

session_start();
$nemployee = $_SESSION['no_employee'];
$upload_dir = '../docs/'.$nemployee;


if(!is_dir($upload_dir)){
	@mkdir($upload_dir, 0755);
}

//Vamos a renombrar el archivo aleatorio para evitar conflictos con nombre de archivos
$code = '';

for($x = 0; $x<2; $x++) {
  $code .= '_'.substr(strtolower(sha1(rand(0,999999999999999))),2,8);
}


$code = substr($code,1);

$Upload = new FileUpload('uploadfile');
$ext = $Upload->getExtension(); // Get the extension of the uploaded file
$Upload->newFileName = 'f_'.$code.'.'.$ext;
$result = $Upload->handleUpload($upload_dir, $valid_extensions);

$filenamed =  $Upload->newFileName;

$lologro =  '<p class="text-success">¡Archivo cargado!</p>';

$nosevale = '<p class="text-dager"><code>¡Error: '.$Upload->getErrorMsg().'</code></p>';

$_SESSION['foto_emp'] = $filenamed;




// Handle the upload
$result = $Upload->handleUpload($upload_dir);

if (!$result) {
  exit(json_encode(array('success' => false, 'msg' => $nosevale)));  
}

echo json_encode(array('msg' => $lologro));
