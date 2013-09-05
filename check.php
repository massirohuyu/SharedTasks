<?php
/**
 * User: massirohuyu
 */
    
  include_once 'connect_db.inc';
  
  if($_POST){
    $stmt = $mysqli->prepare('UPDATE task SET checked=? WHERE id=?');
    $stmt->bind_param('ii', $_POST['checked'], $_POST['id']);
    $result_flag = $stmt->execute();

    if (!$result_flag) {
      die('タスクの状態変更に失敗しました。'.$_POST['id'].mysqli_error());
    }
  }
  
  $close_flag = $mysqli->close();
  if (!$close_flag){
    die('切断に失敗しました。'.mysqli_error());
  }
  
  echo 'ok';
    
?>