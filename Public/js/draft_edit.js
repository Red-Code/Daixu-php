/**
 * Created by CLY on 2016/8/7.
 */
function check_change_draft(){
    editor_draft.sync();//将KindEditor的数据同步到textarea标签。
    var value_content = $("#editor_draft").val();

    if(value_content==''){
        alert('信息未填完整');
        return false;
    }
}