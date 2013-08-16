<?php
include_once 'get_all_task.inc';

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="ja">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <title>Shared Tasks</title>
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
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
  -->
    <link href="/bower_components/normalize-css/normalize.css" rel="stylesheet">
    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/script.js"></script>

</head>
<body>
<form class="form-inline" role="form" action="./" method="post">
    <div class="form-group">
        <label class="sr-only" for="newtaskname">追加する項目:</label>
        <input type="text" class="form-control" name="name" value="" id="newtaskname" placeholder="Enter taskname">
    </div>
    <div class="form-group">
        <label for="newtaskowner">担当:</label>
        <select class="form-control" name="person" id="newtaskowner">
            <option value="0">せいの</option>
            <option value="1">にしむら</option>
        </select>
        <input type="submit" class="btn btn-default form-control" value="登録">
    </div>
</form>
<ul id="mainList">
    <?php foreach ($result_set as $row1): ?>
        <li>
            <input type="checkbox" class="task"<?php if ($row1['checked'] == 1): ?> checked <?php endif ?>
                   name="<?= $row1['id'] ?>" value="1">
            <?= h($row1['name']) ?>（<?= h($row1['person']) ?>）
            <input type="submit" value="削除" class="delete btn" name="<?= $row1['id'] ?>">
        </li>
    <?php endforeach ?>
</ul>
<p style="margin-top:30px">※タスクのチェックと削除ができるようになりました※</p>
</body>
</html>
