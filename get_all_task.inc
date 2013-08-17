<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yoshinori
 * Date: 2013/08/11
 * Time: 21:36
 * To change this template use File | Settings | File Templates.
 */
    
    include_once 'connect_db.inc';

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

    $result = $mysqli->query('SELECT id,name,person,checked FROM tasklist;');
    if (!$result) {
        die('クエリーが失敗しました。'.mysqli_error());
    }

    $close_flag = $mysqli->close();
    if (!$close_flag){
        die('切断に失敗しました。'.mysqli_error());
    }

    while ($row = $result->fetch_assoc()){
        $result_set[] = $row;
    }
?>
