<?php
    $mysqli = new mysqli('inputhostnamehere', 'inputusernamehere', 'inputpasswordhere', 'shared_tasks');
    
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
    }

    $mysqli->set_charset('utf8');
    
    if($_POST){
      $stmt = $mysqli->prepare("UPDATE tasklist SET checked=? WHERE id=?");
      $stmt->bind_param('ii', $_POST['checked'], $_POST['id']);
      $result_flag = $stmt->execute();

      if (!$result_flag) {
        die('INSERTクエリーが失敗しました。'.$_POST['id'].mysqli_error());
      }
      header("Location: {$_SERVER['PHP_SELF']}");
      exit;
    }
    
    $close_flag = $mysqli->close();
    if (!$close_flag){
      print('<p>切断に失敗しました。</p>');
    }
    
    echo 'ok';
    
  ?>