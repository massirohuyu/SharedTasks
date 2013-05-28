<?php
    $mysqli = new mysqli('localhost', 'root', '1tum0n0', 'shared_tasks');
    
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
    }

    $mysqli->set_charset('utf8');
    
    if($_POST){
      $this_name = '';
      if($_POST['person'] == 0){
        $this_name = 'せいの';
      }else if($_POST['person'] == 1){
        $this_name = 'にしむら';
      }

      $stmt = $mysqli->prepare("INSERT INTO tasklist (name, person, checked) VALUES (?, ?, ?)");
      $checked = 0;
      $stmt->bind_param('ssi', $_POST['name'], $this_name, $checked);
      $result_flag = $stmt->execute();

      if (!$result_flag) {
        die('INSERTクエリーが失敗しました。'.mysqli_error());
      }
      header("Location: {$_SERVER['PHP_SELF']}");
      exit;
    }
?>
<html lang="ja">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="ja">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <title>02211123</title>
    <meta name="robots" content="noindex">
    <style type="text/css">
      * {
        margin: 0;
        padding: 0;
        font-size: 100%;
        font-weight: normal;
      }
      
      li {
        list-style-type: none;
      }
      
      img {
        vertical-align: bottom;
      }
      
      a img {
        border: none;
      }
      
      body {
        padding-top: 100px;
        width: 100%;
        line-height: 1.2;
        background: #346;
        color: #fff;
        font-size: 80%;
      }
      
      #mainList {
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
  <form  action="./" method="post">
    <p>
      追加する項目:<input type="text" width="100" name="name" value="">
      担当:
        <select name="person">
          <option value="0">せいの</option>
          <option value="1">にしむら</option>
        </select>
      <input type="submit" value="登録">
    </p>
  </form>
  <?php 
  
    $result = $mysqli->query('SELECT id,name,person,checked FROM tasklist;');
    if (!$result) {
      die('クエリーが失敗しました。'.mysql_error());
    }
    
    print('<ul id="mainList">');
    while ($row = $result->fetch_assoc()) {
      print('<li>');
      print('<input type="checkbox"');
      if($row['checked'] == 1){
        print(' checked');
      }
      print(' name="'.$row['id'].'"');
      print(' value="1">');
      print($row['name']);
      print('（'.$row['person'].'）');
      print('</li>');
    }
    print('</ul>');
    
    $close_flag = $mysqli->close();
    if (!$close_flag){
      print('<p>切断に失敗しました。</p>');
    }
    
  ?>
  </body>
</html>
