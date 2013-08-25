<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yoshinori
 * Date: 2013/08/11
 * Time: 21:36
 * To change this template use File | Settings | File Templates.
 */
  
  $stmt = $mysqli->prepare("INSERT INTO task (name, person, checked) VALUES (?, ?, ?)");
  $checked = 0;
  $stmt->bind_param('ssi', $_POST['name'], $_POST['person'], $checked);
  $result_flag = $stmt->execute();
  
  if (!$result_flag) {
      die('INSERTクエリーが失敗しました。'.mysqli_error());
  }
  header("Location: {$_SERVER['PHP_SELF']}");
  exit;
?>
