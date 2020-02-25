<?php
/**
 * BUDGET CONTROLLER
 */

// Create or access a Session 
session_start();

// Get the database connection file
require_once 'library/connection.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL){
        $action = 'Home';
    }
}


switch ($action){
    case 'Home':
        include 'view/home.php';
        break;

    default:
        include 'view/home.php';
}


?>