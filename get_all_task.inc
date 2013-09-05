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

//  if($_POST){
//      include_once 'add_new_task.inc';
//  }
  
  $userlist = $mysqli->query('SELECT id,name FROM user;');
  if (!$userlist) {
      die('複数のユーザ情報の取得に失敗しました。'.mysqli_error());
  }

  $result = $mysqli->query('SELECT id,name,person,checked FROM task;');
  if (!$result) {
      die('タスクリストの取得に失敗しました。'.mysqli_error());
  }

  $close_flag = $mysqli->close();
  if (!$close_flag){
      die('切断に失敗しました。'.mysqli_error());
  }
  
  //各ユーザ情報を$userlist_setに格納
  $userlist_set = array();
  while ($userlist_row = $userlist->fetch_assoc()){
      $userlist_set[$userlist_row['id']] = $userlist_row['name'];
  }
  
  //各タスク情報を$result_setに格納
  $result_set = array();
  while ($result_row = $result->fetch_assoc()){
      $result_set[] = $result_row;
  }
  
?>
