<?php
include_once 'get_all_task.inc';

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

?>

<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="ja">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <title>Shared Tasks</title>
    <meta name="robots" content="noindex">
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
<!--    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
<!--    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!--    <script type="text/javascript" src="/script.js"></script>-->

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/css/bootstrap.min.css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>

</head>
<body>
<form action="./" method="post">
    <p>
        <label for="newtaskname">追加する項目:</label><input type="text" width="100" name="name" value="" id="newtaskname">
        <label for="newtaskowner">担当:</label>
        <select name="person" id="newtaskowner">
            <option value="0">せいの</option>
            <option value="1">にしむら</option>
        </select>
        <input type="submit" class="btn" value="登録">
    </p>
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
