<?php
$file = $_REQUEST['id'];
download($file);
function download($file){
    $file = $id_fail;
    if(file_exists($file)){
        header('content-Desciption:File Transfer');
        header('content-type:application/octet-stram');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}
    }
}
?>