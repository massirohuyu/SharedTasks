<?php
/**
 * User: massirohuyu
 */

  include_once 'connect_db.inc';
  
  //レスポンス用配列
  $response = array("id" => false);
  
  if($_POST){
    $stmt_insert = $mysqli->prepare("INSERT INTO task (name, person, checked) VALUES (?, ?, ?)");
    $checked = 0;
    $stmt_insert->bind_param('ssi', $_POST['name'], $_POST['person'], $checked);
    $result_flag = $stmt_insert->execute();
    
    if (!$result_flag) {
        die('新しいタスクの追加に失敗しました。'.mysqli_error());
    }
    $stmt_insert->fetch();
    $stmt_insert->close();
    
    
    $result = $mysqli->query("SELECT MAX(id) FROM task;");
    if (!$result) {
        die('追加したタスクのidの取得に失敗しました。'.mysqli_error());
    }
    
    $result_row = $result->fetch_assoc();
    $response['id'] = $result_row['MAX(id)'];
    
//    header("Location: {$_SERVER['PHP_SELF']}");
//    exit;
  }
  
  $close_flag = $mysqli->close();
  if (!$close_flag){
    die('切断に失敗しました。'.mysqli_error());
  }
  
  //jsonとしてレスポンスする。
  header("Content-Type: application/json; charset=utf-8");
  echo json_encode($response);
?>
