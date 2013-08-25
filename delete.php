<?php
    
    include_once 'connect_db.inc';
    
    if($_POST){
      $stmt = $mysqli->prepare('DELETE FROM task WHERE id=?');
      $stmt->bind_param('i', $_POST['id']);
      $result_flag = $stmt->execute();

      if (!$result_flag) {
        die('INSERTクエリーが失敗しました。'.$_POST['id'].mysqli_error());
      }
      header("Location: {$_SERVER['PHP_SELF']}");
      exit;
    }
    
    $close_flag = $mysqli->close();
    if (!$close_flag){
      die('切断に失敗しました。'.mysqli_error());
    }
    
    echo 'ok';
    
  ?>