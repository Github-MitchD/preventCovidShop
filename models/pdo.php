<?php
require_once 'config.model.php';

/**
 * Function that allows connection to the bdd
 *
 * @return $DB
 */
function connexionPDO()
{
    $DB = new PDO("mysql:host=" . HOST_NAME . ";dbname=" . DATABASE_NAME . ";charset=utf8", USER_NAME, PASSWORD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    return $DB;
}
