<?php
/**
 * User: massirohuyu
 */

  header("Content-type: text/html; charset=utf-8");
  $my_id = '';
  $my_name = 'ゲスト';
  $my_username = $_SERVER[ 'PHP_AUTH_USER' ];

  if($my_username){
    $my_info = $mysqli->prepare('SELECT id,name FROM user WHERE username = ?;');
    $my_info->bind_param('s', $my_username);
    $my_info_flag = $my_info->execute();
    
    if (!$my_info_flag) {
        die('ユーザ情報の取得に失敗しました。'.mysqli_error());
    }
    
    $my_info->bind_result($my_id, $my_name);
    $my_info->fetch();
    $my_info->close();
    
  }
?>
