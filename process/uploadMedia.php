<?php
include('../logueo.php'); 
include('../extras/conexion.php');
$link=Conectarse();



$idSolicitud = empty($_POST['idSolicitud']) ? '0' : $_POST['idSolicitud'];
$fechacompleta=date('Y-m-d H:i:s');



if (empty($_FILES['archivos']) AND $idSolicitud==0) {
    echo json_encode(['error'=>'No hay archivos para cargar']); 
    // or you can throw an exception 
    return; // terminate
}

// get the files posted
$images = $_FILES['archivos'];


$success = null;

// file paths to store
$paths= [];

// get file names
$filenames = $images['name'];

// loop and process files
for($i=0; $i < count($filenames); $i++){
    $ext = explode('.', basename($filenames[$i]));
    $target = "uploads" . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);
    if(move_uploaded_file($images['tmp_name'][$i], $target)) {
        $success = true;
        $nameFile = str_replace("uploads/", "", $target);

        $SQL="INSERT INTO r_clientes_recaudos (r_cliente_recaudo_id, r_cliente_recaudo_idSolicitud, r_cliente_recaudo_file, r_cliente_recaudo_created) VALUES (Null, '$idSolicitud', '$nameFile', '$fechacompleta')";
        $query=mysqli_query($link, $SQL);
        $lasid=mysqli_insert_id($link);

        $paths[] = $lasid;
    } else {
        $success = false;
        break;
    }
}

// check and process based on successful status 
if ($success === true) {

     $output = ['uploaded' => $paths];


} elseif ($success === false) {
    $output = ['error'=>'Error mientras se subian las imagenes.Contácte al administrador del sistema'];
    foreach ($paths as $file) {
        unlink($file);
    }
} else {
    //$output = ['error'=>'No files were processed.'];
}

// return a json encoded response for plugin to process successfully
echo json_encode($output);

?>