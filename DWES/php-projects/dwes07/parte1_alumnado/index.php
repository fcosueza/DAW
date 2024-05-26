<?php
require 'vendor/autoload.php';

if (file_exists(DATOS))
    $datos = unserialize(file_get_contents(DATOS));
else
    $datos = [];

if (isset($_FILES['fichero_usuario'])) {
    if ($_FILES['fichero_usuario']['error'] == UPLOAD_ERR_OK) {

        if (count($datos) > 5) {
            echo 'Ya se han subido 5 archivos. Debe eliminar alguno.';
        } else {            
            $hash256 = hash_file('sha256', $_FILES['fichero_usuario']['tmp_name']);
            if (in_array($hash256, array_column($datos, 'HASH256'))) {
                echo "<H2>Ya está el archivo subido.</H2>";
            } else {
                $newtmpname = CARPETA_SUBIDAS . DIRECTORY_SEPARATOR . uniqid() . '-' . basename($_FILES['fichero_usuario']['tmp_name']);

                $resultado = move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $newtmpname);
                if ($resultado) {
                    
                    $datos_archivo = $_FILES['fichero_usuario'];
                    $datos_archivo['tmp_name'] = $newtmpname;
                    $datos_archivo['HASH256'] = $hash256;
                    $datos_archivo['estado'] = 'no_enviado_a_virus_total';
                    $datos[] = $datos_archivo;
                }
            }
        }
    } 
    else // $_FILES['fichero_usuario']['error']!=UPLOAD_ERR_OK
    {
        echo 'Se ha producido un error al subir el archivo. Es posible qeu sea más grande que el tamaño máximo permitido';
    }
}

if (isset($_POST['delete']))
{
    if (($pos=array_search($_POST['delete'], array_column($datos, 'HASH256')))!==false) {
        unlink($datos[$pos]['tmp_name']);
        unset($datos[$pos]);
    }
}

if (isset($_POST['subirarchivo']))
{
    if (($pos=array_search($_POST['subirarchivo'], array_column($datos, 'HASH256')))!==false) {
        if ($datos[$pos]['estado']==='no_enviado_a_virus_total')
        {
            /*TODO:
                1) Completa la función enviarArchivoAVerificar en el archivo funciones_acceso_servicio_web.php.
                   IMPORTANTE: el tipo mime lo puedes extraer de los datos serializados ($datos)
                2) Si el archivo se pudo subir (HTTP status code 200) añade a los datos del archivo:
                    $datos[$pos]['estado']='ya_enviado_a_virus_total';
                    $datos[$pos]['id']=... id del trabajo de análisis generado por el api de virus total...;
                3) Si no se pudo realizar (HTTP status code 400), mostrar información del error.
            */
            echo "<H1>SUBIRARCHIVO POR IMPLEMENTAR.</H1>";
        }
        else{
            echo "El archivo ya ha sido enviado para su análisis.";
        }
    }
    else
    {
        echo "El archivo no existe";
    }    
}

if (isset($_POST['resultadosEscaneo']))
{
    if (($pos=array_search($_POST['resultadosEscaneo'], array_column($datos, 'HASH256')))!==false) {
        if ($datos[$pos]['estado']==='ya_enviado_a_virus_total')
        {
             /*TODO:
                1) Completa la función obtenerEstadoVerificacion en el archivo funciones_acceso_servicio_web.php.
                2) Usar dicha función par verificar el estado usando el hash 256.                   
                3) En función de los datos retornados, mostrar una tabla indicando si cada motor antimalware ha detectado algún malware o no.
                   Importante: virus total tarda un rato en analizar cada archivo, por lo que el informe puede tener la información del resultado de búsqueda o no,
                   en función de si ha terminado el análisis.
            */
            echo "<H1>OBTENER INFORME DE ANALISIS POR IMPLEMENTAR.</H1>";
        }
        else{
            echo "El archivo NO ha sido enviado para su análisis o NO ha empezado a ser procesado.";
        }
    }
    else
    {
        echo "El archivo no existe";
    }    
}

include('mostrar_archivos.php');
file_put_contents(DATOS, serialize($datos));

?>
<form enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
    Envia el fichero para analizar: <input name="fichero_usuario" type="file" />
    <BR>
    <input type="submit" value="Enviar fichero" />
</form>