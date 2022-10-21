<?php
require_once "pdo.php";

/**
 * Function that allows the sending of images in the DB
 *
 * @param string $nameImage
 * @param string $url
 * @param string $description
 * @return $idImage
 */
function insertImageIntoDB($nameImage, $url, $description){
    $DB = connexionPDO();
    $req = 'INSERT INTO images (image_name, image_url, image_desc)
    values (:image_name, :image_url, :image_desc) ';
    $stmt = $DB->prepare($req);
    $stmt->bindValue(":image_name", $nameImage, PDO::PARAM_STR);
    $stmt->bindValue(":image_url", $url, PDO::PARAM_STR);    
    $stmt->bindValue(":image_desc", $description, PDO::PARAM_STR);    
    $stmt->execute();
    $idImage = $DB->lastInsertId();
    $stmt->closeCursor();
    return $idImage;
}