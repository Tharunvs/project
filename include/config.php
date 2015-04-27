<?php
 ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$DB_HOST = 'localhost';
$DB_USER = 'raviprolu';
$DB_PASS = 'newpaltz12561';
$DB_NAME = 'database';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
?>
