<?php 
define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// Products Promotion
const PROMO = 15/100;
const PROMO_VALUE = "15%";

// Alert management
const ALERT_SUCCESS = 1;
const ALERT_DANGER = 2;
const ALERT_INFO = 3;
const ALERT_WARNING = 4;

function displayAlert($text, $type){
    $alertType = "";
    if($type === ALERT_SUCCESS) $alertType = "success";
    if($type === ALERT_DANGER) $alertType = "danger";
    if($type === ALERT_INFO) $alertType = "info";
    if($type === ALERT_WARNING) $alertType = "warning";

    $txt = '<div class="alert alert-'.$alertType.' alert-dismissible text-center mt-3 mb-2" role="alert">';
    $txt .= $text;      
    $txt .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    
    return $txt;
}

// Images management
function addImage($file, $dir, $title) {
    if (!file_exists($dir)) mkdir($dir, 0777);
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    $title = str_replace(' ', '_', $title);
    $title = str_replace("'", '_', $title);
    $title = strtolower($title);

    $target_file = $dir ."product_". $title."_".strtolower($file['name']);

    if (!mime_content_type($file['tmp_name']))
        throw new Exception("Ce fichier n'est pas une image !");
    if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png")
        throw new Exception("L'extension du fichier n'est pas reconnue !");
    if (file_exists($target_file))
        throw new Exception("Ce fichier existe déjà !");
    if ($file['size'] > 500000)
        throw new Exception("Ce fichier est trop gros !");
    if(!move_uploaded_file($file['tmp_name'], $target_file))
        throw new Exception("Une erreur est survenu pendant l'upload de l'image !");
    else return ("product_". $title."_".strtolower($file['name']));
}