$(document).ready(function(){
  
  //タスクのliタグ生成用関数
  function createTaskTag(id, name, person, personName, checked){
    var result = '<li>';
    var checked = checked? ' checked': '';
    result += '<input type="checkbox" class="task"' + checked + ' name="' + id + '" value="1"> ';
    result += name + '（' + personName + '）';
    result += ' <input type="submit" value="削除" class="delete btn" name="' + id + '">';
    result += '</li>';
    return result;
  }
  
  //タスク登録ボタンをクリックした時に
  //各値をAjaxで飛ばして該当データを追加表示
  $('#addnewtask').on('submit',function(){
    var $this = $(this),
    $thisBtn = $this.find('[type="submit"]'),
    thisName = $this.find('#newtaskname').val(),
    thisPerson = $this.find('#newtaskowner').val();
    console.log('thisName:'+thisName+',thisPerson:'+ thisPerson);
    $thisBtn.prop('disabled', true);
    $.ajax({
      type: 'post',
      url: 'add_new_task.php',
      data: {
        'name': thisName,
        'person': thisPerson
      },
      success: function(data){
        if (data.id) {
          var thisPersonName = $this.find('#newtaskowner [value="' + thisPerson + '"]').text();
          var $thisTask = $(createTaskTag(data.id, thisName, thisPerson, thisPersonName, 0));
          $('#mainList').prepend($thisTask);
          console.log(data);
        }else{
          alert(data);
          console.log(data);
        }
        $thisBtn.prop('disabled', false);
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert('新しいタスクの追加に失敗しました。' + errorThrown);
        $thisBtn.prop('disabled', false);
      }
    });
    return false;
  });
  
  //チェックボックスをクリックした時に
  //値をAjaxで飛ばして該当データをcheckedに
  $('body').on('click','.task',function(){
    var $this = $(this),
    thisChecked = this.checked? 1: 0,
    thisId = this.name;
    console.log('thisChecked:'+thisChecked+',thisId:'+ thisId);
    $this.prop('disabled', true);
    $.ajax({
      type: 'post',
      url: 'check.php',
      data: {
        'checked': thisChecked,
        'id': thisId
      },
      success: function(data){
        if (data !== 'ok') {
          alert(data);
          console.log(data);
          $this.prop('checked', !$this[0].checked);
        }
        $this.prop('disabled', false);
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert('状態変更できませんでした。' + errorThrown);
        $this.prop('checked', !$this[0].checked);
        $this.prop('disabled', false);
      }
    });
  });
  
  //削除ボタンをクリックした時に
  //値をAjaxで飛ばして該当データを削除
  $('body').on('click','.delete',function(){
    var $this = $(this),
    thisId = this.name;
    console.log('thisId:'+ thisId);
    $this.prop('disabled', true);
    $.ajax({
      type: 'post',
      url: 'delete.php',
      data: {
        'id': thisId
      },
      success: function(data){
        if (data !== 'ok') {
          alert(data);
          console.log(data);
          $this.prop('disabled', false);
        }else{
          $this.closest('li').remove();
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
          alert('削除できませんでした。' + errorThrown);
          $this.prop('disabled', false);
      }
    });
  });
  
});
