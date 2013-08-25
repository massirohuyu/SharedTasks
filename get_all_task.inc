<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yoshinori
 * Date: 2013/08/11
 * Time: 21:36
 * To change this template use File | Settings | File Templates.
 */
    
    include_once 'connect_db.inc';
    include_once 'user_auth.inc';

    if($_POST){
        include_once 'add_new_task.inc';
    }
    
    $userlist = $mysqli->query('SELECT id,name FROM user;');
    if (!$userlist) {
        die('複数のユーザ情報取得クエリーが失敗しました。'.mysqli_error());
    }

    $result = $mysqli->query('SELECT id,name,person,checked FROM task;');
    if (!$result) {
        die('タスクリストの取得クエリーが失敗しました。'.mysqli_error());
    }

    $close_flag = $mysqli->close();
    if (!$close_flag){
        die('切断に失敗しました。'.mysqli_error());
    }
    
    $userlist_set = array();
    while ($row1 = $userlist->fetch_assoc()){
        $userlist_set[$row1['id']] = $row1['name'];
    }
    
    $result_set = array();
    while ($row2 = $result->fetch_assoc()){
        $result_set[] = $row2;
    }
?>
