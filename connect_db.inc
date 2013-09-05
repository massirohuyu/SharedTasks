<?php
/**
 * User: massirohuyu
 */

    $mysqli = new mysqli('hostinputname', 'userinputhere', 'passwordinputhere', 'schemainputhere');

    if ($mysqli->connect_error) {
        die('接続に失敗しました。 (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
    }

    $mysqli->set_charset('utf8');
    
?>
