<?php
session_start();
foreach ($_SESSION as $value) {
    echo '<pre>', 'Session ', print_r($value) ,'</pre>';
}




