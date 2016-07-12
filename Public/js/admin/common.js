/**
 * Created by YaoHeng on 2016/6/5.
 */
// 添加按钮操作
$("#button-add").click(function () {
   var url= SCOPE.add_url;
    window.location.href=url;

});
/*
提交按钮
 */
$("#singcms-button-submit").click(function () {
    var data=$("#singcms-form").serializeArray();
   postData={};
    $(data).each(function () {
        postData[this.name] = this.value;

    });
    console.log(postData);
    url = SCOPE.save_url;
    jump_url=SCOPE.jump_url;

    $.post(url,postData, function(result){
     if(result.status==1){
         //提交成功
         return dialog.success(result.message,jump_url);
     }else if(result.status==0){
            //提交失败
         return dialog.error(result.message);
        }
    },"JSON");
});
/*
编辑模式
 */
$('.singcms-table #singcms-edit').on('click',function () {
        var id = $(this).attr('attr-id');
        var url= SCOPE.edit_url + '&id='+id;
    window.location.href=url;
});
/*
删除操作
*/
$('.singcms-table #singcms-delete').on('click',function(){
    var id =$(this).attr('attr-id');
    var a  =$(this).attr('attr-a');
    var message =$(this).attr('attr-message');
    var url =SCOPE.set_status_url;

    data={};
    data['id'] = id;
    data['status'] = -1;

    layer.open({
        type:0,
        title :'是否删除？',
        btn:['yes','no'],
        icon:3,
        closeBtn:2,
        content:"是否确定"+message,
        scrollbar:true,
        yes:function(){
            todelete(url,data);
        },


    });
});

function todelete(url,data){
    $.post(url,data,function(s){
        if(s.status == 1){
            return dialog.success(s.message,'');
        }else{
            return dialog.error(s.message);
        }
    }
    , "JSON");
}
//排序
$('#button-listorder').click(function () {
    //获取listorder内容
    var data =$('#singcms-listorder').serializeArray();
    postData ={};
    $(data).each(function (i) {
        postData[this.name] = this.value;

    });
    var url =SCOPE.listorder_url;
    $.post(url,postData,function(result){
        if (result.status == 1){
            //success
            return dialog.success(result.message,result['data']['jump_url']);
        }else if(result.status == 0){
            //false
            return dialog.error(result.message,result['data']['jump_url']);
        }
    },"JSON");

});

//更改状态
$('.singcms-table #singcms-on-off').on('click',function(){
    var id = $(this).attr('attr-id');
    var status = $(this).attr('attr-status');
    var url =SCOPE.set_status_url;


    data={};
    data['id'] = id;
    data['status'] = status;
    console.log(data);

    layer.open({
        type:0,
        title :'是否提交？',
        btn:['yes','no'],
        icon:3,
        closeBtn:2,
        content:"是否确认更改状态",
        scrollbar:true,
        yes:function(){
            todelete(url,data);
        },


    });
});
/**
 * 推送
 */
$("#singcms-push").click(function(){
    var id = $("#select-push").val();
    if(id == 0){
        return dialog.error("请选择推荐位");
    }
    push = {};
    postData = {};
    $("input[name='pushcheck']:checked").each(function(i){
        push[i] = $(this).val();

    });
    postData['push'] = push;
    postData['position_id'] = id;
    // console.log(postData);
    var url = SCOPE.push_url;
    $.post(url,postData,function(result){
         if(result.status == 1){
            return dialog.success(result.message,result['data']['jump_url']);
         }
         if(result.status == 0){
             return dialog.error(result.message);

         }
    },"JSON");
});