$(document).ready(function(){
  
  //チェックボックスをクリックした時に
  //値をAjaxで飛ばして該当データをcheckedに
  $('.task').on('click',function(){
    var $this = $(this),
    thisChecked = this.checked? 1: 0,
    thisId = this.name;
    console.log('thisChecked:'+thisChecked+',thisId:'+ thisId);
    $this.prop('disabled',true);
    $.ajax({
      type: 'post',
      url: 'check.php',
      data: {
        'checked': thisChecked,
        'id': thisId
      },
      success: function(data){
        $this.prop('disabled',false);
      }
    });
  });
  
  //削除ボタンをクリックした時に
  //値をAjaxで飛ばして該当データを削除
  $('.delete').on('click',function(){
    var $this = $(this),
    thisId = this.name;
    console.log('thisId:'+ thisId);
    $this.prop('disabled',true);
    $.ajax({
      type: 'post',
      url: 'delete.php',
      data: {
        'id': thisId
      },
      success: function(data){
        $this.closest('li').remove();
      }
    });
  });
  
});
