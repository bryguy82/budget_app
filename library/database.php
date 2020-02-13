<?php
/**
 * Home index page
 */
function getTitleIndex(){
    $db = angelConnect();
    $sql = "SELECT * FROM content WHERE section = 'title' AND page = 'index'";
    $stmt = $db->prepare($sql);
    $stmt->execute(); 
    $titleInfo = $stmt->fetchAll(); 
    $stmt->closeCursor(); 
    return $titleInfo;
}


/**
 * Servicios y productos page
 */
function getTitleServicios(){
    $db = angelConnect();
    $sql = "SELECT * FROM content WHERE section = 'title' AND page = 'serviciosyproductos'";
    $stmt = $db->prepare($sql);
    $stmt->execute(); 
    $titleInfo = $stmt->fetchAll(); 
    $stmt->closeCursor(); 
    return $titleInfo;
}

function getStrategies(){
    $db = angelConnect();
    $sql = "SELECT * FROM services WHERE section = 'services' AND title = 'Estrategia'";
    $stmt = $db->prepare($sql);
    $stmt->execute(); 
    $strategyInfo = $stmt->fetchAll(); 
    $stmt->closeCursor(); 
    return $strategyInfo;
}

?>