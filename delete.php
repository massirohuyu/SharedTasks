<?php
/**
 * User: massirohuyu
 */
    
  include_once 'connect_db.inc';
  
  if($_POST){
    $stmt = $mysqli->prepare('DELETE FROM task WHERE id=?');
    $stmt->bind_param('i', $_POST['id']);
    $result_flag = $stmt->execute();

    if (!$result_flag) {
      die('タスクの消去に失敗しました。'.$_POST['id'].mysqli_error());
    }
    
  }
  
  $close_flag = $mysqli->close();
  if (!$close_flag){
    die('切断に失敗しました。'.mysqli_error());
  }
  
  echo 'ok';
    
?>