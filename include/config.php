<?php
 ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$DB_HOST = 'localhost';
$DB_USER = 'raviprov1';
$DB_PASS = 's081691';
$DB_NAME = 'raviprov1_db';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
?>
