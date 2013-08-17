<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yoshinori
 * Date: 2013/08/11
 * Time: 21:36
 * To change this template use File | Settings | File Templates.
 */

    $mysqli = new mysqli('hostinputname', 'userinputhere', 'passwordinputhere', 'schemainputhere');

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
    }

    $mysqli->set_charset('utf8');
    
?>
