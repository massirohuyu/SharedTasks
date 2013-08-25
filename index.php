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
    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/bower_components/chosen/public/chosen.min.css" rel="stylesheet" media="screen">
    <style>
        body {
            padding: 10px;
        }
        #subscriber {
            padding-bottom: 20px;
        }
        #mainList {
            padding-left: 0px;
        }
        li.task {
            border-top-style:    solid;
            border-top-width:    1px;
            border-left-style:   none;
            border-right-style:  none;
            border-bottom-style: none;
            border-radius: 0px;
            margin: 0px;
            padding-top:    10px;
            padding-bottom: 10px;
        }
        li.task:last-child {
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }
        li.task-completed {
            text-decoration: line-through;
        }
    </style>
    <script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/script.js"></script>
</head>
<body>


<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">SharedTasks</a>
    </div>
</div>

<div class="container">

    <div id="subscriber" class="input-group">
        <input type="text" id="newtaskname" class="form-control" placeholder="Enter taskname">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">登録</button>
        </span>
    </div>

    <ul id="mainList" class="accordion" id="accordion3">
<?php foreach ($result_set as $row1): ?>
        <li class="task list-unstyled accordion-group">
            <div class="task-header accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse<?= $row1['id'] ?>">
                    <input type="checkbox" class="task" <?php if ($row1['checked'] == 1): ?>checked <?php endif ?>name="<?= $row1['id'] ?>" value="1">
                    <span class="task-name<?php if ($row1['checked'] == 1): ?> task-completed<?php endif ?>"><?= h($row1['name']) ?></span>
                </a>
            </div>
            <div id="collapse<?= $row1['id'] ?>" class="task-descreption accordion-body collapse">
                <div class="task-description accordion-inner">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="closingdate" class="control-label">〆切</label>
                            <div class="">
                                <input type="datetime-local" class="form-control" id="closingdate" placeholder="Closing date">
                            </div>
                            <label for="owner" class="control-label">担当</label>
                            <div>
                                <select>
                                    <option value="サンプル1">未定</option>
                                    <option value="サンプル2">せいの</option>
                                    <option value="サンプル3">にしむら</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </li>
<?php endforeach ?>
    </ul>






<!--
    <ul id="mainList" class="">
<?php foreach ($result_set as $row1): ?>
        <li class="task list-unstyled">
            <div class="task-header">
                <input type="checkbox" class="task" <?php if ($row1['checked'] == 1): ?>checked <?php endif ?>name="<?= $row1['id'] ?>" value="1">
                <span class="task-name<?php if ($row1['checked'] == 1): ?> task-completed<?php endif ?>"><?= h($row1['name']) ?></span>
            </div>
            <div class="task-descreption hidden">
            </div>
        </li>
<?php endforeach ?>
    </ul>
-->

</div>

</body>
</html>
